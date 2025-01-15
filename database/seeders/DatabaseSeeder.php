<?php

namespace Database\Seeders;
use App\Models\BlogPost;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\UserAddress;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = new User();
        $user->name = 'Admin Account';
        $user->first_name = 'Admin';
        $user->last_name = 'Admin';
        $user->email = 'admin@localhost';
        $user->phone = '1234567890';
        $user->password = bcrypt('admin');
        $user->role = 'admin';
        $user->is_active = true;
        $user->save();
 // Create some products
 Product::create([
    'name' => 'Sample Product 1',
    'slug' => Str::slug('Sample Product 1'),
    'mini_description' => 'This is a sample product.',
    'description' => 'Detailed description of Sample Product 1.',
    'price' => 100.00,
    'sale_price' => 80.00,
    'sku' => 'SP-001',
    'stock' => 10,
    'featured' => true,
    'status' => 'active',
    'meta_title' => 'Sample Product 1',
    'meta_description' => 'Sample Product 1 description.',
    'weight' => 1.5,
    'dimensions' => json_encode(['length' => 10, 'width' => 5, 'height' => 3]),
    'is_default' => true,
    'tax_class' => 'standard',
]);

Product::create([
    'name' => 'Sample Product 2',
    'slug' => str::slug('Sample Product 2'),
    'mini_description' => 'This is another sample product.',
    'description' => 'Detailed description of Sample Product 2.',
    'price' => 150.00,
    'sale_price' => 120.00,
    'sku' => 'SP-002',
    'stock' => 5,
    'featured' => false,
    'status' => 'active',
    'meta_title' => 'Sample Product 2',
    'meta_description' => 'Sample Product 2 description.',
    'weight' => 2.0,
    'dimensions' => json_encode(['length' => 15, 'width' => 10, 'height' => 5]),
    'is_default' => false,
    'tax_class' => 'premium',
]);

        // Create categories
      //  $categories = \App\Models\Category::factory(10)->create();

        // Create products and attach categories
        //\App\Models\Product::factory(10)->create()->each(function ($product) use ($categories) {
            // Attach 1-3 random categories to each product
          //  $product->categories()->attach(
              //  $categories->random(rand(1, 3))->pluck('id')->toArray()
       //     );
       // });
       // ProductImage::factory(20)->create();
        // Order::factory(10)->create();
        // OrderItem::factory(10)->create();
        // UserAddress::factory(10)->create();
       // BlogPost::factory(10)->create();


        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Setting::create([
            'key' => 'website_loader',
            'value' => '0',
        ]);

        Setting::create([
            'key' => 'website_contact_number',
            'value' => '+258 3692 2569',
        ]);

        Setting::create([
            'key' => 'website_contact_email',
            'value' => 'info@ukmegamart.com'
        ]);

        Setting::create([
            'key' => 'website_contact_address',
            'value' => 'info@ukmegamart.com'
        ]);
    }
}
