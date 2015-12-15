<?php

namespace Modules\Page\Repositories;

use Modules\Core\Repositories\Eloquent\EloquentSlugRepository;

/**
 * Class PageRepository
 * @package Modules\Page\Repositories
 */
class PageRepository extends EloquentSlugRepository
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return 'Modules\\Page\\Entities\\Page';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findPublishedPageBySlug($slug)
    {
        return $this->model->where('published', 1)->where('slug', $slug)->first();
    }


    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function allPublishedPages()
    {
        return $this->model->where('published', 1)->get();
    }

    /**
     * @return mixed
     */
    public function allWhereToCreateMenuEntry()
    {
        return $this->model->where('published', 1)->where('create_menu_entry', 1)->get();
    }
}
