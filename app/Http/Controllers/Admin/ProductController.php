<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Cloudinary\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    private array $availableSizes = ['S', 'M', 'L', 'XL', 'XXL'];

    private function uploadToCloudinary($file): string
    {
        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => config('cloudinary.cloud_name'),
                'api_key' => config('cloudinary.api_key'),
                'api_secret' => config('cloudinary.api_secret'),
            ],
        ]);

        $result = $cloudinary->uploadApi()->upload(
            $file->getRealPath(),
            ['folder' => 'novastyle/products']
        );

        return $result['secure_url'];
    }

    public function index()
    {
        $products = Product::with('category')->latest()->paginate(15);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', [
            'categories' => $categories,
            'availableSizes' => $this->availableSizes,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
            'sizes' => 'nullable|array',
            'sizes.*' => 'nullable|integer|min:0',
        ]);

        $data['slug'] = Str::slug($data['name']).'-'.uniqid();

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadToCloudinary($request->file('image'));
        }

        $sizes = $data['sizes'] ?? [];
        unset($data['sizes']);
        $data['stock'] = array_sum(array_filter($sizes, fn ($v) => $v !== null));

        $product = Product::create($data);

        foreach ($sizes as $size => $stock) {
            if ($stock !== null && $stock !== '') {
                $product->sizes()->create([
                    'size' => $size,
                    'stock' => (int) $stock,
                ]);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Produit créé avec succès.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $product->load('sizes');
        return view('admin.products.edit', [
            'product' => $product,
            'categories' => $categories,
            'availableSizes' => $this->availableSizes,
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
            'sizes' => 'nullable|array',
            'sizes.*' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadToCloudinary($request->file('image'));
        }

        $sizes = $data['sizes'] ?? [];
        unset($data['sizes']);
        $data['stock'] = array_sum(array_filter($sizes, fn ($v) => $v !== null && $v !== ''));

        $product->update($data);

        foreach ($sizes as $size => $stock) {
            if ($stock !== null && $stock !== '') {
                $product->sizes()->updateOrCreate(
                    ['size' => $size],
                    ['stock' => (int) $stock]
                );
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Produit mis à jour.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Produit supprimé.');
    }
}