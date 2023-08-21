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

        return view('stock-in.listIndex',['auth'=>$auth, 'role'=>$role]);
    }

    public function showStockInTransactionList($id){
        return view('stock-in.listShow');
    }

    public function addStockInTransactionPage(){
        $auth = Auth::check();
        $role = 'guest';

        if($auth){
            $role = Auth::user()->role;
        }

        return view('stock-in.addTransaction',['auth'=>$auth, 'role'=>$role]);
    }

    public function addStockInTransaction(Request $request){
        $this->validate($request,[
            'stock-in_date'=>'required',
            'stock-in_number'=>'required',
            'supplier'=>'required',
            'item_name'=>'required',
            'quantity'=>'required',
            'price_per_unit'=>'required',
            'notes'=>'required',
            'total_price'=>'required',
        ]);

        $stock_in_transaction = new StockInTransaction();

        return view('stock-in.listIndex');
    }

    public function stockInApprovalPage(){
        $auth = Auth::check();
        $role = 'guest';

        if($auth){
            $role = Auth::user()->role;
        }

        return view('stock-in.approvalIndex',['auth'=>$auth, 'role'=>$role]);
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

        return view('stock-out.listIndex',['auth'=>$auth, 'role'=>$role]);
    }

    public function showStockOutTransactionList($id){
        return view('stock-out.listShow');
    }

    public function addStockOutTransactionPage(){
        $auth = Auth::check();
        $role = 'guest';

        if($auth){
            $role = Auth::user()->role;
        }

        return view('stock-out.addTransaction',['auth'=>$auth, 'role'=>$role]);
    }

    public function stockOutApprovalPage(){
        return view('stock-out.approvalIndex');
    }

    public function chooseStockOutDateRange(){
        return view('stock-out.chooseDateRange');
    }

    public function stockOutReportPage(){
        return view('stock-out.report');
    }
}
