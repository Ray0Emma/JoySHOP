<?php

namespace App\Http\Controllers\Site;

use Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\PayPalService;
use App\Contracts\OrderContract;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    //
    protected $orderRepository;

    protected $payPal;

    public function __construct(OrderContract $orderRepository, PayPalService $payPal )
    {
        $this->payPal = $payPal;
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
        // Before storing the order i should implement the
        // request validation
        $order = $this->orderRepository->storeOrderDetails($request->all());
        //handle if the order is not stored properly
        //dd($order);

        if ($order) {
            $this->payPal->processPayment($order);
        }

        return redirect()->back()->with('message','Commande non passée');
    }

    public function complete(Request $request)
    {
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');

        $status = $this->payPal->completePayment($paymentId, $payerId);

        $order = Order::where('order_number', $status['invoiceId'])->first();
        $order->status = 'En traitement';
        $order->payment_status = 1;
        $order->payment_method = 'PayPal -'.$status['salesId'];
        $order->save();

        Cart::clear();
        return view('site.pages.success', compact('order'));
    }
}
