<?php
namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Todo;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed user admin
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'is_admin' => true,
        ]);

        // Seed random categories
        $categories = Category::factory(10)->create();

        // Seed random users
        $users = User::factory(10)->create();

        // Seed random todos, mengaitkan kategori dan pengguna secara acak
        Todo::factory(10)->create([
            'user_id' => '1',  // Random user
            'category_id' => $categories->random()->id,  // Random category
        ]);
    }
}
