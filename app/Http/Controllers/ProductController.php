<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductController extends Controller	
{

	public function index()
	{
		return Product::paginate();
	}

	public function store(Request $request)
	{
		$product = Product::create([
			'name' => $request->input['name']
		]);
	}

	public function update(Request $request, $id)
	{

	}
}
