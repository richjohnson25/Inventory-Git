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

    public function searchStockInTransactions(Request $request): View
    {
        return view('stock-in.show');
    }

    public function addStockInTransactionPage(): View
    {
        return view('stock-in.addTransaction');
    }

    public function addStockInTransaction(Request $request): RedirectResponse
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
            'quantity'=>'required',
            'price'=>'required',
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

        return redirect()->route('stock-in.index');
    }

    public function stockInApprovalPage($id): View
    {
        $stock_in = StockInTransaction::findOrFail($id);

        return view('stock-in.approval', compact('stock_in'));
    }

    public function approveStockIn(Request $request)
    {
        $stock_in = StockInTransaction::find($request->stock_in);

        $stock_in->supplier_id = $request->supplier_id;
        $stock_in->product_id = $request->product_id;
        $stock_in->order_number = $request->order_number;
        $stock_in->datetime = $request->datetime;
        $stock_in->quantity = $request->quantity;
        $stock_in->price = $request->price;
        $stock_in->value = $request->value;
        $stock_in->notes = $request->notes;
        $stock_in->total_price = $request->total_price;
        $stock_in->initial_quantity = $request->initial_quantity;
        $stock_in->initial_value = $request->initial_value;
        $stock_in->new_quantity = $request->new_quantity;
        $stock_in->new_value = $request->new_value;
        $stock_in->status == 'approved';

        $stock_in_product = Product::find($stock_in->product_id);

        $stock_in_product->current_quantity = $stock_in->new_quantity;
        $stock_in_product->current_value = $stock_in->new_value;

        $stock_in->save();

        $stock_in_product->save();

        $stock_in_transactions = StockInTransaction::all();

        return view('stock-in.index', compact('stock_in_transactions'));
    }

    public function rejectStockIn(Request $request): RedirectResponse
    {
        $stock_in = StockInTransaction::find($request->stock_in);

        $stock_in->status == 'rejected';

        $stock_in->save();

        return redirect()->route('stock-in.index');
    }

    public function deleteStockInTransaction(StockInTransaction $stock_in): RedirectResponse
    {
        $stock_in->delete();

        return redirect()->route('stock-in.index');
    }

    public function chooseStockInDateRangePage(): View
    {
        return view('stock-in.chooseDateRange');
    }

    public function stockInReportPage(Request $request)
    {
        $approved_stock_ins = StockInTransaction::whereBetween('datetime', [$request->start_date, $request->end_date])
                                ->where('status', '=', 'approved')->get();

        return view('stock-in.report', compact('approved_stock_ins'));
    }

    public function stockOutTransactionIndex(): View
    {
        $stock_out_transactions = StockOutTransaction::paginate(5);

        return view('stock-out.index', compact('stock_out_transactions'));
    }

    public function searchStockOutTransactions(Request $request){
        return view('stock-out.show');
    }

    public function addStockOutTransactionPage(): View
    {
        return view('stock-out.addTransaction');
    }

    public function addStockOutTransaction(Request $request): RedirectResponse
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

    public function stockOutApprovalPage($id): View
    {
        $stock_out = StockOutTransaction::findOrFail($id);

        return view('stock-out.approval', compact('stock_out'));
    }

    public function approveStockOut(Request $request)
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

    public function rejectStockOut(Request $request): RedirectResponse
    {
        $stock_out = StockOutTransaction::find($request->stock_out);

        $stock_out->status == 'rejected';

        $stock_out->save();

        return redirect()->route('stock-out.index');
    }

    public function deleteStockOutTransaction(StockOutTransaction $stock_out): RedirectResponse
    {
        $stock_out->delete();

        return redirect()->route('stock-out.index');
    }

    public function chooseStockOutDateRangePage(): View
    {
        return view('stock-out.chooseDateRange');
    }

    public function stockOutReportPage(){
        $approved_stock_outs = StockOutTransaction::whereBetween('datetime', [$request->start_date, $request->end_date])
                                ->where('status', '=', 'approved')->get();

        return view('stock-out.report', compact('approved_stock_outs'));
    }
}
