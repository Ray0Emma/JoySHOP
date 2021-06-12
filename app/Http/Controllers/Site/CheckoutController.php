<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Contracts\OrderContract;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    protected $orderRepository;

    public function __construct(OrderContract $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     *  will load the checkout view when we will click
     *  on the button ( Passer à la caisse )
     */
    public function getCheckout()
    {
        return view('site.pages.checkout');
    }

    /**
     * will be called when we will
     * submit the checkout form.
     */
    public function placeOrder(Request $request)
    {
        // Before storing the order we should implement the
        // request validation which I leave it to you
        $order = $this->orderRepository->storeOrderDetails($request->all());

        dd($order);
    }
}
