@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-6">
        <h1 class="text-4xl font-bold text-gray-800">Edit Category</h1>
        <p class="text-gray-600 mt-2">Update category information</p>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-8">
        <form action="{{ route('categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Category Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}" required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200 @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                <textarea id="description" name="description" rows="4"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200 @error('description') border-red-500 @enderror">{{ old('description', $category->description) }}</textarea>
                @error('description')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4">
                <button type="submit" class="flex-1 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold px-6 py-3 rounded-lg shadow-lg transform hover:scale-105 transition duration-200">
                    Update Category
                </button>
                <a href="{{ route('categories.index') }}" class="flex-1 text-center bg-gray-500 hover:bg-gray-600 text-white font-semibold px-6 py-3 rounded-lg transition duration-200">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection