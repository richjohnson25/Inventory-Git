<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Customer;
use App\Models\StockInTransaction;
use App\Models\StockOutTransaction;

class TransactionController extends Controller
{
    public function stockInTransactionIndex(): View
    {
        $stock_in_transactions = StockInTransaction::all();

        return view('stock-in.index', compact('stock_in_transactions'));
    }

    public function showStockInTransactionList(Request $request): View
    {
        return view('stock-in.show');
    }

    public function addStockInTransactionPage(): View
    {
        $stock_in_search = $request->input('search');

        return view('stock-in.addTransaction');
    }

    public function addStockInTransaction(Request $request): RedirectResponse
    {
        $total_price = 0;

        $this->validate($request,[
            'datetime'=>'required',
            'order_number'=>'required',
            'supplier'=>'required',
            'item_name'=>'required',
            'quantity'=>'required',
            'price_per_unit'=>'required',
            'notes'=>'required',
            //'total_price'=>'required',
        ]);

        //StockInTransaction::create($request->all());

        $stock_in_transaction = new StockInTransaction();

        $stock_in_transaction->datetime = $request->datetime;
        $stock_in_transaction->order_number = $request->order_number;
        $stock_in_transaction->supplier = $request->supplier;
        $stock_in_transaction->item_name = $request->item_name;
        $stock_in_transaction->quantity = $request->quantity;
        $stock_in_transaction->price_per_unit = $request->price_per_unit;
        $stock_in_transaction->notes = $request->notes;
        $stock_in_transaction->total_price = $request->total_price;

        $stock_in_transaction->save();

        return redirect()->route('stock-in.index');
    }

    public function stockInApprovalPage(Request $request){
        $stock_in = StockInTransaction::find($request->$stock_in);

        return view('stock-in.approval', compact('stock_in'));
    }

    public function rejectStockIn(Request $request){
        $stock_in = StockInTransaction::find($request->stock_in);

        $stock_in->status == 'rejected';

        $stock_in->save();

        return redirect()->route('stock-in.index');
    }

    public function deleteStockInTransaction(StockInTransaction $stock_in_transaction): RedirectResponse
    {
        $stock_in_transaction->delete();

        return redirect()->route('stock-in.index');
    }

    public function chooseStockInDateRangePage(): View
    {
        return view('stock-in.chooseDateRange');
    }

    public function stockInReportPage(){
        return view('stock-in.report');
    }

    public function stockOutTransactionIndex(): View
    {
        $stock_out_transactions = StockOutTransaction::paginate(5);

        return view('stock-out.index', compact('stock_out_transactions'));
    }
    /*
    public function showStockOutTransactionList($id){
        return view('stock-out.listShow');
    }*/

    public function addStockOutTransactionPage(): View
    {
        return view('stock-out.addTransaction');
    }

    public function addStockOutTransaction(Request $request): RedirectResponse
    {
        $total_price = 0;

        $this->validate($request,[
            'datetime'=>'required',
            'order_number'=>'required',
            'customer'=>'required',
            'item_name'=>'required',
            'quantity'=>'required',
            'price_per_unit'=>'required',
            'notes'=>'required',
            //'total_price'=>'required',
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

        $stock_out_transaction->save();

        return redirect()->route('stock-out.index');
    }

    public function stockOutApprovalPage(Request $request){
        $stock_out = StockOutTransaction::find($request->stock_out);

        return view('stock-out.approval', compact('stock_out'));
    }

    public function rejectStockOut(Request $request){
        $stock_out = StockInTransaction::find($request->stock_out);

        $stock_out->status == 'rejected';

        $stock_out->save();

        return redirect()->route('stock-out.index');
    }

    public function deleteStockOutTransaction(StockOutTransaction $stock_out_transaction): RedirectResponse
    {
        $stock_out_transaction->delete();

        return redirect()->route('stock-out.index');
    }

    public function chooseStockOutDateRangePage(): View
    {
        return view('stock-out.chooseDateRange');
    }

    public function stockOutReportPage(){
        return view('stock-out.report');
    }
}
