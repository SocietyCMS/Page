<?php

namespace Modules\Page\Entities;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Modules\Menu\Repositories\ProvidesMenuItem;
use Modules\User\Traits\Activity\RecordsActivity;

class Page extends Model
{
    use RecordsActivity;
    use PresentableTrait;
    use ProvidesMenuItem;
    /**
     * Presenter Class.
     *
     * @var string
     */
    protected $presenter = 'Modules\Page\Presenters\PagePresenter';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'page__pages';

    /**
     * The fillable properties of the model.
     *
     * @var array
     */
    protected $fillable = ['title', 'slug', 'body', 'published', 'create_menu_entry', 'user_id'];

    /**
     * Views for the Dashboard timeline.
     *
     * @var string
     */
    protected static $templatePath = 'page::backend.activities';

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['user'];

    /**
     * USer relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo("Modules\\User\\Entities\\Entrust\\EloquentUser", 'user_id');
    }

    /**
     * @return mixed
     */
    public function getRouteForMenuItem()
    {
        return route('page', ['uri' => $this->slug]);
    }

}
