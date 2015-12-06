<?php namespace Modules\Page\Presenters;

use Carbon\Carbon;
use Laracasts\Presenter\Presenter;

class PagePresenter extends Presenter
{
    /**
     * Format created_at
     *
     * @return string
     */
    public function createdAt()
    {
        $created = $this->created_at;

        return Carbon::createFromFormat('Y-m-d H:i:s', $created)
            ->formatLocalized('%d %b. %Y');
    }

    /**
     * Format updated_at
     *
     * @return string
     */
    public function updatedAt()
    {
        $updated = $this->updated_at;

        return Carbon::createFromFormat('Y-m-d H:i:s', $updated)
            ->formatLocalized('%d %b. %Y');
    }
}
