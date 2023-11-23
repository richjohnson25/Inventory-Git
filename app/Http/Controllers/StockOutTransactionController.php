<?php

namespace App\Http\Controllers;

use App\Exports\StockOutExport;
use App\Models\Customer;
use App\Models\Product;
use App\Models\StockOutTransaction;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class StockOutTransactionController extends Controller
{
    public function StockOutIndex(): View
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
        $customers = Customer::all();

        if($auth){
            $role = Auth::user()->role;
        }

        return view('stock-out.addTransaction', compact('products', 'customers'), ['auth'=>$auth, 'role'=>$role]);
    }

    public function storeStockOut(Request $request): RedirectResponse
    {
        $total = 0;
        $value = 0;
        $new_quantity = 0;
        $new_value = 0;
        $product = Product::find($request->product_id);

        $this->validate($request,[
            'customer_id'=>'required',
            'product_id'=>'required',
            'order_number'=>'required',
            'datetime'=>'required',
            'quantity'=>'required',
            'price'=>'required',
        ]);

        $total = $request->quantity * $request->price;
        $value = $total / 1.11;
        $new_quantity = $product->current_quantity - $request->quantity;
        $new_value = $product->current_value - $value;

        StockInTransaction::create([
            'customer_id' => $request->customer_id,
            'product_id' => $request->product_id,
            'order_number' => $request->order_number,
            'datetime' => $request->datetime,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'value' => $value,
            'total_price' => $total,
            'initial_quantity' => $product->initial_quantity,
            'initial_value' => $product->initial_value,
            'new_quantity' => $new_quantity,
            'new_value' => $new_value,
            'notes' => $request->notes,
        ]);

        $stock_out_product = Product::find($request->product_id);

        $stock_out_product->update([
            'current_quantity' => $new_quantity,
            'current_value' => $new_value,
        ]);

        return redirect()->route('stockOutIndex')->with('success', 'Pengajuan transaksi penjualan berhasil!');
    }

    /*public function stockOutApprovalPage(): View
    {
        $auth = Auth::check();
        $role = 'guest';
        $pending_stock_outs = StockOutTransaction::where('status', '=', 'pending')
                                ->get();
        $pso_count = StockOutTransaction::where('status', '=', 'pending')->count();

        if($auth){
            $role = Auth::user()->role;
        }

        return view('stock-out.approval', compact('pending_stock_outs','pso_count'), ['auth'=>$auth, 'role'=>$role]);
    }*/

    public function showStockOut($id): View
    {
        $auth = Auth::check();
        $role = 'guest';
        $stock_out = StockOutTransaction::findOrFail($id);

        if($auth){
            $role = Auth::user()->role;
        }

        return view('stock-out.detail', compact('stock_out'), ['auth'=>$auth, 'role'=>$role]);
    }

    public function deleteStockOut($id): RedirectResponse
    {
        $stock_out = StockOutTransaction::find($id);

        $stock_out->delete();

        return redirect()->back();
    }

    /*public function approveStockOut(string $id, Request $request): RedirectResponse
    {
        $stock_out = StockOutTransaction::findOrFail($id);
        
        $stock_out->status = 1;

        $stock_out_product = Product::find($stock_out->product_id);

        $stock_out_product->update([
            'current_quantity' => $stock_out->new_quantity,
            'current_value' => $stock_out->new_value,
        ]);
        
        $stock_out->save();

        /*$stock_out_product->current_quantity = $stock_out->new_quantity;
        $stock_out_product->current_value = $stock_out->new_value;

        $stock_out_product->save();

        return redirect()->route('stockOutIndex')->with('info', 'Transaksi penjualan disetujui!');
    }

    public function rejectStockOut(string $id): RedirectResponse
    {
        $stock_out = StockOutTransaction::findOrFail($id);

        $stock_out->status == 2;

        $stock_out->save();

        return redirect()->back();
    }*/

    public function reportPage(): View
    {
        $auth = Auth::check();
        $role = 'guest';

        if($auth){
            $role = Auth::user()->role;
        }

        return view('stock-out.reportMenu', ['auth'=>$auth, 'role'=>$role]);
    }

    public function showReport(Request $request): View
    {
        $auth = Auth::check();
        $role = 'guest';

        if($auth){
            $role = Auth::user()->role;
        }

        $stock_out_start_date = $request->get('start_date');
        $stock_out_end_date = $request->get('end_date');

        $stock_outs = StockOutTransaction::whereBetween('datetime', [$stock_out_start_date, $stock_out_end_date])
                                ->get();

        return view('stock-out.report', compact('stock_out_start_date', 'stock_out_end_date', 'stock_outs'), ['auth'=>$auth, 'role'=>$role]);
    }

    public function generateStockOutPDF(Request $request)
    {
        $stock_out_start_date = $request->get('start_date');
        $stock_out_end_date = $request->get('end_date');

        $stock_outs = StockOutTransaction::whereBetween('datetime', [$stock_out_start_date, $stock_out_end_date])
                                ->get();

        $data = [
            'title' => 'Laporan Stok Keluar',
            'stock_outs' => $stock_outs,
        ];

        $pdf = PDF::loadView('stock-out.reportPDF', $data);

        return $pdf->download('stock-out.pdf');
    }

    public function exportStockOut()
    {
        return Excel::download(new StockOutExport, 'stock-out.xlsx');
    }
}
