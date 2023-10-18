<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockInTransaction;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class StockInTransactionController extends Controller
{
    public function index(): View
    {
        $auth = Auth::check();
        $role = 'guest';
        $stock_in_transactions = StockInTransaction::all();

        if($auth){
            $role = Auth::user()->role;
        }

        return view('stock-in.index', compact('stock_in_transactions'), ['auth'=>$auth, 'role'=>$role]);
    }

    public function search(Request $request): View
    {
        $auth = Auth::check();
        $role = 'guest';
        $stock_in_search = $request->input('search');

        $stock_ins = StockInTransaction::query()
            ->where('name', 'LIKE', "%".$stock_in_search."%")
            ->get();

        return view('stock-in.show', compact('stock_ins'), ['auth'=>$auth, 'role'=>$role]);
    }

    public function create(): View
    {
        $auth = Auth::check();
        $role = 'guest';
        $products = Product::all();

        if($auth){
            $role = Auth::user()->role;
        }

        return view('stock-in.addTransaction', compact('products'), ['auth'=>$auth, 'role'=>$role]);
    }

    public function store(Request $request): RedirectResponse
    {
        $total = 0;
        $value = 0;
        $new_quantity = 0;
        $new_value = 0;

        $this->validate($request,[
            'supplier_id'=>'required',
            'product_id'=>'required',
            'order_number'=>'required',
            'datetime'=>'required',
            'quantity'=>'required|min:1',
            'price'=>'required|min:10000',
        ]);

        //StockInTransaction::create($request->all());

        $stock_in_transaction = new StockInTransaction();

        $stock_in_transaction->supplier_id = $request->supplier_id;
        $stock_in_transaction->product_id = $request->product_id;
        $stock_in_transaction->order_number = $request->order_number;
        $stock_in_transaction->datetime = $request->datetime;
        $stock_in_transaction->quantity = $request->quantity;
        $stock_in_transaction->price = $request->price;
        $stock_in_transaction->value = 0;
        $stock_in_transaction->notes = $request->notes;
        $stock_in_transaction->total_price = 0;
        $stock_in_transaction->initial_quantity = $request->initial_quantity;
        $stock_in_transaction->initial_value = $request->initial_value;
        $stock_in_transaction->new_quantity = 0;
        $stock_in_transaction->new_value = 0;

        $total = $stock_in_transaction->quantity * $stock_in_transaction->price;
        $stock_in_transaction->total_price = $total;

        $value = $total / 1.11;
        $stock_in_transaction->value = $value;

        $new_quantity = $stock_in_transaction->initial_quantity + $stock_in_transaction->quantity;
        $stock_in_transaction->new_quantity = $new_quantity;

        $new_value = $stock_in_transaction->$initial_value + $value;
        $stock_in_transaction->new_value = $new_value;

        $stock_in_transaction->save();

        return redirect()->route('stock-in.index')->with(['success' => 'Transaksi berhasil diajukan!']);
    }

    public function show($id): View
    {
        $auth = Auth::check();
        $role = 'guest';
        $stock_in = StockInTransaction::findOrFail($id);

        if($auth){
            $role = Auth::user()->role;
        }

        return view('stock-in.approval', compact('stock_in'), ['auth'=>$auth, 'role'=>$role]);
    }

    public function approve($id, Request $request): View
    {
        $auth = Auth::check();
        $role = 'guest';
        $stock_in = StockInTransaction::findOrFail($id);

        if($auth){
            $role = Auth::user()->role;
        }
        
        $stock_in = StockInTransaction::find($id);

        $stock_in->status = 'approved';

        $stock_in_product = Product::find($stock_in->product_id);

        $stock_in_product->current_quantity = $stock_in->new_quantity;
        $stock_in_product->current_value = $stock_in->new_value;

        $stock_in->save();

        $stock_in_product->save();

        $stock_in_transactions = StockInTransaction::all();

        return view('stock-in.index', compact('stock_in_transactions'));
    }

    public function reject($id, Request $request): RedirectResponse
    {
        $stock_in = StockInTransaction::find($id);

        $stock_in->status = 'rejected';

        $stock_in->save();

        return redirect()->back();
    }

    public function delete($id): RedirectResponse
    {
        $stock_in = StockInTransaction::find($id);

        $stock_in->delete();

        return redirect()->back();
    }

    public function chooseDateRange(): View
    {
        $auth = Auth::check();
        $role = 'guest';

        if($auth){
            $role = Auth::user()->role;
        }

        return view('stock-in.chooseDateRange', ['auth'=>$auth, 'role'=>$role]);
    }

    public function showReport(Request $request): View
    {
        $auth = Auth::check();
        $role = 'guest';

        if($auth){
            $role = Auth::user()->role;
        }

        $approved_stock_ins = StockInTransaction::whereBetween('datetime', [$request->get('start_date'), $request->get('end_date')])
                                ->where('status', '=', 'approved')->get();

        return view('stock-in.report', compact('approved_stock_ins'), ['auth'=>$auth, 'role'=>$role]);
    }
}
