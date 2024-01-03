<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;

class CustomerController extends Controller
{
    // Showing all customers
    public function index(): View
    {
        $auth = Auth::check();
        $role = 'guest';
        $customers = Customer::all();

        //$customers = Customer::paginate(5);
        if($auth){
            $role = Auth::user()->role;
        }

        return view('customers.index', compact('customers'), ['auth'=>$auth, 'role'=>$role]);
    }
    
    // Showing customers based on a search query
    public function search(Request $request): View
    {
        $auth = Auth::check();
        $role = 'guest';
        $customer_search = $request->input('search');

        $customers = Customer::query()
            ->where('name', 'LIKE', "%".$customer_search."%")
            ->get();

        if($auth){
            $role = Auth::user()->role;
        }

        return view('customers.show', compact('customers'), ['auth'=>$auth, 'role'=>$role]);
    }

    public function create(Request $request): View
    {
        $auth = Auth::check();
        $role = 'guest';

        if($auth){
            $role = Auth::user()->role;
        }

        return view('customers.create', ['auth'=>$auth, 'role'=>$role]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'code'=>'required',
            'name'=>'required',
            'phone_number'=>'required',
            'address'=>'required',
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer berhasil ditambahkan!');
    }

    public function show(Customer $customer): View
    {
        $auth = Auth::check();
        $role = 'guest';

        if($auth){
            $role = Auth::user()->role;
        }

        return view('customers.show', compact('customer'), ['auth'=>$auth, 'role'=>$role]);
    }

    public function edit(Customer $customer): View
    {
        $auth = Auth::check();
        $role = 'guest';

        if($auth){
            $role = Auth::user()->role;
        }

        return view('customers.edit', compact('customer'), ['auth'=>$auth, 'role'=>$role]);
    }

    public function update(Request $request, Customer $customer): RedirectResponse
    {
        $request->validate([
            'code'=>'required',
            'name'=>'required',
            'phone_number'=>'required',
            'address'=>'required',
        ]);

        $customer->update([
            'code' => $request->code,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        return redirect()->route('customers.index')->with('success', 'Customer berhasil diperbarui!');
    }

    public function destroy(Customer $customer): RedirectResponse
    {
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer berhasil dihapus!');
    }
}
