<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    
     public function run()
     {
          \DB::table('courses')->insert([
             [
                 'nama'          => 'SOUNEN',
                 'category_id'   => 1
             ],
             [
                 'nama'          => 'ACTION',
                 'category_id'   => 1
             ],
             [
                 'nama'          => 'ISEKAI',
                 'category_id'   => 1
             ],
             [
                 'nama'          => 'ROMANCE',
                 'category_id'   => 2
             ],
             [
                 'nama'          => 'HighSchools',
                 'category_id'   => 2
             ],
             [
                 'nama'          => 'Slice Of Life',
                 'category_id'   => 2
             ],
            ]);
 }


    

}

