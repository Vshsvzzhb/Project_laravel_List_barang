@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl shadow-2xl p-12 text-white mb-8">
    <h1 class="text-5xl font-bold mb-4">Welcome to list-barang!</h1>
    <p class="text-xl mb-6 text-blue-100">Sistem manajemen barang terbaikk!
        
    </p>
    <div class="h-1 w-32 bg-white rounded mb-6"></div>
    
    <div class="flex flex-wrap gap-4">
        <a href="{{ route('categories.index') }}" class="bg-white text-blue-600 font-semibold px-8 py-3 rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-200">
            View Categories
        </a>
        <a href="{{ route('products.index') }}" class="bg-yellow-400 text-gray-900 font-semibold px-8 py-3 rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-200">
            View Products
        </a>
        <a href="{{ route('orders.index') }}" class="bg-green-500 text-white font-semibold px-8 py-3 rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-200">
            View Orders
        </a>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
        <div class="text-center">
            <div class="bg-blue-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-2">Categories</h3>
            <p class="text-gray-600 mb-6">Kelola kategori produk</p>
            <a href="{{ route('categories.index') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-3 rounded-lg transition duration-200">
                Manage
            </a>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
        <div class="text-center">
            <div class="bg-green-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-2">Products</h3>
            <p class="text-gray-600 mb-6">Kelola produk toko</p>
            <a href="{{ route('products.index') }}" class="inline-block bg-green-500 hover:bg-green-600 text-white font-semibold px-6 py-3 rounded-lg transition duration-200">
                Manage
            </a>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
        <div class="text-center">
            <div class="bg-purple-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-10 h-10 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-2">Orders</h3>
            <p class="text-gray-600 mb-6">Lihat pesanan customer</p>
            <a href="{{ route('orders.index') }}" class="inline-block bg-purple-500 hover:bg-purple-600 text-white font-semibold px-6 py-3 rounded-lg transition duration-200">
                View
            </a>
        </div>
    </div>
</div>
@endsection