<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Mengambil semua pesanan beserta relasi user, item menu, dan pembayarannya
    public function index()
    {
        $orders = Order::with(['user', 'orderItems.menu', 'payments'])->latest()->get();
        return response()->json($orders);
    }

    // Membuat pesanan baru sekaligus menyimpan rincian itemnya (OrderItem)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'delivery_date' => 'required|date|after_or_equal:today',
            'delivery_time' => 'required',
            'delivery_address' => 'required|string',
            'notes' => 'nullable|string',
            'payment_method' => 'required|string|max:50',
            'payment_proof' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'items' => 'required|array|min:1',
            'items.*.menu_id' => 'required|exists:menus,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.item_notes' => 'nullable|string',
        ]);

        // Simpan file bukti transfer ke storage/app/public/payments
        $proofPath = $request->file('payment_proof')->store('payments', 'public');

        // Hitung total harga dari seluruh item yang dipesan
        $totalPrice = 0;
        foreach ($validated['items'] as $item) {
            $menu = Menu::findOrFail($item['menu_id']);
            $totalPrice += $menu->price * $item['quantity'];
        }

        // Simpan data Order utama
        $order = Order::create([
            'user_id' => $validated['user_id'],
            'order_code' => 'ORD-' . strtoupper(Str::random(8)),
            'delivery_date' => $validated['delivery_date'],
            'delivery_time' => $validated['delivery_time'],
            'delivery_address' => $validated['delivery_address'],
            'notes' => $validated['notes'] ?? null,
            'total_price' => $totalPrice,
            'status' => 'pending',
            'payment_status' => 'unpaid',
        ]);

        // Simpan detail setiap menu ke tabel order_items via relasi Eloquent
        foreach ($validated['items'] as $item) {
            $menu = Menu::findOrFail($item['menu_id']);
            $order->orderItems()->create([
                'menu_id' => $menu->id,
                'quantity' => $item['quantity'],
                'unit_price' => $menu->price,
                'subtotal' => $menu->price * $item['quantity'],
                'item_notes' => $item['item_notes'] ?? null,
            ]);
        }

        // Simpan data bukti pembayaran ke tabel payments via relasi Eloquent
        $order->payments()->create([
            'payment_type' => 'full',
            'payment_method' => $validated['payment_method'],
            'amount' => $totalPrice,
            'payment_proof' => $proofPath,
            'status' => 'pending',
        ]);

        return redirect()->route('menu')->with('success', 'Pesanan berhasil dibuat (' . $order->order_code . ') dan bukti transfer sedang diverifikasi admin!');
    }

    // Menampilkan detail 1 pesanan lengkap
    public function show($id)
    {
        $order = Order::with(['user', 'orderItems.menu', 'payments'])->findOrFail($id);
        return response()->json($order);
    }

    // Mengupdate status pesanan atau jadwal pengiriman
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $validated = $request->validate([
            'status' => 'sometimes|in:pending,confirmed,cooking,on_delivery,completed,cancelled',
            'payment_status' => 'sometimes|in:unpaid,partial_dp,paid,refunded',
            'delivery_date' => 'sometimes|date',
            'delivery_time' => 'sometimes',
            'delivery_address' => 'sometimes|string',
        ]);

        $order->update($validated);
        return redirect()->back()->with('success', 'Data pesanan berhasil diperbarui.');
    }

    // Soft Delete: Menghapus pesanan dan item terkait secara lunak
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->orderItems()->delete(); // Soft delete item di dalamnya
        $order->delete(); // Soft delete order utama

        return redirect()->back()->with('success', 'Pesanan berhasil dihapus (Soft Delete).');
    }

    // Mengembalikan pesanan yang sudah di-Soft Delete
    public function restore($id)
    {
        $order = Order::withTrashed()->findOrFail($id);
        $order->restore();
        $order->orderItems()->withTrashed()->restore();

        return redirect()->back()->with('success', 'Pesanan berhasil dipulihkan.');
    }

    public function create(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan masuk terlebih dahulu untuk memesan katering.');
        }

        $menus = Menu::with('category')->where('is_available', true)->get();
        $selectedMenuId = $request->query('menu_id');

        return view('pages.orders.create', compact('menus', 'selectedMenuId'));
    }

    public function myOrders()
    {
        $user = Auth::user();

        $orders = Order::with(['orderItems.menu', 'payments'])
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        return view('pages.orders.history', compact('user', 'orders'));
    }
}