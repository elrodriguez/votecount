<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Setting\Database\Seeders\SettingDatabaseSeeder;
use Modules\Inventory\Database\Seeders\InventoryDatabaseSeeder;
use Modules\Staff\Database\Seeders\StaffDatabaseSeeder;
use Modules\TransferService\Database\Seeders\TransferServiceDatabaseSeeder;
use Modules\Lend\Database\Seeders\LendDatabaseSeeder;
use Modules\Pharmacy\Database\Seeders\PharmacyDatabaseSeeder;
use Modules\Restaurant\Database\Seeders\RestaurantDatabaseSeeder;
use Modules\Sales\Database\Seeders\SalesDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            SettingDatabaseSeeder::class,
            StaffDatabaseSeeder::class
        ]);
    }
}
