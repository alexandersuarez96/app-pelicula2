<?php

use Illuminate\Database\Seeder;

class TypeMoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\TypeMovie::class,30)->create();
    }
}
