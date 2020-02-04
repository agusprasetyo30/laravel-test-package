<?php

use Illuminate\Database\Seeder;
use App\Ajax_test;

class AjaxTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ajax_test::create([
            'task'        => 'Task 1',
            'description' => 'Saya mencoba ajax pada task 1',
            'done'        => false
        ]);
        
        Ajax_test::create([
            'task'        => 'Task 2',
            'description' => 'Saya mencoba ajax pada task 2',
            'done'        => false
        ]);
    }
}
