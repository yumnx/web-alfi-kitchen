<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // Mengambil semua data kategori beserta jumlah menunya (Eloquent ORM)
    public function index()
    {
        $categories = Category::with('menus')->get();
        return response()->json($categories);
    }

    // Menyimpan kategori baru ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        $category = Category::create($validated);
        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan.');
    }

    // Menampilkan detail 1 kategori beserta daftar menunya
    public function show($id)
    {
        $category = Category::with('menus')->findOrFail($id);
        return response()->json($category);
    }

    // Mengupdate data kategori
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        $category->update($validated);
        return redirect()->back()->with('success', 'Kategori berhasil diperbarui.');
    }

    // Soft Delete: Menghapus kategori secara lunak (mengisi kolom deleted_at)
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('success', 'Kategori berhasil dihapus (Soft Delete).');
    }

    // Mengembalikan data kategori yang sudah di-Soft Delete
    public function restore($id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        $category->restore();

        return redirect()->back()->with('success', 'Kategori berhasil dipulihkan.');
    }
}