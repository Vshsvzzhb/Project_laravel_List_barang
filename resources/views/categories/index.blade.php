@extends('layouts.app')

@section('title', 'Categories')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-4xl font-bold text-gray-800">Categories</h1>
        <p class="text-gray-600 mt-2">Manage your product categories</p>
    </div>
    <a href="{{ route('categories.create') }}" class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold px-6 py-3 rounded-lg shadow-lg transform hover:scale-105 transition duration-200">
        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
        </svg>
        Add Category
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($categories as $category)
    <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition duration-300 overflow-hidden">
        <div class="bg-gradient-to-r from-blue-500 to-purple-600 p-6">
            <h3 class="text-2xl font-bold text-white mb-2">{{ $category->name }}</h3>
            <p class="text-blue-100 text-sm">{{ $category->products->count() }} Products</p>
        </div>
        <div class="p-6">
            <p class="text-gray-600 mb-6 h-12 overflow-hidden">{{ $category->description ?? 'No description' }}</p>
            <div class="flex gap-2">
                <a href="{{ route('categories.show', $category) }}" class="flex-1 text-center bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition duration-200">
                    View
                </a>
                <a href="{{ route('categories.edit', $category) }}" class="flex-1 text-center bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg transition duration-200">
                    Edit
                </a>
                <form action="{{ route('categories.destroy', $category) }}" method="POST" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')" class="w-full bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition duration-200">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection