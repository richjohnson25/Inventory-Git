<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    public function dashboardPage(){
        return view('dashboard');
    }

    public function goodsListPage(){
        return view('goods.listIndex');
    }

    public function showGoods($id){
        return view('goods.listShow');
    }

    public function supplierListPage(){
        return view('suppliers.listIndex');
    }

    public function showSuppliers($id){
        return view('suppliers.listShow');
    }

    public function customersListPage(){
        return view('customers.listIndex');
    }

    public function showCustomers($id){
        return view('customers.listShow');
    }
}
