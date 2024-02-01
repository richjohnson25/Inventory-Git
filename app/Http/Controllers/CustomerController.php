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
    public function customerIndex(): View
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

        return view('customers.search', compact('customers'), ['auth'=>$auth, 'role'=>$role]);
    }

    public function createCustomer(Request $request): View
    {
        $auth = Auth::check();
        $role = 'guest';

        if($auth){
            $role = Auth::user()->role;
        }

        return view('customers.create', ['auth'=>$auth, 'role'=>$role]);
    }

    public function storeCustomer(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'code'=>'required',
            'name'=>'required',
            'phone_number'=>'required',
            'address'=>'required',
        ]);

        Customer::create([
            'code' => $request->code,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        return redirect()->route('customerIndex')->with('success', 'Customer berhasil ditambahkan!');
    }

    public function viewCustomer($id): View
    {
        $auth = Auth::check();
        $role = 'guest';
        $customer = Customer::findOrFail($id);

        if($auth){
            $role = Auth::user()->role;
        }

        return view('customers.show', compact('customer'), ['auth'=>$auth, 'role'=>$role]);
    }

    public function editCustomer($id): View
    {
        $auth = Auth::check();
        $role = 'guest';
        $customer = Customer::findOrFail($id);

        if($auth){
            $role = Auth::user()->role;
        }

        return view('customers.edit', compact('customer'), ['auth'=>$auth, 'role'=>$role]);
    }

    public function updateCustomer(Request $request, $id): RedirectResponse
    {
        $customer = Customer::findOrFail($id);

        $this->validate($request, [
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

    public function deleteCustomer($id): RedirectResponse
    {
        $customer = Customer::find($id);

        $customer->delete();

        return redirect()->route('customerIndex')->with('success', 'Customer berhasil dihapus!');
    }
}
