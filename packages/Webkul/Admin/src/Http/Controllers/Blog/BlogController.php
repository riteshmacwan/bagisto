<?php

namespace Webkul\Admin\Http\Controllers\Blog;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Event;
use Webkul\Blog\Repositories\BlogRepository;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Admin\DataGrids\Blog\BlogDataGrid;
use Webkul\Admin\Http\Requests\BlogRequest;
use Webkul\Admin\Http\Requests\MassDestroyRequest;


class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected BlogRepository $blogRepository)
    {
    }

    /**
     * Loads the index page showing the static pages resources.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (request()->ajax()) {
            return app(BlogDataGrid::class)->toJson();
        }

        return view('admin::blog.index');
    }

    /**
     * To create a new Blog page.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin::blog.create');
    }

    /**
     * To store a new blog page in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {

        $data = $request->all();

        $this->blogRepository->create($data);

        session()->flash('success', trans('admin::app.blog.create-success'));

        return redirect()->route('admin.blog.index');
    }

    /**
     * To edit a previously created CMS page.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $blog = $this->blogRepository->findOrFail($id);

        return view('admin::blog.edit', compact('blog'));
    }

    /**
     * To update a blog in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, $id)
    {
        $data = $request->all();

        $response = $this->blogRepository->update($data, $id);
        if (!$response['success']) {
            session()->flash('false', 'Something went wrong');
        }
        session()->flash('success', trans('admin::app.blog.update-success'));

        return redirect()->route('admin.blog.index');
    }

    /**
     * To delete the previously create blog.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id): JsonResponse
    {
        $response = $this->blogRepository->delete($id);
        return new JsonResponse(['message' => $response['success'] ? trans('admin::app.blog.delete-success') : $response['message']]);
    }
}
