<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0'
        ]);

        Order::create($validated);

        return redirect()->back()->with('success', 'Order created successfully!');
    }
}
