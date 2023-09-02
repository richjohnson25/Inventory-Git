<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function stockInTransactionListPage(){
        $auth = Auth::check();
        $role = 'guest';

        if($auth){
            $role = Auth::user()->role;
        }

        $stock_in_transactions = StockInTransaction::all();

        return view('stock-in.listIndex',['auth'=>$auth, 'role'=>$role]);
    }
    /*
    public function showStockInTransactionList($id){
        return view('stock-in.listShow');
    }*/

    public function addStockInTransactionPage(){
        $auth = Auth::check();
        $role = 'guest';

        if($auth){
            $role = Auth::user()->role;
        }

        return view('stock-in.addTransaction',['auth'=>$auth, 'role'=>$role]);
    }

    public function addStockInTransaction(Request $request){
        $total_price = 0;

        $this->validate($request,[
            'datetime'=>'required',
            'order_number'=>'required',
            'supplier'=>'required',
            'item_name'=>'required',
            'quantity'=>'required',
            'price_per_unit'=>'required',
            'notes'=>'required',
            'total_price'=>'required',
        ]);

        $stock_in_transaction = new StockInTransaction();

        $stock_in_transaction->datetime = $request->datetime;
        $stock_in_transaction->order_number = $request->order_number;
        $stock_in_transaction->supplier = $request->supplier;
        $stock_in_transaction->item_name = $request->item_name;
        $stock_in_transaction->quantity = $request->quantity;
        $stock_in_transaction->price_per_unit = $request->price_per_unit;
        $stock_in_transaction->notes = $request->notes;
        $stock_in_transaction->total_price = $request->total_price;
        $stock_in_transaction->status = 'Pending';

        return view('stock-in.listIndex');
    }

    public function stockInApproval($id){
        return view('stock-in.approval');
    }

    public function chooseStockInDateRange(){
        return view('stock-in.chooseDateRange');
    }

    public function stockInReportPage(){
        return view('stock-in.report');
    }

    public function stockOutTransactionListPage(){
        $auth = Auth::check();
        $role = 'guest';

        if($auth){
            $role = Auth::user()->role;
        }

        $stock_out_transaction = StockOutTransaction::all();

        return view('stock-out.listIndex',['auth'=>$auth, 'role'=>$role]);
    }
    /*
    public function showStockOutTransactionList($id){
        return view('stock-out.listShow');
    }*/

    public function addStockOutTransactionPage(){
        $auth = Auth::check();
        $role = 'guest';

        if($auth){
            $role = Auth::user()->role;
        }

        return view('stock-out.addTransaction',['auth'=>$auth, 'role'=>$role]);
    }

    public function addStockOutTransaction(Request $request){
        $this->validate($request,[
            'datetime'=>'required',
            'order_number'=>'required',
            'customer'=>'required',
            'item_name'=>'required',
            'quantity'=>'required',
            'price_per_unit'=>'required',
            'notes'=>'required',
            'total_price'=>'required',
        ]);

        $stock_out_transaction = new StockOutTransaction();

        $stock_out_transaction->datetime = $request->datetime;
        $stock_out_transaction->order_number = $request->order_number;
        $stock_out_transaction->customer = $request->customer;
        $stock_out_transaction->item_name = $request->item_name;
        $stock_out_transaction->quantity = $request->quantity;
        $stock_out_transaction->price_per_unit = $request->price_per_unit;
        $stock_out_transaction->notes = $request->notes;
        $stock_out_transaction->total_price = $request->total_price;
        $stock_out_transaction->status = 'Pending';

        return view('stock-out.listIndex');
    }

    public function stockOutApproval($id){
        return view('stock-out.approval');
    }

    public function chooseStockOutDateRange(){
        return view('stock-out.chooseDateRange');
    }

    public function stockOutReportPage(){
        return view('stock-out.report');
    }
}
