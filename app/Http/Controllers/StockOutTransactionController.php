<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockOutTransaction;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class StockOutTransactionController extends Controller
{
    public function index(): View
    {
        $auth = Auth::check();
        $role = 'guest';
        $stock_out_transactions = StockOutTransaction::all();

        if($auth){
            $role = Auth::user()->role;
        }

        return view('stock-out.index', compact('stock_out_transactions'), ['auth'=>$auth, 'role'=>$role]);
    }

    public function search(Request $request): View
    {
        $auth = Auth::check();
        $role = 'guest';
        $stock_out_search = $request->input('search');

        $stock_outs = StockInTransaction::query()
            ->where('name', 'LIKE', "%".$stock_out_search."%")
            ->get();

        return view('stock-out.show', compact('stock_outs'), ['auth'=>$auth, 'role'=>$role]);
    }

    public function create(): View
    {
        $auth = Auth::check();
        $role = 'guest';
        $products = Product::all();

        if($auth){
            $role = Auth::user()->role;
        }

        return view('stock-out.addTransaction', compact('products'), ['auth'=>$auth, 'role'=>$role]);
    }

    public function store(Request $request): RedirectResponse
    {
        $total = 0;
        $value = 0;
        $new_quantity = 0;
        $new_value = 0;

        $this->validate($request,[
            'customer_id'=>'required',
            'product_id'=>'required',
            'order_number'=>'required',
            'datetime'=>'required',
            'quantity'=>'required',
            'price'=>'required',
        ]);

        $stock_out_transaction = new StockOutTransaction();

        $stock_out_transaction->customer_id = $request->customer_id;
        $stock_out_transaction->product_id = $request->product_id;
        $stock_out_transaction->order_number = $request->order_number;
        $stock_out_transaction->datetime = $request->datetime;
        $stock_out_transaction->quantity = $request->quantity;
        $stock_out_transaction->price = $request->price;
        $stock_out_transaction->value = 0;
        $stock_out_transaction->notes = $request->notes;
        $stock_out_transaction->total_price = 0;
        $stock_out_transaction->initial_quantity = $request->initial_quantity;
        $stock_out_transaction->initial_value = $request->initial_value;
        $stock_out_transaction->new_quantity = 0;
        $stock_out_transaction->new_value = 0;

        $total = $stock_out_transaction->quantity * $stock_out_transaction->price;
        $stock_out_transaction->total_price = $total;

        $value = $total / 1.11;
        $stock_out_transaction->value = $value;

        $new_quantity = $stock_out_transaction->initial_quantity - $stock_out_transaction->quantity;
        $stock_out_transaction->new_quantity = $new_quantity;

        $new_value = $stock_out_transaction->$initial_value - $value;
        $stock_out_transaction->new_value = $new_value;

        $stock_out_transaction->save();

        return redirect()->route('stock-out.index');
    }

    public function show($id): View
    {
        $auth = Auth::check();
        $role = 'guest';
        $stock_out = StockOutTransaction::findOrFail($id);

        if($auth){
            $role = Auth::user()->role;
        }

        return view('stock-out.approval', compact('stock_out'), ['auth'=>$auth, 'role'=>$role]);
    }

    public function approve(Request $request)
    {
        $stock_out = StockOutTransaction::find($request->stock_out);

        $stock_out->supplier_id = $request->supplier_id;
        $stock_out->product_id = $request->product_id;
        $stock_out->order_number = $request->order_number;
        $stock_out->datetime = $request->datetime;
        $stock_out->quantity = $request->quantity;
        $stock_out->price = $request->price;
        $stock_out->value = $request->value;
        $stock_out->notes = $request->notes;
        $stock_out->total_price = $request->total_price;
        $stock_out->initial_quantity = $request->initial_quantity;
        $stock_out->initial_value = $request->initial_value;
        $stock_out->new_quantity = $request->new_quantity;
        $stock_out->new_value = $request->new_value;
        $stock_out->status == 'approved';

        $stock_out_product = Product::find($stock_out->product_id);

        $stock_out_product->current_quantity = $stock_out->new_quantity;
        $stock_out_product->current_value = $stock_out->new_value;

        $stock_out->save();
        
        $stock_out_product->save();

        $stock_out_transactions = StockOutTransaction::all();

        return view('stock-out.index', compact('stock_out_transactions'));
    }

    public function reject(Request $request): RedirectResponse
    {
        $stock_out = StockOutTransaction::find($request->stock_out);

        $stock_out->status == 'rejected';

        $stock_out->save();

        return redirect()->route('stock-out.index');
    }

    public function delete($id): RedirectResponse
    {
        $stock_out = StockOutTransaction::find($id);

        $stock_out->delete();

        return redirect()->route('stock-out.index');
    }

    public function chooseDateRange(): View
    {
        $auth = Auth::check();
        $role = 'guest';

        if($auth){
            $role = Auth::user()->role;
        }

        return view('stock-out.chooseDateRange', ['auth'=>$auth, 'role'=>$role]);
    }

    public function showReport(Request $request): View
    {
        $auth = Auth::check();
        $role = 'guest';

        if($auth){
            $role = Auth::user()->role;
        }

        $approved_stock_outs = StockOutTransaction::whereBetween('datetime', [$request->get('start_date'), $request->get('end_date')])
                                ->where('status', '=', 'approved')->get();

        return view('stock-out.report', compact('approved_stock_outs'), ['auth'=>$auth, 'role'=>$role]);
    }
}
