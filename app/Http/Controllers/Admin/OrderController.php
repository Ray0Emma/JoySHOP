<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\OrderContract;
use App\Http\Controllers\BaseController;
class OrderController extends BaseController
{
    protected $orderRepository;

    public function __construct(OrderContract $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        $orders = $this->orderRepository->listOrders();
        $this->setPageTitle('Commandes', 'Liste de toutes les commandes');
        return view('admin.orders.index', compact('orders'));
    }

    public function show($orderNumber)
    {
        $order = $this->orderRepository->findOrderByNumber($orderNumber);

        $this->setPageTitle('Détails de la Commande', $orderNumber);
        return view('admin.orders.show', compact('order'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $order = $this->orderRepository->deleteOrder($id);

        if (!$order) {
            return $this->responseRedirectBack("Erreur s'est produite lors de la suppression du commande.", 'error', true, true);
        }
        return $this->responseRedirect('admin.orders.index', 'commande supprimé avec succès' ,'success',false, false);
    }
}
