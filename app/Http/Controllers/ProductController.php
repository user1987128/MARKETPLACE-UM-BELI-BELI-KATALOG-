<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // ============================
    // READ - List Semua Produk
    // ============================
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // ============================
    // READ - Detail Produk
    // ============================
    public function show(Product $product)
    {
        return view('product.detail', compact('product'));
    }

    // ============================
    // CREATE - Form Tambah Produk
    // ============================
    public function create()
    {
        $categories = Category::all(); // WAJIB dikirim
        return view('products.create', compact('categories'));
    }

    // ============================
    // STORE - Simpan Produk Baru
    // ============================
    public function store(Request $request)
    {
        $request->validate([
         'name' => 'required',
         'description' => 'required',
         'price' => 'required|numeric',
         'stock_quantity' => 'required|integer|min:0',
         'category_id' => 'required',
         'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);


        // Upload gambar
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // Simpan produk
        Product::create([
            'name'           => $request->name,
            'description'    => $request->description,
            'price'          => $request->price,
            'stock_quantity' => $request->stock_quantity,
            'sale_price'     => $request->sale_price,
            'category_id'    => $request->category_id,
            'image'          => $imagePath,
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil ditambahkan');
    }

    // ============================
    // EDIT - Form Edit Produk
    // ============================
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    // ============================
    // UPDATE - Simpan Perubahan
    // ============================
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'           => 'required',
            'description'    => 'required',
            'price'          => 'required|numeric',
            'stock_quantity' => 'required|numeric',
            'sale_price'     => 'nullable|numeric',
            'category_id'    => 'required|exists:categories,id',
            'image'          => 'nullable|image|max:2048',
        ]);

        // Update gambar jika ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        $product->update([
            'name'           => $request->name,
            'description'    => $request->description,
            'price'          => $request->price,
            'stock_quantity' => $request->stock_quantity,
            'sale_price'     => $request->sale_price,
            'category_id'    => $request->category_id,
            'image'          => $product->image,
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil diperbarui');
    }

    // ============================
    // DELETE - Hapus Produk
    // ============================
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil dihapus');
    }
}
