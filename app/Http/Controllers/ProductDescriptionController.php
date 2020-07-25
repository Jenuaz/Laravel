<?php

namespace App\Http\Controllers;

use App\Description;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductDescriptionController extends Controller
{
	public function index($productId)
	{
		return Description::ofProduct($productId)->paginate();
	}
}
