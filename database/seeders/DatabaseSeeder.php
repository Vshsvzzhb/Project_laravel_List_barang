<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create users
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@toko.com',
            'password' => bcrypt('password')
        ]);

        $user2 = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password')
        ]);

        // Create categories
        $elektronik = Category::create(['name' => 'Elektronik', 'description' => 'Produk elektronik']);
        $fashion = Category::create(['name' => 'Fashion', 'description' => 'Pakaian dan aksesoris']);

        // Create products
        $laptop = Product::create(['category_id' => $elektronik->id, 'name' => 'Laptop', 'description' => 'Laptop gaming berkualitas', 'price' => 5000000, 'stock' => 10]);
        $smartphone = Product::create(['category_id' => $elektronik->id, 'name' => 'Smartphone', 'description' => 'Smartphone terbaru', 'price' => 3000000, 'stock' => 20]);
        $kaos = Product::create(['category_id' => $fashion->id, 'name' => 'Kaos', 'description' => 'Kaos premium', 'price' => 50000, 'stock' => 100]);

        // Create orders
        $order1 = Order::create([
            'user_id' => $user->id,
            'total_amount' => 8000000,
            'status' => 'completed'
        ]);

        // Create order items for order 1
        OrderItem::create([
            'order_id' => $order1->id,
            'product_id' => $laptop->id,
            'quantity' => 1,
            'price' => 5000000
        ]);

        OrderItem::create([
            'order_id' => $order1->id,
            'product_id' => $smartphone->id,
            'quantity' => 1,
            'price' => 3000000
        ]);

        // Create order 2
        $order2 = Order::create([
            'user_id' => $user2->id,
            'total_amount' => 150000,
            'status' => 'processing'
        ]);

        OrderItem::create([
            'order_id' => $order2->id,
            'product_id' => $kaos->id,
            'quantity' => 3,
            'price' => 50000
        ]);

        // Create order 3
        $order3 = Order::create([
            'user_id' => $user->id,
            'total_amount' => 3000000,
            'status' => 'pending'
        ]);

        OrderItem::create([
            'order_id' => $order3->id,
            'product_id' => $smartphone->id,
            'quantity' => 1,
            'price' => 3000000
        ]);

        // Create order 4
        $order4 = Order::create([
            'user_id' => $user2->id,
            'total_amount' => 5050000,
            'status' => 'cancelled'
        ]);

        OrderItem::create([
            'order_id' => $order4->id,
            'product_id' => $laptop->id,
            'quantity' => 1,
            'price' => 5000000
        ]);

        OrderItem::create([
            'order_id' => $order4->id,
            'product_id' => $kaos->id,
            'quantity' => 1,
            'price' => 50000
        ]);
    }
}
