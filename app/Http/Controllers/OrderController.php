<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $products = Product::where('status', 'Disponível')->get();
        return view('orders.create', compact('orders', 'products'));
    }

    public function store(Request $request)
    {
        $rules = [
			'product' => 'required|numeric|min:1',
			'quantity' => 'required|numeric|min:1',
			'value' => 'required|numeric|min:1',
			'customer' => 'required|string|min:3|max:191',
			'cep' => 'required|numeric',
			'state' => 'required|string|min:2|max:2',
			'city' => 'required|string',
			'neighborhood' => 'required|string',
			'street' => 'required|string',
			'number' => 'required',
			'employee' => 'required|string|min:3|max:191',
			'status' => 'required|string'
        ];

        if ($this->validate($request, $rules)) {
            $order = new Order;
            $order->fill($request->all());
            $order->product_id = $request->get('product');
            $order->save();

            $product = Product::find($request->get('product'));
            $product->quantity -= $order->quantity;
            $product->save();

            return redirect('orders')
                ->with([
                    'notification' => [
                        'message' => 'Pedido cadastrado com sucesso',
                        'color' => 'success'
                    ]
                ]);
        }

		return back()->withErrors()->withInputs();
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Order $order)
    {
        $products = Product::where('status', 'Disponível')->get();
		return view('orders.edit', compact('order', 'products'));
    }

    public function update(Request $request, Order $order)
    {
        $rules = [
			'product' => 'required|numeric|min:1',
			'quantity' => 'required|numeric|min:1',
			'value' => 'required|numeric|min:1',
			'customer' => 'required|string|min:3|max:191',
			'cep' => 'required|numeric',
			'state' => 'required|string|min:2|max:2',
			'city' => 'required|string',
			'neighborhood' => 'required|string',
			'street' => 'required|string',
			'number' => 'required',
			'employee' => 'required|string|min:3|max:191',
			'status' => 'required|string'
        ];

        if ($this->validate($request, $rules)) {
            $oldQuantity = $order->quantity;

            $order->fill($request->all());
            $order->product_id = $request->get('product');
            $order->save();

            $product = Product::find($request->get('product'));

            $product->quantity = $product->quantity + $oldQuantity - $order->quantity;
            $product->save();

            return redirect('orders')
                ->with([
                    'notification' => [
                        'message' => 'Pedido atualizado com sucesso',
                        'color' => 'success'
                    ]
                ]);
        }

		return back()->withErrors()->withInputs();
    }

    public function destroy(Order $order)
    {
        $order->product->quantity += $order->quantity;
        $order->product->save();

        $order->delete();

		return back()
			->with([
				'notification' => [
					'message' => 'Pedido excluído com sucesso',
					'color' => 'success'
				]
			]);
    }
}
