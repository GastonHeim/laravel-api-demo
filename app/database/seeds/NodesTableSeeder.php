<?php

class NodesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('nodes')->truncate();

        $parentId_1 = DB::table('nodes')->insertGetId(
            array(
                'name' => 'Parent 1',
                'notes' => 'This is the Parent 1',
                'path' => '/1',
                )
        );

        $parentId_2 = DB::table('nodes')->insertGetId(
            array(
                'name' => 'Parent 2',
                'notes' => 'This is the Parent 2',
                'path' => '/2',
                )
        );

        DB::table('nodes')->insert(array(
            array(
                'name' => 'Child 1.1',
                'notes' => 'This is the Child 1.1',
                'path' => '/1/3',
                'parent' => $parentId_1,
                ),
            array(
                'name' => 'Child 1.2',
                'notes' => 'This is the Child 1.2',
                'path' => '/1/4',
                'parent' => $parentId_1,
                ),
    		array(
                'name' => 'Child 2.1',
                'notes' => 'This is the Child 2.1',
                'path' => '/2/5',
                'parent' => $parentId_2,
                ),
    	));
    }

}
