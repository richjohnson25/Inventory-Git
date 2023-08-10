<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function stockInTransactionListPage(){
        return view('stock-in.listIndex');
    }

    public function showStockInTransactionList(){
        return view('stock-in.listShow');
    }

    public function stockInApprovalPage(){
        return view('stock-in.approvalIndex');
    }

    public function chooseStockInDateRange(){
        return view('stock-in.chooseDateRange');
    }

    public function stockInReportPage(){
        return view('stock-in.report');
    }

    public function stockOutTransactionListPage(){
        return view('stock-out.listIndex');
    }

    public function showStockOutTransactionList(){
        return view('stock-out.listShow');
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
