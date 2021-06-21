<?php

namespace App\Http\Controllers\Site;

use Cart;
use Illuminate\Http\Request;
use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;
use App\Contracts\AttributeContract;

class ProductController extends Controller
{
    protected $productRepository , $attributeRepository;

    public function __construct(ProductContract $productRepository, AttributeContract $attributeRepository)
    {
        $this->productRepository = $productRepository;
        $this->attributeRepository = $attributeRepository;
    }

    public function show($slug)
    {
        $product = $this->productRepository->findProductBySlug($slug);

        $attributes = $this->attributeRepository->listAttributes();

        return view('site.pages.product', compact('product', 'attributes'));
    }

    public function addToCart(Request $request)
    {
        //dd($request->all());
        $product = $this->productRepository->findProductById($request->input('productId'));

        //$options for assigning only attributes
        $options = $request->except('_token', 'productId', 'price', 'qty');
        // $cart=Cart::getContent();
        // $qty =$request->input("qty");
        // if (in_array($request->input('productId'),Cart::getContent())) {
        //     // $qty = $cart[$product_id]['qty'];
        //     // $cart[$product_id]['qty'] = ($qty + $quantity);
        //     \dd($request->input('productId'));
        //   }else{

        // uniqid -> Generate a unique ID
        Cart::add(uniqid(), $product->name, $request->input('price'), $request->input('qty'), $options);

        return redirect()->back()->with('message', "Article ajouté au panier avec succès.");
    }
}
