<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\products as ModelsProduct;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function homePage()
    {
        $new_products = ModelsProduct::orderBy('id', 'desc')->limit(6)->get();
        $sale_products = ModelsProduct::orderBy('discount', 'desc')->where('discount', '>', 0)->limit(6)->get();
        return view('pages.customer.home', compact('new_products', 'sale_products'));
    }
    public function detailPage($id)
    {
        $pro = ModelsProduct::find($id);
        return view('pages.customer.detail', compact('pro'));
    }

    public function shop_page(){
        $allProducts = ModelsProduct::search()->filter()->orderBy('id', 'desc')->paginate(3)->withQueryString();
        return view('pages.customer.shop', compact('allProducts'));
    }
}
