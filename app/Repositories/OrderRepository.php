<?php

namespace App\Repositories;

use Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\AttributeValue;
use App\Models\OrderItem;
use App\Contracts\OrderContract;

class OrderRepository extends BaseRepository implements OrderContract
{
    public function __construct(Order $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function storeOrderDetails($params)
    {
        $order = Order::create([
            'order_number'      =>  'ORD-'.strtoupper(uniqid()),
            'user_id'           =>   auth()->user()->id,
            'status'            =>  'En attente',
            'shipping'          =>  $params['costo_envio'],
            'grand_total'       =>  Cart::getSubTotal(),
            'item_count'        =>  Cart::getTotalQuantity(),
            'payment_status'    =>  0,
            'payment_method'    =>  $params['forma_pago'],
            'first_name'        =>  $params['first_name'],
            'last_name'         =>  strtoupper($params['last_name']),
            'address'           =>  $params['address'],
            'city'              =>  $params['city'],
            'country'           =>  $params['country'],
            'post_code'         =>  $params['post_code'],
            'phone_number'      =>  $params['phone_number'],
            'notes'             =>  $params['notes']
        ]);

        if ($order) {

            // $userId=auth()->user()->id;
            $items = Cart::getContent();

            foreach ($items as $item)
            {
                // $attribute_key= [];
                // $attribute_value=[];
                // foreach($item->attributes as  $key =>$value)
                // {
                     // dd($item ->attributes);
                    // $attribute_key=[$key];
                    // $attribute_value=[$value];

                    $product = Product::where('name', $item->name)->first();
                    $oder_att=\serialize($item->attributes);
                    // \dd(\unserialize($product_att));
                    // $product_att= AttributeValue::where('value',$value);
                    //  dd($product_att);
                    $orderItem = new OrderItem([
                        'product_id'    =>  $product->id,
                        'quantity'      =>  $item->quantity,
                        'price'         =>  $item->getPriceSum(),
                        'oder_att'      =>  $oder_att,

                    ]);
                //  }

                // dd($attribute_value);
                $order->items()->save($orderItem);
                }
        }

        return $order;
    }

    public function listOrders(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    public function findOrderByNumber($orderNumber)
    {
        return Order::where('order_number', $orderNumber)->first();
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteOrder($id)
    {
        $order = $this->findOrderByNumber($id);

        $order->delete();

        return $order;
    }
}
