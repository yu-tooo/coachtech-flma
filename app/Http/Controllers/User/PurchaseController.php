<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        return view('user.purchase');
    }

    public function purchase()
    {
        dd('purchase.post');
    }

    public function address()
    {
        return view('user.address');
    }

    public function updateAddress()
    {
        dd('purchase/address.post');
    }
}
