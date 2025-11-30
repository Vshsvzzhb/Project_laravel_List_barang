@extends('layouts.app')

@section('title', 'Order Detail')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-4xl font-bold text-gray-800">Order #{{ $order->id }}</h1>
        <p class="text-gray-600 mt-2">Order details and items</p>
    </div>
    <a href="{{ route('orders.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold px-6 py-3 rounded-lg transition duration-200">
        Back to Orders
    </a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
    <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-blue-100 text-sm mb-1">Order ID</p>
                <p class="text-3xl font-bold">#{{ $order->id }}</p>
            </div>
            <div class="bg-white bg-opacity-20 rounded-full p-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-green-100 text-sm mb-1">Total Amount</p>
                <p class="text-3xl font-bold">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</p>
            </div>
            <div class="bg-white bg-opacity-20 rounded-full p-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl shadow-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-purple-100 text-sm mb-1">Status</p>
                <p class="text-3xl font-bold">{{ ucfirst($order->status) }}</p>
            </div>
            <div class="bg-white bg-opacity-20 rounded-full p-4">
                @if($order->status == 'completed')
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                @else
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2">
        <div class="bg-white rounded-xl shadow-lg p-8 mb-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Customer Information</h2>
            <div class="flex items-center mb-6">
                <div class="bg-gradient-to-r from-blue-500 to-purple-600 rounded-full w-16 h-16 flex items-center justify-center text-white font-bold text-2xl mr-4">
                    {{ substr($order->user->name, 0, 1) }}
                </div>
                <div>
                    <p class="text-xl font-semibold text-gray-900">{{ $order->user->name }}</p>
                    <p class="text-gray-600">{{ $order->user->email }}</p>
                </div>
            </div>
            <div class="border-t pt-6">
                <p class="text-sm font-semibold text-gray-600 mb-1">Order Date</p>
                <p class="text-lg text-gray-900">{{ $order->created_at->format('d M Y, H:i') }}</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Order Items</h2>
            <div class="space-y-4">
                @foreach($order->orderItems as $item)
                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition duration-200">
                    <div class="flex justify-between items-start">
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $item->product->name }}</h3>
                            <div class="flex items-center gap-4 text-sm text-gray-600">
                                <span>Price: <span class="font-semibold text-gray-900">Rp {{ number_format($item->price, 0, ',', '.') }}</span></span>
                                <span>Qty: <span class="font-semibold text-gray-900">{{ $item->quantity }}</span></span>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-600 mb-1">Subtotal</p>
                            <p class="text-xl font-bold text-green-600">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="border-t mt-6 pt-6">
                <div class="flex justify-between items-center">
                    <span class="text-2xl font-bold text-gray-800">Total</span>
                    <span class="text-3xl font-bold text-green-600">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="lg:col-span-1">
        <div class="bg-white rounded-xl shadow-lg p-8 sticky top-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Order Summary</h2>
            <div class="space-y-4">
                <div class="flex justify-between items-center pb-4 border-b">
                    <span class="text-gray-600">Items Count</span>
                    <span class="font-semibold text-gray-900">{{ $order->orderItems->count() }}</span>
                </div>
                <div class="flex justify-between items-center pb-4 border-b">
                    <span class="text-gray-600">Status</span>
                    @if($order->status == 'completed')
                        <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-semibold">Completed</span>
                    @elseif($order->status == 'cancelled')
                        <span class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-sm font-semibold">Cancelled</span>
                    @elseif($order->status == 'processing')
                        <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-semibold">Processing</span>
                    @else
                        <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm font-semibold">Pending</span>
                    @endif
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-lg font-semibold text-gray-800">Total</span>
                    <span class="text-2xl font-bold text-green-600">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection