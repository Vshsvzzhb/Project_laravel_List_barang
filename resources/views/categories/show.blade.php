@extends('layouts.app')

@section('title', 'Category Detail')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-4xl font-bold text-gray-800">{{ $category->name }}</h1>
        <p class="text-gray-600 mt-2">Category Details & Products</p>
    </div>
    <a href="{{ route('categories.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold px-6 py-3 rounded-lg transition duration-200">
        Back to List
    </a>
</div>

<div class="bg-white rounded-xl shadow-lg p-8 mb-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Category Information</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <p class="text-sm font-semibold text-gray-600 mb-1">ID</p>
            <p class="text-lg text-gray-900">{{ $category->id }}</p>
        </div>
        <div>
            <p class="text-sm font-semibold text-gray-600 mb-1">Name</p>
            <p class="text-lg text-gray-900">{{ $category->name }}</p>
        </div>
        <div class="md:col-span-2">
            <p class="text-sm font-semibold text-gray-600 mb-1">Description</p>
            <p class="text-lg text-gray-900">{{ $category->description ?? '-' }}</p>
        </div>
    </div>
</div>

<div class="bg-white rounded-xl shadow-lg p-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Products in this Category ({{ $category->products->count() }})</h2>
    @if($category->products->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($category->products as $product)
            <div class="border border-gray-200 rounded-lg p-4 hover:shadow-lg transition duration-200">
                <h3 class="font-semibold text-gray-900 mb-2">{{ $product->name }}</h3>
                <p class="text-sm text-gray-600 mb-2">{{ Str::limit($product->description, 50) }}</p>
                <div class="flex justify-between items-center">
                    <span class="text-lg font-bold text-blue-600">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                    <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $product->stock > 10 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        Stock: {{ $product->stock }}
                    </span>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-500 text-center py-8">No products in this category yet.</p>
    @endif
</div>
@endsection