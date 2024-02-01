<?php

namespace App\Http\Controllers;

use App\Exports\StockInExport;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\StockInTransaction;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class StockInTransactionController extends Controller
{
    public function stockInIndex(): View
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
        $suppliers = Supplier::all();
        $products = Product::all();

        if($auth){
            $role = Auth::user()->role;
        }

        return view('stock-in.addTransaction', compact('products', 'suppliers'), ['auth'=>$auth, 'role'=>$role]);
    }

    public function storeStockIn(Request $request): RedirectResponse
    {
        $total = 0;
        $value = 0;
        $new_quantity = 0;
        $new_value = 0;
        $product = Product::find($request->product_id);

        $this->validate($request,[
            'supplier_id'=>'required',
            'product_id'=>'required',
            'order_number'=>'required',
            'datetime'=>'required',
            'quantity'=>'required',
            'price'=>'required',
        ]);

        $total = $request->quantity * $request->price;
        $value = $total / 1.11;
        $new_quantity = $product->current_quantity + $request->quantity;
        $new_value = $product->current_value + $value;

        StockInTransaction::create([
            'supplier_id' => $request->supplier_id,
            'product_id' => $request->product_id,
            'order_number' => $request->order_number,
            'datetime' => $request->datetime,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'value' => $value,
            'total_price' => $total,
            'initial_quantity' => $product->current_quantity,
            'initial_value' => $product->current_value,
            'new_quantity' => $new_quantity,
            'new_value' => $new_value,
            'notes' => $request->notes,
        ]);

        $stock_in_product = Product::find($request->product_id);

        $stock_in_product->update([
            'current_quantity' => $new_quantity,
            'current_value' => $new_value,
        ]);

        return redirect()->route('stockInIndex')->with('success', 'Pengajuan transaksi pembelian berhasil!');
    }

    /*public function stockInApprovalPage(): View
    {
        $auth = Auth::check();
        $role = 'guest';
        $pending_stock_ins = StockInTransaction::where('status', 'pending')
                                ->get();

        if($auth){
            $role = Auth::user()->role;
        }

        return view('stock-in.approval', compact('pending_stock_ins'), ['auth'=>$auth, 'role'=>$role]);
    }*/

    public function showStockIn(string $id): View
    {
        $auth = Auth::check();
        $role = 'guest';
        $stock_in = StockInTransaction::findOrFail($id);

        if($auth){
            $role = Auth::user()->role;
        }

        return view('stock-in.detail', compact('stock_in'), ['auth'=>$auth, 'role'=>$role]);
    }

    public function deleteStockIn($id): RedirectResponse
    {
        $stock_in = StockInTransaction::find($id);

        $stock_in->delete();

        return redirect()->back();
    }

    /*public function approveStockIn(string $id): RedirectResponse
    {
        $stock_in = StockInTransaction::findOrFail($id);

        $stock_in->status = 1;

        $stock_in_product = Product::find($stock_in->product_id);

        $stock_in_product->update([
            'current_quantity' => $stock_in->new_quantity,
            'current_value' => $stock_in->new_value,
        ]);
        
        $stock_in->save();

        $stock_in_product->current_quantity = $stock_in->new_quantity;
        $stock_in_product->current_value = $stock_in->new_value;

        $stock_in_product->save();

        return redirect()->route('stockInIndex')->with('info', 'Transaksi pembelian disetujui!');
    }

    public function rejectStockIn(string $id): RedirectResponse
    {
        $stock_in = StockInTransaction::findOrFail($id);

        $stock_in->status = 2;

        $stock_in->save();

        return redirect()->back();
    }*/

    public function reportPage(): View
    {
        $auth = Auth::check();
        $role = 'guest';

        if($auth){
            $role = Auth::user()->role;
        }

        return view('stock-in.reportMenu', ['auth'=>$auth, 'role'=>$role]);
    }

    public function showReport(Request $request): View
    {
        $auth = Auth::check();
        $role = 'guest';

        if($auth){
            $role = Auth::user()->role;
        }

        $stock_in_start_date = $request->input('stock_in_start_date');
        $stock_in_end_date = $request->input('stock_in_end_date');

        $stock_ins = StockInTransaction::whereBetween('datetime', [$stock_in_start_date, $stock_in_end_date])
                                ->get();

        return view('stock-in.report', compact('stock_ins', 'stock_in_start_date', 'stock_in_end_date'), ['auth'=>$auth, 'role'=>$role]);
    }

    public function generateStockInPDF(Request $request)
    {
        $stock_in_start_date = $request->get('stock_in_start_date');
        $stock_in_end_date = $request->get('stock_in_end_date');

        $stock_ins = StockInTransaction::whereBetween('datetime', [$stock_in_start_date, $stock_in_end_date])
                                ->get();

        $data = [
            'title' => 'Laporan Stok Masuk',
            'stock_ins' => $stock_ins,
        ];

        $pdf = PDF::loadView('stock-in.reportPDF', $data);

        return $pdf->download('stock-in.pdf');
    }

    public function exportStockIn(Request $request)
    {
        $stock_in_start_date = $request->get('stock_in_start_date');
        $stock_in_end_date = $request->get('stock_in_end_date');

        $stock_ins = StockInTransaction::whereBetween('datetime', [$stock_in_start_date, $stock_in_end_date])
                                ->get();

        return Excel::download(new StockInExport($stock_in_start_date, $stock_in_end_date), 'stock-in.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }
}
