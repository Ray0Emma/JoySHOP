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
        // dd($request->all());
         $product = $this->productRepository->findProductById($request->input('productId'));

        // $options for assigning only attributes
         $options = $request->except('_token', 'productId', 'price', 'qty');

        // for avoiding duplicated items
         $id = md5($product->id.serialize($options));
        //  foreach (\unserialize(serialize($options)) as $key => $value)
        //  {
        //      echo $key;echo $value;
        //  }

        //  \dd( 'hi');

            \Cart::add(array(
                'id' => $id,
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
