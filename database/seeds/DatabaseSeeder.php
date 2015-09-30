<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    protected $seeders = [
        UserTableSeeder::class,
        MessageTableSeeder::class,
    ];

    /**
     * Clean out the database for a new seed generation.
     */
    private function cleanDatabase()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        $tableNames = Schema::getConnection()->getDoctrineSchemaManager()->listTableNames();
        foreach ($tableNames as $name) {
            //if you don't want to truncate migrations
            if ($name == 'migrations') {
                continue;
            }
            DB::table($name)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->cleanDatabase();

        foreach ($this->seeders as $seedClass) {
            $this->call($seedClass);
        }

        Model::reguard();
    }
}
