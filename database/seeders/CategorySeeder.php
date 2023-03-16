<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
            'name' => ' *1*  Category 1',
            ],
            [
            'name' => ' *2* Category 2',
            ],
            [
            'name' => ' *3* Category 3',
            ],
            [
            'name' => ' *4* Category 4',
            ],
            [
            'name' => ' *5* Category 5',
            ]

        ]);
        DB::table('categories')->insert([
            [
            'name' => ' *6* subCategory 1 of parent 1',
            'parent_id' => 1
            ],
            [
            'name' => ' *7* subCategory 2 of parent 1',
            'parent_id' => 1
            ]
        ]);
        DB::table('categories')->insert([
            [
            'name' => ' *8* subCategory 1 of parent 2',
            'parent_id' => 2
            ],
            [
            'name' => ' *9* subCategory 2 of parent 2',
            'parent_id' => 2
            ]
        ]);
        DB::table('categories')->insert([
            [
            'name' => ' *10* subCategory 1 of parent 3',
            'parent_id' => 3
            ],
            [
            'name' => ' *11* subCategory 2 of parent 3',
            'parent_id' => 3
            ]
        ]);
        DB::table('categories')->insert([
            [
            'name' => ' *12* subCategory 1 of parent 6',
            'parent_id' => 6
            ],
            [
            'name' => ' *13* subCategory 2 of parent 6',
            'parent_id' => 6
            ]
        ]);
        DB::table('categories')->insert([
            [
            'name' => '*14* subCategory 1 of parent 7',
            'parent_id' => 7
            ],
            [
            'name' => ' *15* subCategory 2 of parent 7',
            'parent_id' => 7
            ]
        ]);


        DB::table('accounts')->insert([
            [
            'name' => ' *1*  Account 1',
            ]
        ]);
        DB::table('projects')->insert([
            [
            'name' => ' *1*  project 1',
            'price' => 50,
            'account_id' => 1
            ],
            [
            'name' => ' *2* project 2',
            'price' => 150,
            'account_id' => 1
            ],
            [
            'name' => ' *3* project 3',
            'price' => 250,
            'account_id' => 1
            ],
            [
            'name' => ' *4* project 4',
            'price' => 70,
            'account_id' => 1
            ],
            [
            'name' => ' *5* project 5',
            'price' => 100,
            'account_id' => 1
            ]

        ]);
        DB::table('jobs')->insert([
            [
            'name' => ' *1*  job 1',
            'amount' => 1150,
            'project_id' => 1
            ],
            [
            'name' => ' *2* job 2',
            'amount' => 1150,
            'project_id' => 2
            ],
            [
            'name' => ' *3* job 3',
            'amount' => 1250,
            'project_id' => 3
            ],
            [
            'name' => ' *4* job 4',
            'amount' => 1170,
            'project_id' => 4
            ],
            [
            'name' => ' *5* job 5',
            'amount' => 1100,
            'project_id' => 5
            ]

        ]);
        DB::table('tasks')->insert([
            [
            'name' => ' *1*  task 1',
            'job_id' => 1
            ],
            [
            'name' => ' *2* task 2',
            'job_id' => 2
            ],
            [
            'name' => ' *3* task 3',
            'job_id' => 3
            ],
            [
            'name' => ' *4* task 4',
            'job_id' => 4
            ],
            [
            'name' => ' *5* task 5',
            'job_id' => 5
            ]

        ]);





        }
    }
