<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    // Menampilkan halaman menu dengan data dari database via Eloquent ORM
    public function index()
    {
        $menus = Menu::with('category')->where('is_available', true)->get();
        $categories = Category::all();
    
        // Manipulasi Collection secara eksplisit
        $menusByCategory = $menus->groupBy(fn ($menu) => $menu->category->name ?? 'Lainnya');
        $featuredMenu = $menus->sortByDesc('price')->first();
        $sideSpotlightMenus = $menus->take(3);
    
        return view('pages.menu', compact(
            'menus',
            'categories',
            'menusByCategory',
            'featuredMenu',
            'sideSpotlightMenus'
        ));
    }

    // Menyimpan menu baru ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:150',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'min_order' => 'nullable|integer|min:1',
            'image' => 'nullable|string',
            'is_available' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        Menu::create($validated);
        return redirect()->route('menu')->with('success', 'Menu berhasil ditambahkan.');
    }

    // Menampilkan detail 1 menu beserta kategorinya
    public function show($id)
    {
        $menu = Menu::with('category')->findOrFail($id);
        return response()->json($menu);
    }

    // Mengupdate data menu
    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:150',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'min_order' => 'nullable|integer|min:1',
            'image' => 'nullable|string',
            'is_available' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        $menu->update($validated);
        return redirect()->route('menu')->with('success', 'Menu berhasil diperbarui.');
    }

    // Soft Delete: Menghapus menu secara lunak
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('menu')->with('success', 'Menu berhasil dihapus (Soft Delete).');
    }

    // Mengembalikan menu yang sudah di-Soft Delete
    public function restore($id)
    {
        $menu = Menu::withTrashed()->findOrFail($id);
        $menu->restore();

        return redirect()->route('menu')->with('success', 'Menu berhasil dipulihkan.');
    }
}