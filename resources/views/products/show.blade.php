@extends('layouts.app')

@section('title', 'Product Detail')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-4xl font-bold text-gray-800">{{ $product->name }}</h1>
        <p class="text-gray-600 mt-2">Product Details & Information</p>
    </div>
    <a href="{{ route('products.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold px-6 py-3 rounded-lg transition duration-200">
        Back to List
    </a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Main Content -->
    <div class="lg:col-span-2 space-y-6">
        <!-- Product Card with Gradient Header -->
        <div class="bg-gradient-to-br from-green-400 to-blue-500 rounded-xl shadow-lg overflow-hidden">
            <div class="p-8 text-white">
                <h2 class="text-3xl font-bold mb-4">{{ $product->name }}</h2>
                <p class="text-white text-lg mb-6">{{ $product->description ?? 'No description available' }}</p>
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-lg p-4">
                        <p class="text-sm text-white text-opacity-80 mb-1">Product ID</p>
                        <p class="text-2xl font-bold">#{{ $product->id }}</p>
                    </div>
                    
                    <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-lg p-4">
                        <p class="text-sm text-white text-opacity-80 mb-1">Category</p>
                        <p class="text-xl font-bold">{{ $product->category->name }}</p>
                    </div>
                    
                    <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-lg p-4">
                        <p class="text-sm text-white text-opacity-80 mb-1">Price</p>
                        <p class="text-xl font-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>
                    
                    <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-lg p-4">
                        <p class="text-sm text-white text-opacity-80 mb-1">Stock</p>
                        <p class="text-xl font-bold">{{ $product->stock }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg p-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-blue-100 text-sm mb-1">Price</p>
                        <p class="text-2xl font-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-full p-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-{{ $product->stock > 10 ? 'green' : 'red' }}-500 to-{{ $product->stock > 10 ? 'green' : 'red' }}-600 rounded-xl shadow-lg p-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-{{ $product->stock > 10 ? 'green' : 'red' }}-100 text-sm mb-1">Stock</p>
                        <p class="text-2xl font-bold">{{ $product->stock }} units</p>
                        <p class="text-sm mt-1">{{ $product->stock > 10 ? 'In Stock' : 'Low Stock' }}</p>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-full p-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl shadow-lg p-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-purple-100 text-sm mb-1">Total Value</p>
                        <p class="text-2xl font-bold">Rp {{ number_format($product->price * $product->stock, 0, ',', '.') }}</p>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-full p-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Timeline Card -->
        <div class="bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl shadow-lg p-8 text-white">
            <h3 class="text-2xl font-bold mb-6 flex items-center">
                <svg class="w-7 h-7 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Product Timeline
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-lg p-4">
                    <div class="flex items-center mb-2">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <p class="font-semibold">Created At</p>
                    </div>
                    <p class="text-lg">{{ $product->created_at->format('d M Y, H:i') }}</p>
                    <p class="text-sm text-white text-opacity-80 mt-1">{{ $product->created_at->diffForHumans() }}</p>
                </div>
                
                <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-lg p-4">
                    <div class="flex items-center mb-2">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                        <p class="font-semibold">Last Updated</p>
                    </div>
                    <p class="text-lg">{{ $product->updated_at->format('d M Y, H:i') }}</p>
                    <p class="text-sm text-white text-opacity-80 mt-1">{{ $product->updated_at->diffForHumans() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar Actions -->
    <div class="lg:col-span-1">
        <div class="bg-gradient-to-br from-orange-500 to-pink-600 rounded-xl shadow-lg p-8 text-white sticky top-8">
            <h2 class="text-2xl font-bold mb-6 flex items-center">
                <svg class="w-7 h-7 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
                Quick Actions
            </h2>
            <div class="space-y-4">
                <a href="{{ route('products.edit', $product) }}" class="block w-full bg-white hover:bg-gray-100 text-orange-600 text-center font-semibold px-6 py-4 rounded-lg transition duration-200 transform hover:scale-105 shadow-lg">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit Product
                </a>
                
                <a href="{{ route('categories.show', $product->category) }}" class="block w-full bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-center font-semibold px-6 py-4 rounded-lg transition duration-200 transform hover:scale-105 shadow-lg">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                    View Category
                </a>
                
                <form action="{{ route('products.destroy', $product) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this product?')" class="block w-full bg-red-600 hover:bg-red-700 text-white text-center font-semibold px-6 py-4 rounded-lg transition duration-200 transform hover:scale-105 shadow-lg">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        Delete Product
                    </button>
                </form>
            </div>
            
            <!-- Category Info -->
            <div class="mt-8 pt-8 border-t border-orange-400">
                <h3 class="text-lg font-bold mb-4">Category Info</h3>
                <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-lg p-4">
                    <p class="text-sm text-white text-opacity-80 mb-2">Product Category</p>
                    <p class="text-xl font-bold">{{ $product->category->name }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection