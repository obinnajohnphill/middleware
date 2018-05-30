<?php
/**
 * Created by PhpStorm.
 * User: obinnajohnphill
 * Date: 30/05/18
 * Time: 10:08
 */

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        App\Articles::unguard();

        $faker = Faker\Factory::create();
        foreach(range(1, 30) as $index) {
            App\Articles::create([
                'title' => $faker->sentence(5),
                'content' => $faker->paragraph(2)
            ]);
        }

        App\Articles::reguard();
    }

}