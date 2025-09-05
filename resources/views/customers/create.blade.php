<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Customer
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('customers.store') }}" class="bg-white shadow sm:rounded-lg p-6 space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium">Name</label>
                    <input type="text" name="name" required class="mt-1 block w-full rounded-md border-gray-300">
                </div>

                <div>
                    <label class="block text-sm font-medium">Email</label>
                    <input type="email" name="email" class="mt-1 block w-full rounded-md border-gray-300">
                </div>

                <div>
                    <label class="block text-sm font-medium">Phone</label>
                    <input type="text" name="phone" class="mt-1 block w-full rounded-md border-gray-300">
                </div>

                <div>
                    <label class="block text-sm font-medium">Address</label>
                    <input type="text" name="address" class="mt-1 block w-full rounded-md border-gray-300">
                </div>

                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Save</button>
            </form>
        </div>
    </div>
</x-app-layout>
