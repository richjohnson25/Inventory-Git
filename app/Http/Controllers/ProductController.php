<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
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
        $auth = Auth::check();
        $role = 'guest';

        if($auth){
            $role = Auth::user()->role;
        }

        /*
        $available = DB::table('products')->where('current_quantity', '>=', 1)->count();
        $stock_ins = StockInTransaction::all()->count();
        $stock_outs = StockOutTransaction::all()->count();
        $out_of_stock = DB::table('products')->where('current_quantity', '=', 0)->count();*/

        return view('dashboard', ['auth'=>$auth, 'role'=>$role]);
    }

    // Showing all products
    public function productListPage(): View
    {
        $auth = Auth::check();
        $role = 'guest';
        $products = Product::all();
        
        if($auth){
            $role = Auth::user()->role;
        }

        return view('products.index', compact('products'), ['auth'=>$auth, 'role'=>$role]);
    }

    // Showing products based on a search query
    public function searchProducts(Request $request): View
    {
        $auth = Auth::check();
        $role = 'guest';
        $product_search = $request->input('search');

        $products = Product::query()
            ->where('name', 'LIKE', "%".$product_search."%")
            ->get();

        if($auth){
            $role = Auth::user()->role;
        }

        return view('products.show', compact('products'), ['auth'=>$auth, 'role'=>$role]);
    }

    // Showing transaction report of a product
    public function viewProduct($id): View
    {
        $auth = Auth::check();
        $role = 'guest';
        $product = Product::findOrFail($id);
        $stock_in_transactions = StockInTransaction::where('product_id', $id)->get();
        $stock_out_transactions = StockOutTransaction::where('product_id', $id)->get();

        if($auth){
            $role = Auth::user()->role;
        }

        return view('products.report', compact('product', 'stock_in_transactions', 'stock_out_transactions'), ['auth'=>$auth, 'role'=>$role]);
    }

    public function deleteProduct($id): RedirectResponse
    {
        $product = Product::find($id);

        $product->delete();

        return redirect()->back();
    }

    // Showing all suppliers
    public function supplierListPage(): View
    {
        $auth = Auth::check();
        $role = 'guest';
        $suppliers = Supplier::all();

        //$suppliers = Supplier::paginate(5);
        if($auth){
            $role = Auth::user()->role;
        }

        return view('suppliers.index', compact('suppliers'), ['auth'=>$auth, 'role'=>$role]);
    }

    // Showing suppliers based on a search query
    public function searchSuppliers(Request $request): View
    {
        $auth = Auth::check();
        $role = 'guest';
        $supplier_search = $request->input('search');

        /*$suppliers = Supplier::query()
            ->where('name', 'LIKE', "%".$supplier_search."%")
            ->get();*/

        if($auth){
            $role = Auth::user()->role;
        }

        return view('suppliers.show', compact('suppliers'), ['auth'=>$auth, 'role'=>$role]);
    }

    public function deleteSupplier($id): RedirectResponse
    {
        $supplier = Supplier::find($id);

        $supplier->delete();

        return redirect()->back();
    }

    // Showing all customers
    public function customerListPage(): View
    {
        $auth = Auth::check();
        $role = 'guest';
        $customers = Customer::all();

        //$customers = Customer::paginate(5);
        if($auth){
            $role = Auth::user()->role;
        }

        return view('customers.index', compact('customers'), ['auth'=>$auth, 'role'=>$role]);
    }
    
    // Showing customers based on a search query
    public function searchCustomers(Request $request): View
    {
        $auth = Auth::check();
        $role = 'guest';
        $customer_search = $request->input('search');

        /*$customers = Customer::query()
            ->where('name', 'LIKE', "%".$customer_search."%")
            ->get();*/

        if($auth){
            $role = Auth::user()->role;
        }

        return view('customers.show', compact('customers'), ['auth'=>$auth, 'role'=>$role]);
    }

    public function deleteCustomer($id): RedirectResponse
    {
        $customer = Customer::find($id);

        $customer->delete();

        return redirect()->back();
    }
}
