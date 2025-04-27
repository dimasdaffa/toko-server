<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Item;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat user admin
        $user = User::create([
            'name' => 'User A',
            'email' => 'usera@example.com',
            'password' => Hash::make('userapassword'),
        ]);

        // Buat user tambahan
        $user2 = User::create([
            'name' => 'User B',
            'email' => 'userb@example.com',
            'password' => Hash::make('userpassword'),
        ]);

        $user3 = User::create([
            'name' => 'User C',
            'email' => 'userc@example.com',
            'password' => Hash::make('usercpassword'),
        ]);

        $user4 = User::create([
            'name' => 'User D',
            'email' => 'userd@example.com',
            'password' => Hash::make('userdpassword'),
        ]);

        // Buat kategori
        $category1 = Category::create([
            'name' => 'Elektronik',
            'description' => 'Barang-barang elektronik',
            'created_by' => $user->id,
        ]);

        $category2 = Category::create([
            'name' => 'Peralatan Rumah',
            'description' => 'Alat-alat rumah tangga',
            'created_by' => $user2->id,
        ]);
        $category3 = Category::create([
            'name' => 'Peralatan Tulis',
            'description' => 'Alat-alat tulis',
            'created_by' => $user3->id,
        ]);
        $category4 = Category::create([
            'name' => 'Peralatan Makan',
            'description' => 'Alat-alat makan',
            'created_by' => $user4->id,
        ]);

        // Buat supplier
        $supplier1 = Supplier::create([
            'name' => 'Supplier A',
            'contact_info' => 'supplierA@example.com',
            'created_by' => $user->id,
        ]);

        $supplier2 = Supplier::create([
            'name' => 'Supplier B',
            'contact_info' => 'supplierB@example.com',
            'created_by' => $user3->id,
        ]);

        // Buat item
        Item::create([
            'name' => 'Laptop Acer',
            'description' => 'Laptop Acer terbaru',
            'price' => 7000000,
            'quantity' => 10,
            'category_id' => $category1->id,
            'supplier_id' => $supplier1->id,
            'created_by' => $user4->id,
        ]);

        Item::create([
            'name' => 'Blender Philips',
            'description' => 'Blender serbaguna',
            'price' => 500000,
            'quantity' => 20,
            'category_id' => $category2->id,
            'supplier_id' => $supplier2->id,
            'created_by' => $user->id,
        ]);
        Item::create([
            'name' => 'Pensil 2B',
            'description' => 'Pensil berkualitas tinggi',
            'price' => 4000,
            'quantity' => 3,
            'category_id' => $category3->id,
            'supplier_id' => $supplier2->id,
            'created_by' => $user->id,
        ]);
        Item::create([
            'name' => 'Piring Wadimor',
            'description' => 'Piring keramik',
            'price' => 20000,
            'quantity' => 2,
            'category_id' => $category4->id,
            'supplier_id' => $supplier2->id,
            'created_by' => $user->id,
        ]);
        Item::create([
            'name' => 'Gelas',
            'description' => 'Gelas kaca',
            'price' => 10000,
            'quantity' => 10,
            'category_id' => $category4->id,
            'supplier_id' => $supplier1->id,
            'created_by' => $user->id,
        ]);
    }
}
