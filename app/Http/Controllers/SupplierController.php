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
    public function index(): View
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
    public function search(Request $request): View
    {
        $auth = Auth::check();
        $role = 'guest';
        $supplier_search = $request->input('search');

        $suppliers = Supplier::query()
            ->where('name', 'LIKE', "%".$supplier_search."%")
            ->get();

        if($auth){
            $role = Auth::user()->role;
        }

        return view('suppliers.search', compact('suppliers'), ['auth'=>$auth, 'role'=>$role]);
    }

    public function create(Request $request): View
    {
        $auth = Auth::check();
        $role = 'guest';

        if($auth){
            $role = Auth::user()->role;
        }

        return view('suppliers.create', ['auth'=>$auth, 'role'=>$role]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'code'=>'required',
            'name'=>'required',
            'phone_number'=>'required',
            'address'=>'required',
        ]);

        Supplier::create($request->all());

        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil ditambahkan!');
    }

    public function show(Supplier $supplier): View
    {
        $auth = Auth::check();
        $role = 'guest';

        if($auth){
            $role = Auth::user()->role;
        }

        return view('suppliers.show', compact('supplier'), ['auth'=>$auth, 'role'=>$role]);
    }

    public function edit(Supplier $supplier): View
    {
        $auth = Auth::check();
        $role = 'guest';

        if($auth){
            $role = Auth::user()->role;
        }

        return view('suppliers.edit', compact('supplier'), ['auth'=>$auth, 'role'=>$role]);
    }

    public function update(Request $request, Supplier $supplier): RedirectResponse
    {
        $this->validate($request, [
            'code'=>'required',
            'name'=>'required',
            'phone_number'=>'required',
            'address'=>'required',
        ]);

        Supplier::update($request->all());
        $supplier->update([
            'code' => $request->code,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil diperbarui!');
    }

    public function destroy(Supplier $supplier): RedirectResponse
    {
        $supplier->delete();

        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil dihapus!');
    }
}
