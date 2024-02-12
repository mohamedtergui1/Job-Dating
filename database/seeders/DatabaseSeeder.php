<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Skill;
use App\Models\Annonce;
use App\Models\Entreprise;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);
        
        $user = User::create([
            'name' => "admin",
            'email' => "admin@admin.com",
            'password' => Hash::make("admin"),
        ]);
        $user->assignRole("admin");
         
        User::factory(10)->create();
        Entreprise::factory(10)->create();
        Annonce::factory(10)->create();
        Skill::factory(10)->create();
   
         
      

        
        User::all()->each(function ($user) {
            $user->skills()->attach(
                Skill::inRandomOrder()->limit(rand(1, 5))->pluck('id')
            );
        });
       
         
        User::all()->each(function ($user) {
            $user->annonces()->attach(
                Annonce::inRandomOrder()->limit(rand(1, 3))->pluck('id')
            );
        });

        
        Annonce::all()->each(function ($annonce) {
            $annonce->skills()->attach(
                Skill::inRandomOrder()->limit(rand(1, 5))->pluck('id')
            );
        });

   
    }
}

