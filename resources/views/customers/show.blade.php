<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            View Customer: {{ $customer->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <p><strong>ID:</strong> {{ $customer->id }}</p>
                <p><strong>Name:</strong> {{ $customer->name }}</p>
                <p><strong>Email:</strong> {{ $customer->email }}</p>
                <p><strong>Phone:</strong> {{ $customer->phone }}</p>
                <p><strong>Address:</strong> {{ $customer->address }}</p>
                <a href="{{ route('customers.edit', $customer) }}" class="bg-blue-500 text-white px-4 py-2 rounded">Edit</a>
            </div>
        </div>
    </div>
    {{-- ... after displaying customer name, email, etc. ... --}}

<div class="mt-8">
    <h3 class="text-lg font-semibold mb-4">Orders</h3>

    @if($customer->orders->count() > 0)
        <ul class="bg-white shadow rounded-lg divide-y divide-gray-200">
            @foreach($customer->orders as $order)
                <li class="px-6 py-4">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="font-medium">{{ $order->product_name }}</p>
                            <p class="text-sm text-gray-600">Order #{{ $order->id }}</p>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-green-600">${{ number_format($order->amount, 2) }}</p>
                            <p class="text-sm text-gray-500">{{ $order->created_at->format('M j, Y') }}</p>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-gray-500 italic">This customer has no orders yet.</p>
    @endif
</div>
<div class="mt-8 p-6 bg-gray-50 rounded-lg">
    <h3 class="text-lg font-semibold mb-4">Add New Order</h3>
    <form method="POST" action="{{ route('orders.store') }}">
        @csrf
        <input type="hidden" name="customer_id" value="{{ $customer->id }}">

    <form method="POST" action="{{ route('orders.store') }}">
        @csrf
        <input type="hidden" name="customer_id" value="{{ $customer->id }}">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Product Name</label>
                <input type="text" name="product_name" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Amount ($)</label>
                <input type="number" step="0.01" name="amount" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>

        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md font-medium">
            Create Order
        </button>
    </form>
</div>
</x-app-layout>
