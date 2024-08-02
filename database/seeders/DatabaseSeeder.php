<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(DisbursedBySeeder::class);
        $this->call(InterestMethodSeeder::class);
        $this->call(InterestTypeSeeder::class);
        $this->call(RepaymentCycleSeeder::class);
        $this->call(RepaymentOrderSeeder::class);
        $this->call(CompanyAccountSeeder::class);
        $this->call(StatusesSeeder::class);
        $this->call(ServiceChargeSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(LoanStatusSeeder::class);
        $this->call(InstitutionSeeder::class);
        $this->call(LoanApplicationSeeder::class);
        $this->call(InstitutionSeeder::class);
        $this->call(LoanProductSeeder::class);
        $this->call(LoanCrbProduct::class);

    }
}
