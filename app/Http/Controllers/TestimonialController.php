<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::with('order')->latest()->get();

        // Manipulasi Collection secara eksplisit untuk statistik
        $averageRating = $testimonials->count() > 0
            ? round($testimonials->avg('rating'), 1)
            : 4.9;
        $fiveStarCount = $testimonials->filter(fn ($item) => $item->rating == 5)->count();

        $unreviewedOrders = collect();
        $myTestimonials = collect();

        if (Auth::check()) {
            // Pisahkan testimoni milik user yang sedang login menggunakan Collection ->filter()
            $myTestimonials = $testimonials->filter(fn ($t) => $t->user_id === Auth::id());

            // Ambil ID pesanan yang sudah pernah diulas oleh user ini menggunakan ->pluck()
            $reviewedOrderIds = $myTestimonials->pluck('order_id')->filter()->toArray();

            // Ambil semua pesanan 'completed' milik user, lalu saring yang BELUM diulas
            $completedOrders = Order::with('orderItems.menu')
                ->where('user_id', Auth::id())
                ->where('status', 'completed')
                ->latest()
                ->get();

            $unreviewedOrders = $completedOrders->reject(
                fn ($order) => in_array($order->id, $reviewedOrderIds)
            );
        }

        return view('pages.testimoni', compact(
            'testimonials',
            'averageRating',
            'fiveStarCount',
            'unreviewedOrders',
            'myTestimonials'
        ));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan masuk terlebih dahulu.');
        }

        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'customer_name' => 'required|string|max:100',
            'event_name' => 'required|string|max:150',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:5',
        ]);

        // Pastikan pesanan benar-benar milik user, berstatus completed, dan belum diulas
        $order = Order::with('orderItems.menu')
            ->where('id', $validated['order_id'])
            ->where('user_id', Auth::id())
            ->where('status', 'completed')
            ->firstOrFail();

        $alreadyReviewed = Testimonial::where('user_id', Auth::id())
            ->where('order_id', $order->id)
            ->exists();

        if ($alreadyReviewed) {
            return redirect()->route('testimoni')->withErrors([
                'order_id' => 'Pesanan ini sudah pernah Anda beri ulasan.',
            ]);
        }

        // Ambil nama menu otomatis dari item pesanan (tanpa ketik manual)
        $menuNames = $order->orderItems
            ->pluck('menu.name')
            ->filter()
            ->unique()
            ->implode(', ');

        Testimonial::create([
            'user_id' => Auth::id(),
            'order_id' => $order->id,
            'customer_name' => $validated['customer_name'],
            'event_name' => $validated['event_name'],
            'menu_ordered' => $menuNames ?: 'Paket Katering Alfi Kitchen',
            'rating' => $validated['rating'],
            'comment' => $validated['comment'],
        ]);

        return redirect()->route('testimoni')->with('success', 'Terima kasih! Ulasan untuk pesanan ' . $order->order_code . ' berhasil disimpan.');
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        if (!Auth::check() || $testimonial->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki izin untuk mengubah ulasan ini.');
        }

        $validated = $request->validate([
            'customer_name' => 'required|string|max:100',
            'event_name' => 'required|string|max:150',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:5',
        ]);

        $testimonial->update($validated);

        return redirect()->route('testimoni')->with('success', 'Ulasan Anda berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        if (!Auth::check() || $testimonial->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki izin untuk menghapus ulasan ini.');
        }

        $testimonial->delete();

        return redirect()->route('testimoni')->with('success', 'Ulasan Anda berhasil dihapus.');
    }
}