<?php

namespace Database\Seeders;

use App\Models\Characteristic;
use App\Models\Customer;
use App\Models\Dome;
use App\Models\Offer;
use App\Models\PaymentMethod;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Asistente']);

        Permission::create(['name' => 'home'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'characteristics'])->syncRoles([$role1]);
        Permission::create(['name' => 'bookings'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'payment-methods'])->syncRoles([$role1]);
        Permission::create(['name' => 'users'])->syncRoles([$role1]);
        Permission::create(['name' => 'customers'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'permissions'])->syncRoles([$role1]);
        Permission::create(['name' => 'services'])->syncRoles([$role1]);
        Permission::create(['name' => 'offers'])->syncRoles([$role1]);
        Permission::create(['name' => 'domes'])->syncRoles([$role1]);



        User::create(['name' => 'Jefe', 'email' => 'admin@nube.com', 'password' => '12345678']);
        User::create(['name' => 'Empleado', 'email' => 'asistente@nube.com', 'password' => '12345678']);
        Characteristic::create(['name' => 'Tv Hd','description' => 'television mamalona']);
        Dome::create(['name' => 'Margarita','state' => '0','price' => '40000','location' => 'sur','description' => 'Lindo domo en un lago','capacity' => '4']);
        Service::create(['name' => 'Piscina','state' => '0','price' => '20000','quantity' => '10']);
        Service::create(['name' => 'cabalgata','state' => '0','price' => '30000','quantity' => '10']);
        Offer::create(['name' => 'no aplica','discount' => '0']);
        Offer::create(['name' => 'Cumpleaños','discount' => '10000']);
        Customer::create(['name' => 'pablo','last_name' => 'perez','email' => 'pablito@gmail.com','phone_number' => '3024542233','birthdate' => '2023-09-07','city' => 'Medellin','address' => 'kra 17i#5a10']);
        PaymentMethod::create(['name' => 'visa']);
        
        

        $user = User::find(1);
        $user->assignRole('Admin');

        $user1 = User::find(2);
        $user1->assignRole('Asistente');

    }
}
