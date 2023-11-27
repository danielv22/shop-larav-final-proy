<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function getAvailableProducts()
    {
        $products = Product::where('status', true)->take(3)->get();
        return view('welcome', ['products' => $products]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $ref = DB::select('SELECT AUTO_INCREMENT FROM information_schema.tables WHERE table_name = \'products\' and table_schema = \'bd_ecommerce\'');
        $ref = $ref[0]->AUTO_INCREMENT++;
        $ref = str_pad($ref, 3, '0', STR_PAD_LEFT);

        return view('products.create', [
            'categories' => $categories,
            'ref' => $ref
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $productCategory = new ProductCategory();
        $product = new Product();
        $fileName = null;

        if ($request->hasFile('photo_name')) {
            $image = $request->file('photo_name');
            $fileName =  'product-' . $request->reference . '-' . Str::random(4) . '.' . $image->guessExtension();
            $pathDirectory = public_path('images/products');
            $image->move($pathDirectory, $fileName);
            // $request->photo_name = $fileName; // Por algún motivo almacena C:\xampp\tmp\php6D41.tmp en lugar del nombre que se le asigna.
        }

        if ($request->has('status')) {
            $request->status = true;
        } else {
            $request->status = false;
        }

        $product->reference = $request->reference;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->status = $request->status;
        $product->photo_name = $fileName;
        $product->slug = Str::slug($request->name);
        $product->save();

        $productCategory->fk_product_id = Product::select('product_id')->where('reference', $request->reference)->get()[0]->product_id;
        $productCategory->fk_category_id = intval($request->category);
        $productCategory->save();

        $product->load('categories');

         // $product = Product::create($request->all()); // No funciona porque no se le asigna el nombre de la imagen.

        Mail::to('daniel.valencia22772@ucaldas.edu.co')
            ->send(new \App\Mail\ProductCreatedMail($product));

        return redirect('/dashboard/products');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', [
            'categories' => $categories,
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $productCategory = new ProductCategory();
        $product = new Product();
        $fileName = null;

        $productCategory = ProductCategory::where('fk_product_id', $product->product_id)->get()[0];

        if ($request->hasFile('photo_name')) {
            $image = $request->file('photo_name');
            $fileName =  'product-' . $request->reference . '-' . Str::random(4) . '.' . $image->guessExtension();
            $pathDirectory = public_path('images/products');
            $image->move($pathDirectory, $fileName);
            $request->photo_name = $fileName;
        }

        if ($request->has('status')) {
            $request->status = true;
        } else {
            $request->status = false;
        }

        $product->reference = $request->reference;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->status = $request->status;
        $product->photo_name = $fileName;
        $product->slug = Str::slug($request->name);
        $product->update();

        $productCategory->fk_category_id = intval($request->category);
        $productCategory->update();

        return redirect('dashboard/products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }

    private function saveImage ($request): string
    {
        $image = $request->file('photo_name');
        $fileName =  "product-$request->reference" . '-' . Str::random(4) . ".$image->guessExtension()";
        $pathDirectory = public_path('images/products');
        $image->move($pathDirectory, $fileName);

        return $fileName;
    }
}

