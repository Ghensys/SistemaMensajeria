<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(InstitutionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ManagementTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(PrioritiesTableSeeder::class);
        $this->call(RepliesTableSeeder::class);
        $this->call(StatusCommunicationTableSeeder::class);
        $this->call(StatusTasksTableSeeder::class);
        $this->call(CommunicationTypesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
