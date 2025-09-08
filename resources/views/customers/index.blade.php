<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Customers
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('customers.create') }}"
               class="bg-blue-600 text-white px-3 py-1 rounded">Add Customer</a>
               <a href="{{ route('customers.export') }}" class="bg-green-600 text-white px-3 py-1 rounded ml-2">
                   Export CSV
               </a>

            <div class="mt-4 bg-white shadow sm:rounded-lg p-4">
                <ul>
                    @forelse($customers as $customer)
                        <li class="py-2 border-b border-gray-200 flex justify-between items-center">
                            <div>
                                <strong>{{ $customer->name }}</strong>
                                @if($customer->email)
                                - {{ $customer->email }}
                                @endif
                                @if($customer->phone)
                                <br><span class="text-sm">Phone: {{ $customer->phone }}
                                </span>
                                @endif
                            </div>
                            <div class="flex space-x-2">
                                <a href="{{ route('customers.show', $customer) }}"
                            class="bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700">
                                View
                            </a> <!-- view button -->
                                <a href="{{ route('customers.edit', $customer) }}" class ="text-green-600 hover:text-green-800 text-sm">Edit</a>

                                <!--edit button -->
                                <form method="POST" action="{{ route('customers.destroy', $customer) }}"
                                      onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-600 text-white px-3 py-1 rounded">Delete</button>
                                </form>
                            </div>
                        </li>

                    @empty
                        <li>No customers yet.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
