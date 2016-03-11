<?php

namespace Modules\Page\MenuExtenders;

use Modules\Core\Contracts\Authentication;
use Modules\Menu\Repositories\BaseMenuExtender;
use Modules\Page\Repositories\PageRepository;

class MenuExtender extends BaseMenuExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @var PageRepository
     */
    private $page;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(PageRepository $page, Authentication $auth)
    {
        $this->auth = $auth;
        $this->page = $page;
    }

    /**
     * @return mixed
     * @internal param MenuRepository $menuRepository
     */
    public function contentItems()
    {
        return $publishedPages = $this->page->allPublishedPages();
    }

    /**
     * @return mixed
     * @internal param MenuRepository $menuRepository
     */
    public function staticLinks()
    {
        // TODO: Implement staticLinks() method.
    }
}
