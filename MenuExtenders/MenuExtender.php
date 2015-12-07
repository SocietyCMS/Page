<?php

namespace Modules\Page\MenuExtenders;

use Modules\Core\Contracts\Authentication;
use Modules\Menu\Repositories\Menu\MenuRepository;
use Modules\Page\Repositories\PageRepository;

class MenuExtender implements \Modules\Menu\Repositories\MenuExtender
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
     * @param MenuRepository $menuRepository
     *
     * @return MenuRepository
     */
    public function extendWith(MenuRepository $menuRepository)
    {
        $publishedPages = $this->page->allPublishedPages();

        foreach ($publishedPages as $page) {
            $menuRepository->mainMenu()->route('page', $page->title, [$page->slug]);
        }

        return $menuRepository;
    }
}