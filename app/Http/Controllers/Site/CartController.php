<?php

namespace App\Http\Controllers\Site;

use Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Darryldecode\Cart\Cart as CartCart;

class CartController extends Controller
{
    public function getCart()
    {
        return view('site.pages.cart');
    }

    public function removeItem($id)
    {
        // $userId = auth()->user()->id;
        Cart::remove($id);

        if (Cart::isEmpty()) {
            return redirect('/');
        }
        return redirect()->back()->with('message', "Article supprimé du panier avec succès." );
    }

    public function clearCart()
    {
        // $userId = auth()->user()->id;
        Cart::clear();

        return redirect('/');
    }
}

