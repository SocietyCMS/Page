<?php

namespace Modules\Page\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Modules\Core\Http\Controllers\PublicBaseController;
use Modules\Page\Repositories\PageRepository;

class PublicController extends PublicBaseController
{
    /**
     * @var PageRepository
     */
    private $page;
    /**
     * @var Application
     */
    private $app;

    public function __construct(PageRepository $page, Application $app)
    {
        parent::__construct();
        $this->page = $page;
        $this->app = $app;
    }

    /**
     * @param $slug
     *
     * @return \Illuminate\View\View
     */
    public function uri($slug)
    {
        $content = $this->page->findPublishedPageBySlug($slug);

        $this->throw404IfNotFound($content);

        $template = $this->getTemplateForPage($content);

        return view($template, compact('content'));
    }

    /**
     * Return the template for the given page
     * or the default template if none found.
     *
     * @param $page
     *
     * @return string
     */
    private function getTemplateForPage($page)
    {
        return (view()->exists($page->template)) ? $page->template : 'default';
    }

    /**
     * Throw a 404 error page if the given page is not found.
     *
     * @param $page
     */
    private function throw404IfNotFound($page)
    {
        if (is_null($page)) {
            $this->app->abort('404');
        }
    }
}
