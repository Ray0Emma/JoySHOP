<?php

namespace App\Http\Controllers\Site;

use Cart;use Str;
use Illuminate\Http\Request;
use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;
use App\Contracts\AttributeContract;
use Darryldecode\Cart\Cart as CartCart;

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
         $cart=Cart::getContent();
         $product_id=$request->input('productId');

        //  //\dd(Str::contains($cart, ($product->name)));//true is exist
        //  \dd($cart, ($options[0]));//true is exist
        //  //\dd(!$request->has($options));//true if has options
            \Cart::add(array(
                'id' => \uniqid(),
                'name' => $product->name,
                'price' =>  $request->input('price'),
                'quantity' => $request->input('qty'),
                'attributes' => $options,
                )
            );

           // \dd($product);
            return redirect()->back()->with('message', "Article ajouté au panier avec succès.");
     }
}
