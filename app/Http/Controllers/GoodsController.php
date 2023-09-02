<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    public function dashboardPage(){
        $auth = Auth::check();
        $role = 'guest';

        if($auth){
            $role = Auth::user()->role;
        }

        return view('dashboard',['auth'=>$auth, 'role'=>$role]);
    }

    public function goodsListPage(){
        $auth = Auth::check();
        $role = 'guest';
        $items = Goods::all();

        if($auth){
            $role = Auth::user()->role;
        }

        $search = $request->input('search');

        return view('goods.listIndex',['auth'=>$auth, 'role'=>$role]);
    }
    /*
    public function showGoods($id){
        return view('goods.listShow');
    }*/

    public function supplierListPage(){
        $auth = Auth::check();
        $role = 'guest';
        $suppliers = Supplier::all();

        if($auth){
            $role = Auth::user()->role;
        }

        return view('suppliers.listIndex',['auth'=>$auth, 'role'=>$role]);
    }
    /*
    public function showSuppliers($id){
        return view('suppliers.listShow');
    }*/

    public function customersListPage(){
        $auth = Auth::check();
        $role = 'guest';
        $customers = Customer::all();

        if($auth){
            $role = Auth::user()->role;
        }

        return view('customers.listIndex',['auth'=>$auth, 'role'=>$role]);
    }
    /*
    public function showCustomers($id){
        return view('customers.listShow');
    }*/
}
