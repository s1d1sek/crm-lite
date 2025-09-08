<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate =$request->validate([
            'name'=> 'required|string|max:255',
            'email'=> 'required|email|unique:customers,email',
            'phone'=> 'nullable|string|max:20',
            'address'=>'nullable|string|max:255',
        ],
        [
            'name.required'=>'A customer name is required',
            'email.email'=>'A customer email is required',
            'email.unique'=> 'This email is already taken by another customer',
            'phone.max'=>'Phone number cannot exceed 20 characters',

        ]);

        Customer::create($validate);

        return redirect()->route('customers.index')-> with ('success', 'Customer added');

    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
        'name'=> 'required|string|max:255',
        'email'=> 'required|email|unique:customers,email,'.$customer->id, // Ignore the current customer's email
        'phone'=> 'nullable|string|max:20',
        'address'=>'nullable|string|max:255',
    ],
    [
        'name.required'=>'A customer name is required',
        'email.email'=>'The email must be a valid email address.',
        'email.unique'=> 'This email is already taken by another customer',
        'phone.max'=>'Phone number cannot exceed 20 characters',
    ]);

    // Update the customer model with the new validated data
    $customer->update($validated);

    return redirect()->route('customers.index')-> with ('success', 'Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }

    public function export()
    {
        $customers = Customer::all();
        $csvFileName = 'customers_' . date('Y-m-d_H-i-s') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' .$csvFileName .'"',
        ];
        $callback =function() use($customers){
            $file =fopen('php://output', 'w');
            fputcsv($file, ['ID', 'Name', 'Email', 'Phone', 'Address', 'Created At']);

            foreach($customers as $customer){
                fputcsv($file, [
                    $customer->id,
                    $customer->name,
                    $customer->email,
                    $customer->phone,
                    $customer->address,
                    $customer->created_at,
                ]);
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }
}
