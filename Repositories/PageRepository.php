<?php

namespace Modules\Page\Repositories;

use Modules\Core\Repositories\Eloquent\EloquentSlugRepository;

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
     * @param $model
     * @param array $data
     *
     * @return object
     */
    /*   public function update($model, $data)
       {
           if(!$model->published && $data['published']==1) {
               $model->recordActivity('published');
           } elseif($model->published && $data['published']==1) {
               $model->recordActivity('updated');
           }

           $model->update($data);
           return $model;
       }
   */

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function allPublishedPages()
    {
        if (!\Schema::hasTable('page__pages')) {
            return collect(null);
        }

        return $this->model->where('published', 1)->get();
    }
}
