<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * Class IpLocationSeeder
 */
class IpLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sqlFile = database_path('dumps/ip_location.sql');

        $db = [
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'host' => env('DB_HOST'),
            'database' => env('DB_DATABASE')
        ];

        exec("mysql --user={$db['username']} --password={$db['password']} --host={$db['host']} --database={$db['database']} < $sqlFile");
    }
}
