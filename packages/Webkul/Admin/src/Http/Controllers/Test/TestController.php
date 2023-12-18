<?php

namespace Webkul\Admin\Http\Controllers\Test;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Event;
use Webkul\Test\Repositories\TestRepository;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Admin\DataGrids\Test\TestDataGrid;
use Webkul\Admin\Http\Requests\MassDestroyRequest;


class TestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected TestRepository $testRepository)
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
            return app(TestDataGrid::class)->toJson();
        }

        return view('admin::test.index');
    }

    /**
     * To create a new Blog page.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin::test.create');
    }

    /**
     * To store a new blog page in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'name'   => 'required',
        ]);

        // Event::dispatch('cms.pages.create.before');

        $data = request()->only([
            'name',
        ]);

        $page = $this->testRepository->create($data);

        // Event::dispatch('cms.pages.create.after', $page);

        session()->flash('success', trans('admin::app.test.create-success'));

        return redirect()->route('admin.test.index');
    }

    /**
     * To edit a previously created CMS page.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // $page = $this->$blogRepository->findOrFail($id);

        return view('admin::cms.edit', compact('page'));
    }

    /**
     * To update the previously created CMS page in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update($id)
    // {
    //     $locale = core()->getRequestedLocaleCode();

    //     $this->validate(request(), [
    //         $locale . '.url_key'      => ['required', new \Webkul\Core\Rules\Slug, function ($attribute, $value, $fail) use ($id) {
    //             if (!$this->cmsRepository->isUrlKeyUnique($id, $value)) {
    //                 $fail(trans('admin::app.cms.index.already-taken', ['name' => 'Page']));
    //             }
    //         }],
    //         $locale . '.page_title'   => 'required',
    //         $locale . '.html_content' => 'required',
    //         'channels'                => 'required',
    //     ]);

    //     Event::dispatch('cms.pages.update.before', $id);

    //     $data = [
    //         $locale    => request()->input($locale),
    //         'channels' => request()->input('channels'),
    //         'locale'   => $locale,
    //     ];

    //     $page = $this->cmsRepository->update($data, $id);

    //     Event::dispatch('cms.pages.update.after', $page);

    //     session()->flash('success', trans('admin::app.cms.update-success'));

    //     return redirect()->route('admin.cms.index');
    // }

    /**
     * To delete the previously create CMS page.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    // public function delete($id): JsonResponse
    // {
    //     Event::dispatch('cms.pages.delete.before', $id);

    //     $this->cmsRepository->delete($id);

    //     Event::dispatch('cms.pages.delete.after', $id);

    //     return new JsonResponse(['message' => trans('admin::app.cms.delete-success')]);
    // }


}
