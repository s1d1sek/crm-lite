<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Customer: {{ $customer->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('customers.update', $customer) }}" class="bg-white shadow sm:rounded-lg p-6 space-y-4">
                @csrf
                @method('PUT') <!-- This is important! Tells Laravel it's an UPDATE -->

                <div>
                    <label class="block text-sm font-medium">Name *</label>
                    <input type="text" name="name" value="{{ old('name', $customer->name) }}" required class="mt-1 block w-full rounded-md border-gray-300">
                </div>

                <div>
                    <label class="block text-sm font-medium">Email *</label>
                    <input type="email" name="email" value="{{ old('email', $customer->email) }}" required class="mt-1 block w-full rounded-md border-gray-300">
                </div>

                <div>
                    <label class="block text-sm font-medium">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone', $customer->phone) }}" class="mt-1 block w-full rounded-md border-gray-300">
                </div>

                <div>
                    <label class="block text-sm font-medium">Address</label>
                    <input type="text" name="address" value="{{ old('address', $customer->address) }}" class="mt-1 block w-full rounded-md border-gray-300">
                </div>

                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Update Customer</button>
            </form>
        </div>
    </div>
</x-app-layout>
