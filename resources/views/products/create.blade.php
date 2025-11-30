@extends('layouts.app')

@section('title', 'Create Product')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-6">
        <h1 class="text-4xl font-bold text-gray-800">Create New Product</h1>
        <p class="text-gray-600 mt-2">Add a new product to your store</p>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-8">
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="category_id" class="block text-sm font-semibold text-gray-700 mb-2">Category</label>
                <select id="category_id" name="category_id" required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200 @error('category_id') border-red-500 @enderror">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Product Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200 @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                <textarea id="description" name="description" rows="4"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="price" class="block text-sm font-semibold text-gray-700 mb-2">Price (Rp)</label>
                    <input type="number" id="price" name="price" value="{{ old('price') }}" required
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200 @error('price') border-red-500 @enderror">
                    @error('price')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="stock" class="block text-sm font-semibold text-gray-700 mb-2">Stock</label>
                    <input type="number" id="stock" name="stock" value="{{ old('stock') }}" required
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200 @error('stock') border-red-500 @enderror">
                    @error('stock')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="flex-1 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-semibold px-6 py-3 rounded-lg shadow-lg transform hover:scale-105 transition duration-200">
                    Create Product
                </button>
                <a href="{{ route('products.index') }}" class="flex-1 text-center bg-gray-500 hover:bg-gray-600 text-white font-semibold px-6 py-3 rounded-lg transition duration-200">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection