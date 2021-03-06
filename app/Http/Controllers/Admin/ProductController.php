<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $request->validate(['image' => 'required']);
        $data['image'] = $this->uploadImage($request);
        $data['slug'] = $this->createSlug($request->name);

        $img = Image::make(public_path("/storage/{$data['image']}"))->resize(1920, 900);
        $img->save();

        $product = Product::create($data);

        return redirect()->route('products.show', ['product' => $product]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = $this->validateData($request);
        if ($request->hasFile('image')) {
            $imgArr = ['image' => $this->uploadImage($request)];

            $img = Image::make(public_path("/storage/{$imgArr['image']}"))->resize(1920, 900);
            $img->save();
        }
        $product->update(array_merge($data, $imgArr ?? []));

        return redirect()->route('products.show', ['product' => $product]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }

    public function validateData(Request $request)
    {
        return $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'sometimes|image',
            'description' => 'required',
        ]);
    }

    /**
     * Return Unique Image name in snake_case
     *
     * @param Request $request
     * @return string
     */
    public function uploadImage(Request $request)
    {
        $name = time() . '_' . preg_replace('/\s+/', '_', $request->image->getClientOriginalName());
        return $request->image->storeAs('products/images', $name, 'public');
    }

    /**
     * @param $title
     * @return string
     * @throws \Exception
     */
    public function createSlug($title)
    {
        $slug = preg_replace('/\s+/', '-', $title);
        $count = Product::select('slug')->where('slug', 'like', $slug . '%')->count();
        return ($count > 0) ? ($slug . '-' . $count) : $slug;
        throw new \Exception('Can not create a unique slug');
    }
}
