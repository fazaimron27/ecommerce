<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$products = Product::orderBy('id','desc')->paginate(3);

        return view('admin.product.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$categories = Category::all();

        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$formInput = $request->except('image');

		$this->validate($request, [
			'name' => 'required',
			'image' => 'image|mimes:png,jpg,jpeg|max:1000',
			'details' => 'required',
			'price' => 'required',
			'description' => 'required',
			'category_id' => 'required',
		]);

		// // image upload
		$image = $request->file('image');
		if($image) {
			$imageName = "Product-".date('Y-m-d-h:i:s').".". $image->getClientOriginalExtension();
			$image->move('images/products', $imageName);
			$formInput = $imageName;
		}

        Product::create([
			'name' => $request->name,
			'slug' => str_slug($request->name),
			'image' => $formInput,
			'details' => $request->details,
			'price' => $request->price,
			'description' => $request->description,
			'category_id' => $request->category_id
		]);

		return redirect()->route('product.index')->with('success', 'Product Added Successfully');
	}

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
		$product = Product::where('slug', $slug)->firstOrFail();

        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
		$product = Product::where('slug', $slug)->firstOrFail();
        $categories = Category::all();

		return view('admin.product.edit', compact('product', 'categories'));
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
		$formInput = $request->except('image');

		$this->validate($request, [
			'name' => 'required',
			'image' => 'image|mimes:png,jpg,jpeg|max:1000',
			'details' => 'required',
			'price' => 'required',
			'description' => 'required',
			'category_id' => 'required',
		]);

		if (isset($request->image)) {
			// image upload
			$image = $request->file('image');
			if($image) {
				$imageName = "Product-".date('Y-m-d-h:i:s').".". $image->getClientOriginalExtension();
				$image->move('images/products', $imageName);
				$formInput = $imageName;
			}
		} else {
			$formInput = $product->image;
		}

        $product->update([
			'name' => $request->name,
			'slug' => str_slug($request->name),
			'image' => $formInput,
			'details' => $request->details,
			'price' => $request->price,
			'description' => $request->description,
			'category_id' => $request->category_id
		]);

		return redirect()->route('product.index')->with('success', 'The product has been changed');
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

		return redirect()->route('product.index')->with('danger', 'The product was successfully deleted');
    }
}
