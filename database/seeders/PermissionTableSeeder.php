<?php
namespace Database\Seeders;
use Illuminate\database\seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $permissions = [

            'invoices',
            ' invoices list',
            ' Paid invoices',
            'unpaid invoices',
            'partialy paid invoices',
            'Archive',
            'Reports',
            'Invoices Reports ',
            'User Reports',
            'Users',
            'Users List',
            'Users Permissions',
            'Settings',
            'Sections',
            'products',


            'Add Invoice',
            'Delete Invoice ',
            'Change payment status  ',
            'Edit invoice ',
            'Archive invoice ',
            'print invoice',
            'Add attachment ',
            'Delete attachment ',

            'Add User ',
            'Edit User',
            'Delete User ',

            'Show Permission',
            'Add Permission',
            'Edit Permission',
            'Delete Permission',

            'Add product ',
            'Edit product ',
            'Delete product ',

            'Add Section',
            'Edit Section',
            'Delete Section ',
            'Notifications',

        ];

        foreach ($permissions as $permission) {

            Permission::create(['name' => $permission]);
        }


    }
}