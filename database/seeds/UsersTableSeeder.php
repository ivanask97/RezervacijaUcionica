<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('role_user')->truncate();

        $adminRole=Role::where('name','admin')->first();
        $profesorRole=Role::where('name','profesor')->first();
        $studentRole=Role::where('name','student')->first();

        $admin=User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('123456789')
        ]);
        $profesor=User::create([
            'name'=>'profesor',
            'email'=>'profesor@gmail.com',
            'password'=>Hash::make('123456789')
        ]);
        $student=User::create([
            'name'=>'student',
            'email'=>'student@gmail.com',
            'password'=>Hash::make('123456789')
        ]);
        $admin->roles()->attach($adminRole);
        $profesor->roles()->attach($profesorRole);
        $student->roles()->attach($studentRole);  
    }
}
