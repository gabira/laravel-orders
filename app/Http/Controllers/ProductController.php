<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $rules = [
			'name' => 'required|unique:products|string|min:3|max:191',
			'value' => 'required|numeric|max:10000',
			'quantity' => 'required|numeric|max:10000'
        ];

        if ($this->validate($request, $rules)) {
			$product = new Product;
            $product->fill($request->all());

            if ($product->quantity > 0) {
                $product->status = 'Disponível';
            } else {
                $product->status = 'Indisponível';
            }

            $product->save();
            return redirect('products')
                ->with([
                    'notification' => [
                        'message' => 'Produto cadastrado com sucesso',
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

    public function edit(Product $product)
    {
        // dd($product);
		return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $rules = [
			'name' => 'required|string|min:3|max:191',
			'value' => 'required|numeric|max:10000',
			'quantity' => 'required|numeric|max:10000'
        ];

        if ($this->validate($request, $rules)){
            $product->fill($request->all());

            if ($product->quantity > 0) {
                $product->status = 'Disponível';
            } else {
                $product->status = 'Indisponível';
            }

			$product->save();
			return redirect('/products')
				->with([
					'notification' => [
						'message' => 'Produto atualizado com sucesso',
						'color' => 'info'
					]
				]);
		}

		return back()->withErrors()->withInputs();
    }

    public function destroy(Product $product)
    {
        $product->delete();
		return back()
			->with([
				'notification' => [
					'message' => 'Produto excluído com sucesso',
					'color' => 'success'
				]
			]);
    }
}
