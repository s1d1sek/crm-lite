<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Orders
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($orders->count() > 0)
                <ul class="bg-white shadow-sm sm:rounded-lg p-6">
                    @foreach ($orders as $order)
                        <li class="py-2 border-b">
                            <strong>Order #{{ $order->id }}</strong>:
                            {{ $order->product_name }} - ${{ $order->amount }}
                            <br>
                            <span class="text-sm text-gray-600">
                                Customer: <strong>{{ $order->customer->name }}</strong> ({{ $order->customer->email }})
                            </span>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>No orders found. Use Tinker to create some!</p>
            @endif
        </div>
    </div>
</x-app-layout>
