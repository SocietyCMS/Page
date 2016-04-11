<?php

namespace Modules\Page\Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Core\Traits\Factory\useFactories;
use Modules\Menu\Entities\Menu;

class DemoTableSeeder extends Seeder
{
    use useFactories;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::table('page__pages')->delete();

        $this->factory(\Modules\Page\Entities\Page::class, 8)->create()
            ->each(function($article) {
            $faker = Factory::create();

            $activity = $article->activities->first();
            $activity->update([
                'created_at' => $start = $faker->dateTimeThisYear,
                'updated_at' => $faker->dateTimeBetween($start),
            ]);
        });

        $this->createMenuEntry();
    }

    /**
     * @internal param $generatedRecords
     */
    private function createMenuEntry()
    {
        $records = \Modules\Page\Entities\Page::where('published', 1)->take(3)->get();

        if ($main = Menu::root()->where(['name' => 'Main'])->first()) {
            foreach( $records as $element ){
                $main->children()->create(['name' => $element['title'], 'url' => "page/{$element['slug']}", 'active' => true]);
            }
        }


    }
}
