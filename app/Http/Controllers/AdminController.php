<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    private function authorizeAdmin()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'Akses khusus Admin Alfi Kitchen.');
        }
    }

    public function index()
    {
        $this->authorizeAdmin();

        $orders = Order::with(['user', 'orderItems.menu', 'payments'])->latest()->get();
        $menus = Menu::with('category')->latest()->get();
        $categories = Category::all();
        $testimonialsCount = Testimonial::count();

        // Manipulasi Collection untuk ringkasan dashboard
        $totalRevenue = $orders->where('payment_status', 'paid')->sum('total_price');
        $pendingOrdersCount = $orders->where('status', 'pending')->count();
        $processingOrdersCount = $orders->whereIn('status', ['processing', 'confirmed'])->count();
        $completedOrdersCount = $orders->where('status', 'completed')->count();

        return view('pages.admin.dashboard', compact(
            'orders',
            'menus',
            'categories',
            'testimonialsCount',
            'totalRevenue',
            'pendingOrdersCount',
            'processingOrdersCount',
            'completedOrdersCount'
        ));
    }

    public function updateOrderStatus(Request $request, $id)
    {
        $this->authorizeAdmin();

        $validated = $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled',
            'payment_status' => 'required|in:pending,paid,rejected',
        ]);

        $order = Order::findOrFail($id);
        $order->update([
            'status' => $validated['status'],
            'payment_status' => $validated['payment_status'],
        ]);

        // Sinkronkan status pembayaran pada tabel payments jika ada
/** @var \App\Models\Payment|null $latestPayment */
$latestPayment = $order->payments()->latest()->first();
if ($latestPayment) {
    $latestPayment->update([
        'status' => $validated['payment_status'] === 'paid' ? 'verified' : $validated['payment_status'],
    ]);
}

        return redirect()->route('admin.dashboard')->with('success', 'Status pesanan ' . $order->order_code . ' berhasil diperbarui.');
    }

    public function storeMenu(Request $request)
    {
        $this->authorizeAdmin();

        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:150',
            'price' => 'required|numeric|min:1000',
            'min_order' => 'required|integer|min:1',
            'description' => 'required|string',
            'image_file' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_url' => 'nullable|url',
        ]);

        $imagePath = 'https://images.unsplash.com/photo-1598515214211-89d3c73ae83b?q=80&w=600';
        if ($request->hasFile('image_file')) {
            $stored = $request->file('image_file')->store('menus', 'public');
            $imagePath = asset('storage/' . $stored);
        } elseif (!empty($validated['image_url'])) {
            $imagePath = $validated['image_url'];
        }

        Menu::create([
            'category_id' => $validated['category_id'],
            'name' => $validated['name'],
            'price' => $validated['price'],
            'min_order' => $validated['min_order'],
            'description' => $validated['description'],
            'image' => $imagePath,
            'is_available' => $request->has('is_available'),
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Menu baru "' . $validated['name'] . '" berhasil ditambahkan.');
    }

    public function updateMenu(Request $request, $id)
    {
        $this->authorizeAdmin();

        $menu = Menu::findOrFail($id);

        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:150',
            'price' => 'required|numeric|min:1000',
            'min_order' => 'required|integer|min:1',
            'description' => 'required|string',
            'image_file' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_url' => 'nullable|url',
        ]);

        $imagePath = $menu->image;
        if ($request->hasFile('image_file')) {
            $stored = $request->file('image_file')->store('menus', 'public');
            $imagePath = asset('storage/' . $stored);
        } elseif (!empty($validated['image_url'])) {
            $imagePath = $validated['image_url'];
        }

        $menu->update([
            'category_id' => $validated['category_id'],
            'name' => $validated['name'],
            'price' => $validated['price'],
            'min_order' => $validated['min_order'],
            'description' => $validated['description'],
            'image' => $imagePath,
            'is_available' => $request->has('is_available'),
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Menu "' . $menu->name . '" berhasil diperbarui.');
    }

    public function destroyMenu($id)
    {
        $this->authorizeAdmin();

        $menu = Menu::findOrFail($id);
        $menuName = $menu->name;
        $menu->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Menu "' . $menuName . '" berhasil dihapus.');
    }
}