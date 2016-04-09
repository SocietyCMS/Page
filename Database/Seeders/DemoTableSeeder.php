<?php

namespace Modules\Page\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Core\Traits\Factory\useFactories;

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

        $this->factory(\Modules\Page\Entities\Page::class, 8)->create();
    }
}
