<?php

namespace Modules\Page\Entities;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Modules\Core\Traits\Entities\RelatesToUser;
use Modules\Menu\Repositories\ProvidesMenuItem;
use Modules\Core\Traits\Activity\RecordsActivity;

class Page extends Model
{
    use RecordsActivity;
    use PresentableTrait;
    use ProvidesMenuItem;

    use RelatesToUser;

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
    protected $fillable = ['title', 'slug', 'body', 'published', 'user_id'];

    /**
     * Views for the Dashboard timeline.
     *
     * @var string
     */
    protected static $templatePath = 'page::backend.activities';

    /**
     * Privacy setting for the dashboard. Pages are public.
     *
     * @var string
     */
    protected static $activityPrivacy = 'public';
    
    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['user'];
    
    /**
     * @return mixed
     */
    public function getRouteForMenuItem()
    {
        return route('page', ['uri' => $this->slug]);
    }

}
