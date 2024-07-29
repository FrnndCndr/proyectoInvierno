@extends('layouts.app')

@section('content')

    @if (@session('success'))
        <div class="bg-green-300 w-1/2 mx-auto p-2">
            <p class="text-center text-green-800 font-bold">{{ session('success') }}
            </p>
        </div>
    @endif
    @if (@session('error'))
        <div class="bg-red-300 w-1/2 mx-auto p-2">
            <p class="text-center text-red-800 font-bold">{{ session('error') }}
            </p>
        </div>
    @endif
    <div class="flex flex-col items-center mt-8">
        <button class="mb-8">
            <a class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-lg w-48 sm:w-auto px-8 py-4 text-center dark:bg-green-500 dark:hover:bg-green-600 dark:focus:ring-green-700"
                href="{{ route('product.create') }}">Create</a>
        </button>
        @if ($products->count() > 0)
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-6">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Product name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Stock
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr
                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $product->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $product->stock }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $product->price }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('product.edit', ['id' => $product->id]) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('product.delete', ['id' => $product->id]) }}"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <h3 class="font-bold text-cyan-700 text-2xl text-center mt-2">No products found in the system</h3>
        @endif
    </div>
@endsection
