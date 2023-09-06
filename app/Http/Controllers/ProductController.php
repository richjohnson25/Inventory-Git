<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Customer;

class ProductController extends Controller
{
    public function dashboardPage(){
        return view('dashboard');
    }

    public function productListPage(){
        $products = Product::all();

        //$search = $request->input('search');

        return view('products.listIndex', ['products'=>$products]);
    }

    public function showProductReport($id){
        $product = Product::findOrFail($id);

        return view('products.report', compact('product'));
    }
    /*
    public function showGoods($id){
        return view('goods.listShow');
    }*/

    public function supplierListPage(){
        $suppliers = Supplier::all();

        return view('suppliers.listIndex', ['suppliers'=>$suppliers]);
    }
    /*
    public function showSuppliers($id){
        return view('suppliers.listShow');
    }*/

    public function customerListPage(){
        $customers = Customer::all();

        return view('customers.listIndex', ['customers'=>$customers]);
    }
    /*
    public function showCustomers($id){
        return view('customers.listShow');
    }*/
}
