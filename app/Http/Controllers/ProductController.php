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
use App\Models\Category;
use App\Models\Unit;
use App\Models\StockInTransaction;
use App\Models\StockOutTransaction;

class ProductController extends Controller
{
    // Dashboard Page
    public function dashboardPage(): View
    {
        $auth = Auth::check();
        $role = 'guest';

        if($auth){
            $role = Auth::user()->role;
        }

        $products = Product::select("name", "current_value")->orderBy('current_value', 'desc')->take(5)->get();
        $result[] = ['Product Name','Value'];
        foreach ($products as $key => $value) {
            $result[++$key] = [$value->name, (int)$value->current_value];
        }
        
        $available = DB::table('products')->where('current_quantity', '>=', 1)->count();
        $stock_ins = StockInTransaction::all()->count();
        $stock_outs = StockOutTransaction::all()->count();
        $out_of_stock = DB::table('products')->where('current_quantity', '=', 0)->count();

        $current_stock_ins = StockInTransaction::orderBy('datetime', 'desc')->take(3)->get();
        $current_stock_outs = StockOutTransaction::orderBy('datetime', 'desc')->take(3)->get();

        return view('dashboard', compact('available','stock_ins','stock_outs','out_of_stock','result','current_stock_ins','current_stock_outs'), ['auth'=>$auth, 'role'=>$role]);
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

    public function createProduct(Request $request): View
    {
        $auth = Auth::check();
        $role = 'guest';
        $categories = Category::all();
        $units = Unit::all();

        if($auth){
            $role = Auth::user()->role;
        }

        return view('products.create', compact('categories', 'units'), ['auth'=>$auth, 'role'=>$role]);
    }

    public function storeProduct(Request $request): RedirectResponse
    {
        $initial_quantity = 0;
        $initial_value = 0;

        $this->validate($request,[
            'category_id'=>'required',
            'unit_id'=>'required',
            'code'=>'required',
            'name'=>'required',
        ]);

        Product::create([
            'category_id' => $request->category_id,
            'unit_id' => $request->unit_id,
            'code' => $request->code,
            'name' => $request->name,
            'current_quantity' => $initial_quantity,
            'current_value' => $initial_value,
        ]);

        return redirect()->route('productListPage')->with('success', 'Produk berhasil ditambahkan!');
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

    public function createSupplier(Request $request): View
    {
        $auth = Auth::check();
        $role = 'guest';
        $users = User::all();

        if($auth){
            $role = Auth::user()->role;
        }

        return view('suppliers.create', compact('users'), ['auth'=>$auth, 'role'=>$role]);
    }

    public function storeSupplier(Request $request): RedirectResponse
    {
        $this->validate($request,[
            'user_id'=>'required',
            'supplier_code'=>'required',
        ]);

        Supplier::create([
            'user_id' => $request->supplier_id,
            'supplier_code' => $request->product_id,
        ]);

        return redirect()->route('supplierListPage')->with('success', 'Supplier berhasil ditambahkan!');
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

    public function createCustomer(Request $request): View
    {
        $auth = Auth::check();
        $role = 'guest';
        $users = User::all();

        if($auth){
            $role = Auth::user()->role;
        }

        return view('customers.create', compact('users'), ['auth'=>$auth, 'role'=>$role]);
    }

    public function storeCustomer(Request $request): RedirectResponse
    {
        $this->validate($request,[
            'user_id'=>'required',
            'customer_code'=>'required',
        ]);

        Customer::create([
            'user_id' => $request->supplier_id,
            'customer_code' => $request->product_id,
        ]);

        return redirect()->route('customerListPage')->with('success', 'Customer berhasil ditambahkan!');
    }

    public function deleteCustomer($id): RedirectResponse
    {
        $customer = Customer::find($id);

        $customer->delete();

        return redirect()->back();
    }

    // Showing all product categories
    public function categoryListPage(): View
    {
        $auth = Auth::check();
        $role = 'guest';
        $categories = Category::all();

        if($auth){
            $role = Auth::user()->role;
        }

        return view('categories.index', compact('categories'), ['auth'=>$auth, 'role'=>$role]);
    }
    
    // Showing product categories based on a search query
    public function searchCategories(Request $request): View
    {
        $auth = Auth::check();
        $role = 'guest';
        $category_search = $request->input('search');

        $categories = Category::query()
            ->where('name', 'LIKE', "%".$category_search."%")
            ->get();

        if($auth){
            $role = Auth::user()->role;
        }

        return view('categories.show', compact('categories'), ['auth'=>$auth, 'role'=>$role]);
    }

    public function createCategory(Request $request): View
    {
        $auth = Auth::check();
        $role = 'guest';

        if($auth){
            $role = Auth::user()->role;
        }

        return view('categories.create', ['auth'=>$auth, 'role'=>$role]);
    }

    public function storeCategory(Request $request): RedirectResponse
    {
        $this->validate($request,[
            'name'=>'required',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('categoryListPage')->with('success', 'Kategori barang berhasil ditambahkan!');
    }

    public function deleteCategory($id): RedirectResponse
    {
        $category = Category::find($id);

        $category->delete();

        return redirect()->back();
    }

    // Showing all product units
    public function unitListPage(): View
    {
        $auth = Auth::check();
        $role = 'guest';
        $units = Unit::all();

        if($auth){
            $role = Auth::user()->role;
        }

        return view('units.index', compact('units'), ['auth'=>$auth, 'role'=>$role]);
    }
    
    // Showing customers based on a search query
    public function searchUnits(Request $request): View
    {
        $auth = Auth::check();
        $role = 'guest';
        $unit_search = $request->input('search');

        $units = Category::query()
            ->where('name', 'LIKE', "%".$unit_search."%")
            ->get();

        if($auth){
            $role = Auth::user()->role;
        }

        return view('units.show', compact('units'), ['auth'=>$auth, 'role'=>$role]);
    }

    public function createUnit(Request $request): View
    {
        $auth = Auth::check();
        $role = 'guest';

        if($auth){
            $role = Auth::user()->role;
        }

        return view('units.create', ['auth'=>$auth, 'role'=>$role]);
    }

    public function storeUnit(Request $request): RedirectResponse
    {
        $this->validate($request,[
            'name'=>'required',
        ]);

        Unit::create([
            'name' => $request->name,
        ]);

        return redirect()->route('unitListPage')->with('success', 'Satuan barang berhasil ditambahkan!');
    }

    public function deleteUnit($id): RedirectResponse
    {
        $unit = Unit::find($id);

        $unit->delete();

        return redirect()->back();
    }
}
