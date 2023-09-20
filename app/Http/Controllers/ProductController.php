<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Customer;
use App\Models\StockInTransaction;
use App\Models\StockOutTransaction;

class ProductController extends Controller
{
    // Dashboard Page
    public function dashboardPage(){
        $available = DB::table('products')->where('current_quantity', '>=', 1)->count();
        $stock_ins = StockInTransaction::all()->count();
        $stock_outs = StockOutTransaction::all()->count();
        $out_of_stock = DB::table('products')->where('current_quantity', '=', 0)->count();

        return view('dashboard', compact('available', 'stock_ins', 'stock_outs', 'out_of_stock'));
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

    public function deleteProduct(Request $request): RedirectResponse
    {
        Product::destroy($request->product);

        return redirect()->route('products.index');
    }
    
    // Showing transaction report of a product
    public function showProductReport(Request $request): View
    {
        // Show stock report for a product
        $product = Product::find($request->product);

        return view('products.report', compact('product'));
    }

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

    public function deleteSupplier(Request $request): RedirectResponse{
        Product::destroy($request->supplier);

        return redirect()->route('suppliers.index');
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

    public function deleteCustomer(Request $request): RedirectResponse{
        Product::destroy($request->customer);

        return redirect()->route('customers.index');
    }
}
