<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Supplier;

class SupplierController extends Controller
{
    // Showing all suppliers
    public function supplierIndex(): View
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
        $supplier_search = $request->input('supplier_search');

        $suppliers = Supplier::query()
            ->where('name', 'LIKE', "%".$supplier_search."%")
            ->get();

        if($auth){
            $role = Auth::user()->role;
        }

        return view('suppliers.search', compact('suppliers'), ['auth'=>$auth, 'role'=>$role]);
    }

    public function createSupplier(Request $request): View
    {
        $auth = Auth::check();
        $role = 'guest';

        if($auth){
            $role = Auth::user()->role;
        }

        return view('suppliers.create', ['auth'=>$auth, 'role'=>$role]);
    }

    public function storeSupplier(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'code'=>'required',
            'name'=>'required',
            'phone_number'=>'required',
            'address'=>'required',
        ]);

        Supplier::create([
            'code' => $request->code,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        return redirect()->route('supplierIndex')->with('success', 'Supplier berhasil ditambahkan!');
    }

    public function viewSupplier($id): View
    {
        $auth = Auth::check();
        $role = 'guest';
        $supplier = Supplier::findOrFail($id);

        if($auth){
            $role = Auth::user()->role;
        }

        return view('suppliers.show', compact('supplier'), ['auth'=>$auth, 'role'=>$role]);
    }

    public function editSupplier($id): View
    {
        $auth = Auth::check();
        $role = 'guest';
        $supplier = Supplier::findOrFail($id);

        if($auth){
            $role = Auth::user()->role;
        }

        return view('suppliers.edit', compact('supplier'), ['auth'=>$auth, 'role'=>$role]);
    }

    public function updateSupplier(Request $request, $id): RedirectResponse
    {
        $supplier = Supplier::findOrFail($id);

        $this->validate($request, [
            'code'=>'required',
            'name'=>'required',
            'phone_number'=>'required',
            'address'=>'required',
        ]);

        $supplier->update([
            'code' => $request->code,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil diperbarui!');
    }

    public function deleteSupplier($id): RedirectResponse
    {
        $supplier = Supplier::find($id);

        $supplier->delete();

        return redirect()->route('supplierIndex')->with('success', 'Supplier berhasil dihapus!');
    }
}
