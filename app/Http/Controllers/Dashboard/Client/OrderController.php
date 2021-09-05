<?php

namespace App\Http\Controllers\Dashboard\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Client;
use App\Product;
use App\Category;
use function foo\func;


class OrderController extends Controller
{
    public function create(Client $client)
    {
        $categories = Category::with('products')->get();

        $orders = $client->orders()->with('products')->paginate(5);

         return view('dashboard.clients.orders.create', compact('client' , 'categories' , 'orders'));
    }// end of create




    public function store(Request $request , Client $client)
    {
      $request->validate([
          'products'=> 'required|array',
      ]);

      $this->attach_order($request , $client);

      session()->flash('success', __('site.added_successfully'));


      return redirect(route('dashboard.orders.index'));

    }// end of store





    public function edit(Client $client ,  Order $order)
    {
        $categories = Category::with('products')->get();

        $orders = $client->orders()->with('products')->paginate(5);


        return view('dashboard.clients.orders.edit', compact('client' , 'categories', 'order' , 'orders'));

    }// end of edit





    public function update(Request $request , Client $client , Order $order)
    {
        $request->validate([
            'products'=> 'required|array',
        ]);

        $this->detach_order($order);


         $this->attach_order($request , $client);


        session()->flash('success', __('site.updated_successfully'));


        return redirect(route('dashboard.orders.index'));

    }// end of update





    private function attach_order($request , $client)
    {
        $order =$client->orders()->create([]);

        $order->products()->attach($request->products);

        $total_price = 0;



        foreach($request->products as $id=>$quantity )
        {
            $product = Product::findOrFail($id);

            $total_price += $product->sale_price * $quantity['quantity'];

      //       $order->products()->attach($product_id , ['quantity' => $request->quanities[$index]]);

            $product->update([

                'stock' => $product->stock -$quantity['quantity']

            ]);

        }// end foreach

        $order->update([

            'total_price' => $total_price,

        ]);

    }// end of privet attach order





    private function detach_order($order)
    {

        foreach($order->products as $product)
        {
             $product->update([
                 'stock' => $product->stock + $product->pivot->quantity
             ]);
        }// end foreach

        $order->delete();

    }// end of privet detach order
}// end of controller
