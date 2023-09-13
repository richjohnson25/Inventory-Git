<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Customer;

//use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // Dashboard Page
    public function dashboardPage(){
        //$available = DB::table('products')->where('current_quantity', '>=', 1)->get();
        //$out_of_stock = DB::table('products')->where('current_quantity', '=', 0)->get();

        return view('dashboard');
    }

    // Showing all products
    public function productListPage(Request $request): View
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    // Showing products based on a search query
    public function searchProducts(Request $request): View
    {
        $product_search = $request->input('search');

        $products = Product::query()
            ->where('name', 'LIKE', "%".$product_search."%")
            ->get();
        
        return view('products.show', compact('products'));
    }
    
    // Showing transaction report of a product
    /*
    public function showProductReport(Request $request): View
    {
        // Show stock report for a product
        $product = Product::find($request->product);

        return view('products.report', compact('product'));
    }*/

    // Showing all suppliers
    public function supplierListPage(Request $request): View
    {
        $suppliers = Supplier::all();

        //$suppliers = Supplier::paginate(5);

        return view('suppliers.index', compact('suppliers'));
    }

    // Showing suppliers based on a search query
    public function searchSuppliers(Request $request): View
    {
        $supplier_search = $request->input('search');

        //$suppliers = Supplier::join();

        /*
        $suppliers = Supplier::query()
            ->where('name', 'LIKE', "%".$supplier_search."%")
            ->get();*/

        return view('suppliers.show', compact('suppliers'));
    }

    // Showing all customers
    public function customerListPage(Request $request): View
    {
        $customers = Customer::all();

        //$customers = Customer::paginate(5);

        return view('customers.index', compact('customers'));
    }
    
    // Showing customers based on a search query
    public function searchCustomers(Request $request): View
    {
        $customer_search = $request->input('search');

        $customers = Customer::query()
            ->where('name', 'LIKE', "%".$customer_search."%")
            ->get();

        return view('customers.show', compact('customers'));
    }
}
