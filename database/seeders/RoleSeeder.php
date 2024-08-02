<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'user']);
        $role3 = Role::create(['name' => 'loan officer']);
        $role4 = Role::create(['name' => 'operations manager']);

        // Company Wallet

        // Clientele
        Permission::create(['name' => 'view clientele','group'=>'customer','permission'=>'View All', 'description' => 'View a customer'])->syncRoles([$role1, $role4, $role3]);
        Permission::create(['name' => 'edit clientele','group'=>'customer','permission'=>'Edit', 'description' => 'Edit a customer'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'delete clientele','group'=>'customer','permission'=>'Delete', 'description' => 'Delete a customer'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'create clientele','group'=>'customer','permission'=>'Create', 'description' => 'Create a customer'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'send payment remainders to customers','group'=>'customer','permission'=>'disburse funds', 'description' => 'Send payment remainders to customers'])->syncRoles([$role1, $role4, $role3]);

        // Operation Module
        Permission::create(['name' => 'view operations','group'=>'operations','permission'=>'View All', 'description' => 'View Employees'])->syncRoles([$role1, $role4]);

        // Employees
        Permission::create(['name' => 'view employees','group'=>'employee','permission'=>'View All', 'description' => 'View Employees'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'edit employee','group'=>'employee','permission'=>'Edit', 'description' => 'Update Employees'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'delete employee','group'=>'employee','permission'=>'Delete', 'description' => 'Delete Employees'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'create employee','group'=>'employee','permission'=>'Create', 'description' => 'Add/create Employees'])->syncRoles([$role1, $role4]);
        
        // Reports
        Permission::create(['name' => 'view reports','group'=>'reports','permission'=>'View All', 'description' => 'View Reports Module'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'view loan reports','group'=>'reports','permission'=>'Loan Reports ', 'description' => 'View Loan Reports'])->syncRoles([$role1, $role4]);

        // Accounting
        Permission::create(['name' => 'view accounting','group'=>'accounts','permission'=>'View All', 'description' => 'View Accounting Module'])->syncRoles([$role1]);
        Permission::create(['name' => 'view transactions','group'=>'accounts','permission'=>'View All Transactions', 'description' => 'View Payment Transactions'])->syncRoles([$role1]);
        Permission::create(['name' => 'manage funds','group'=>'accounts','permission'=>'Manage Funds', 'description' => 'Manage Company Wallet Funds'])->syncRoles([$role1]);
        Permission::create(['name' => 'view company wallet','group'=>'accounts','permission'=>'View Company wallet', 'description' => 'View company wallet'])->syncRoles([$role1]);

        // Repayments
        Permission::create(['name' => 'view repayments','group'=>'repayments','permission'=>'View All', 'description' => 'view repayments module'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'view pending repayments','group'=>'repayments','permission'=>'View All Pending', 'description' => 'view repayments pending'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'view missed repayments','group'=>'repayments','permission'=>'View All Missed', 'description' => 'view repayments missed'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'view past maturity','group'=>'repayments','permission'=>'View All Past Maturity', 'description' => 'view past maturity date loans'])->syncRoles([$role1, $role4]);
        // Permission::create(['name' => 'view loan relatives','group'=>'','permission'=>'', 'description' => 'view loan Guarantors, Missed Repayments and Past Maturity Date'])->syncRoles([$role1]);

        // Dashboard Page
        // Permission::create(['name' => 'view dashboard','group'=>'','permission'=>'', 'description' => 'See the dashboard'])->syncRoles([$role1]);
        Permission::create(['name' => 'view company financial statistics','group'=>'dashboard','permission'=>'Company Financial Stats', 'description' => 'View company financial statistics'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'help-desk and support','group'=>'dashboard','permission'=>'Help-desk Shortcut', 'description' => 'Help-desk and support'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'view kyc','group'=>'dashboard','permission'=>'KYC Shortcut', 'description' => 'view financial overview'])->syncRoles([$role2]);
        Permission::create(['name' => 'company overview dashboard','group'=>'dashboard','permission'=>'Company Stats', 'description' => 'View company overview dashboard'])->syncRoles([$role1, $role4]);
        // Permission::create(['name' => 'view all loan requests','group'=>'','permission'=>'dashboard', 'description' => 'View all loan requests'])->syncRoles([$role1]);

        // User Page
        Permission::create(['name' => 'see the list of users','group'=>'user','permission'=>'View All', 'description'=> 'Sees all the list of users registered in the system'])->syncRoles([$role1]);
        Permission::create(['name' => 'create a user','group'=>'user','permission'=>'Create', 'description'=> 'Creates a new user'])->syncRoles([$role1]);
        Permission::create(['name' => 'edit a user','group'=>'user','permission'=>'Edit', 'description'=> 'Updates a user'])->syncRoles([$role1]);
        
        // Roles Page
        Permission::create(['name' => 'view user roles','group'=>'roles','permission'=>'View All', 'description' => 'View user roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'add user roles','group'=>'roles','permission'=>'Create', 'description' => 'Add new roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'edit user roles','group'=>'roles','permission'=>'Edit', 'description' => 'Edit user roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'delete user roles','group'=>'roles','permission'=>'Delete', 'description' => 'Deletes user roles'])->syncRoles([$role1]);

        // Setting Page
        Permission::create(['name' => 'view system settings','group'=>'Settings','permission'=>'View', 'description' => 'View system settings'])->syncRoles([$role1]);
        Permission::create(['name' => 'change system settings','group'=>'Settings','permission'=>'Update', 'description' => 'Change or update system settings'])->syncRoles([$role1]);

        // Loans Page --Done
        Permission::create(['name' => 'view loans','group'=>'loan','permission'=>'View All', 'description' => 'View all loans'])->syncRoles([$role1,$role2, $role4, $role3]);
        Permission::create(['name' => 'view loan statements','group'=>'loan','permission'=>'View loan statements', 'description' => 'View all loans'])->syncRoles([$role1,$role2, $role4, $role3]);
        Permission::create(['name' => 'view pending','group'=>'loan','permission'=>'View All Pending', 'description' => 'View pending loan requests'])->syncRoles([$role1,$role2, $role4, $role3]);
        Permission::create(['name' => 'assign loan','group'=>'loan','permission'=>'Assign', 'description' => 'Assign pending loan requests'])->syncRoles([$role1]);
        Permission::create(['name' => 'view closed','group'=>'loan','permission'=>'View All Closed Loans', 'description' => 'View closed loan requests'])->syncRoles([$role1,$role2, $role4]);
        Permission::create(['name' => 'update loans','group'=>'loan','permission'=>'Update', 'description' => 'Update loan management'])->syncRoles([$role1,$role2, $role4]);
        Permission::create(['name' => 'create loans','group'=>'loan','permission'=>'Create', 'description' => 'Create loan management'])->syncRoles([$role1,$role2, $role4]);
        Permission::create(['name' => 'delete loans','group'=>'loan','permission'=>'Delete', 'description' => 'Delete loan management'])->syncRoles([$role1,$role2, $role4]);
        Permission::create(['name' => 'view loan history','group'=>'loan','permission'=>'View History', 'description' => 'View loan management'])->syncRoles([$role1, $role4]);

        // Loan  Statuses
        Permission::create(['name' => 'review loan','group'=>'loan stages','permission'=>'Review', 'description' => 'Review, accept or reject loan requests'])->syncRoles([$role1, $role4, $role3]);
        Permission::create(['name' => 'verify loan','group'=>'loan stages','permission'=>'Verify', 'description' => 'Review, accept or reject loan requests'])->syncRoles([$role1, $role4, $role3]);
        Permission::create(['name' => 'approve loan','group'=>'loan stages','permission'=>'Approval', 'description' => 'Review, accept or reject loan requests'])->syncRoles([$role1, $role4, $role3]);
        Permission::create(['name' => 'disburse fund','group'=>'loan stages','permission'=>'Disbursements', 'description' => 'Review, accept or reject loan requests'])->syncRoles([$role1, $role4, $role3]);

        Permission::create(['name' => 'processes loans','group'=>'loan stages','permission'=>'processes loans', 'description' => 'View Reports Module'])->syncRoles([$role1, $role4, $role3]);
        Permission::create(['name' => 'decline a loan','group'=>'loan stages','permission'=>'decline', 'description' => 'View Loan Reports'])->syncRoles([$role1, $role4, $role3]);
        Permission::create(['name' => 'default a loan','group'=>'loan stages','permission'=>'default', 'description' => 'View Loan Reports'])->syncRoles([$role1, $role4, $role3]);
        Permission::create(['name' => 'not taken up loan','group'=>'loan stages','permission'=>'not taken up loan', 'description' => 'View Loan Reports'])->syncRoles([$role1, $role4, $role3]);

        // --deplicated --
        // Permission::create(['name' => 'view loan requests','group'=>'loan','permission'=>'View Loan Requests', 'description' => 'View loan requests'])->syncRoles([$role1,$role2]);
        // Permission::create(['name' => 'accept and reject loan requests','group'=>'loan','permission'=>'Review', 'description' => 'Review, accept or reject loan requests'])->syncRoles([$role1]);

        // Loan Rates
        Permission::create(['name' => 'view loan rates','group'=>'loan rates','permission'=>'View Rates', 'description' => 'View loan rates management'])->syncRoles([$role1, $role4, $role3]);
        
        // Calculator
        Permission::create(['name' => 'view loan calculator','group'=>'calculator','permission'=>'View Calculator', 'description' => 'View loan management'])->syncRoles([$role1,$role2, $role4, $role3]);

        
        // Payments & Transactions
        Permission::create(['name' => 'disburse funds','group'=>'transaction','permission'=>'disburse funds', 'description' => 'Transfer funds to customers'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'make payments','group'=>'transaction','permission'=>'make payments', 'description' => 'Make payments to repay loans'])->syncRoles([$role2, $role4]);
        Permission::create(['name' => 'withdraw funds','group'=>'transaction','permission'=>'withdraw funds', 'description' => 'Withdraw loan funds'])->syncRoles([$role2, $role4]);
        
        // System Settings
        Permission::create(['name' => 'system settings','group'=>'system settings','permission'=>'system settings', 'description' => 'View loan management'])->syncRoles([$role1,$role2, $role4, $role3]);

    }
}
