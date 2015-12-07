<?php

namespace Modules\Page\Http\Controllers\backend;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Modules\Core\Http\Controllers\AdminBaseController;
use Modules\Page\Http\Requests\PageRequest;
use Modules\Page\Repositories\PageRepository;

class PageController extends AdminBaseController
{
    /**
     * @var PageRepository
     */
    private $page;

    public function __construct(PageRepository $page)
    {
        parent::__construct();
        $this->page = $page;
    }

    public function index()
    {
        $pages = $this->page->all();

        return view('page::backend.page.index', compact('pages'));
    }

    public function create()
    {
        return view('page::backend.page.create');
    }

    public function store(PageRequest $request)
    {
        $input = array_merge($request->input(), [
            'user_id'   => Sentinel::getUser()->id,
            'slug'      => $this->page->getSlugForTitle($request->title),
            'published' => (bool) $request->published,
            ]);

        $page = $this->page->create($input);
        // write flash message and redirect
        return redirect()->route('backend::page.pages.index')
            ->with('success', 'Your page has been created successfully.');
    }

    public function edit($slug)
    {
        $page = $this->page->findBySlug($slug);

        return view('page::backend.page.edit', ['page' => $page]);
    }

    public function update(PageRequest $request, $slug)
    {
        $input = array_merge($request->input(), [
            'user_id'   => Sentinel::getUser()->id,
            'published' => (bool) $request->published,
        ]);

        $this->page->update($input, $this->page->findBySlug($slug)->id);
        // write flash message and redirect
        return redirect()->route('backend::page.pages.index')
            ->with('success', 'Your page has been updated successfully.');
    }
}
