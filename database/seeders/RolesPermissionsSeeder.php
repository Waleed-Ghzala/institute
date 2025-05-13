<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\year;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $managerRole = Role::firstOrCreate(['name' => 'manager']);
        $teacherRole = Role::firstOrCreate(['name' => 'teacher']);
        $studentRole = Role::firstOrCreate(['name' => 'student']);
        $employeeRole = Role::firstOrCreate(['name' => 'employee']);
        $pendingStudentRole=Role::create(['name'=>'pendingStudent']);
 //$departmentOfficialRole = Role::firstOrCreate(['name' => 'Departmentofficial']);
 
Permission::create(['name'=>'applyingAdmissions']);
 Permission::firstOrCreate(['name' => 'approved']);

        $managerRole->givePermissionTo(Permission::all());
        $teacherRole->givePermissionTo(['approved']);
$pendingStudentRole->givePermissionTo(['applyingAdmissions']);



        $manager = User::firstOrCreate([
            'email' => 'manager@gmail.com',
                'full_name' => 'manager',
                'password' => bcrypt('12345678'),
                'address' => 'Damascus',    
                'Mobile_number' => '09554354',
                'birth_date' => '1990-03-12',
                'role' => 'manager',
               'status' =>'approved',


            ]
        );
            $manager->assignRole('manager');

year::create([
'year'=>'first',
]);
year::create([
    'year'=>'second',
    ]);
    



        
    }
}
