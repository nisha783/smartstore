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
