<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Factory;
use App\Models\listing;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Database\Factories\ListingFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $user = User::factory()->create([
            'name' => 'Ditik Rimal',
            'email' => 'rml.ditik@gmail.com'
        ]);
        Listing::factory(6)->create([
            'user_id' => $user->id
        ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // listing::create(
        //     [
        //         'title' => 'Laravel Senior Developer',
        //         'tags' => 'laravel, javascript',
        //         'companyName' => 'Acme Corp',
        //         'location' => 'Boston, MA',
        //         'email' => 'email1@email.com',
        //         'website' => 'https://www.acme.com',
        //         'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        //     ]
        // );
        // listing::create(
        //     [
        //         'title' => 'Full-Stack Engineer',
        //         'tags' => 'laravel, backend ,api',
        //         'companyName' => 'Stark Industries',
        //         'location' => 'New York, NY',
        //         'email' => 'email2@email.com',
        //         'website' => 'https://www.starkindustries.com',
        //         'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        //     ]
        // );
    }
}
