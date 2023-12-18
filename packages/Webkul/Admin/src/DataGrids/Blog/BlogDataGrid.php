<?php

namespace Webkul\Admin\DataGrids\Blog;

use Illuminate\Support\Facades\DB;
use Webkul\Blog\Models\Blog;
use Webkul\DataGrid\DataGrid;

class BlogDataGrid extends DataGrid
{
    /**
     * Prepare query builder.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('blogs')
            ->addSelect(
                'id',
                'name',
                'description'
            )->whereNull('deleted_at');

        return $queryBuilder;
    }


    /**
     * Add columns.
     *
     * @return void
     */
    public function prepareColumns()
    {
        $this->addColumn([
            'index'      => 'id',
            'label'      => trans('admin::app.blog.index.datagrid.id'),
            'type'       => 'integer',
            'searchable' => true,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'name',
            'label'      => trans('admin::app.blog.index.datagrid.name'),
            'type'       => 'string',
            'searchable' => true,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'description',
            'label'      => trans('admin::app.blog.index.datagrid.description'),
            'type'       => 'string',
            'searchable' => true,
            'filterable' => true,
            'sortable'   => true,
        ]);
    }

    /**
     * Prepare actions.
     *
     * @return void
     */
    public function prepareActions()
    {
        if (bouncer()->hasPermission('blog.edit')) {
            $this->addAction([
                'icon'   => 'icon-edit',
                'title'  => trans('admin::app.blog.index.datagrid.edit'),
                'method' => 'GET',
                'url'    => function ($row) {
                    return route('admin.blog.edit', $row->id);
                },
            ]);
        }

        if (bouncer()->hasPermission('blog.delete')) {
            $this->addAction([
                'icon'   => 'icon-delete',
                'title'  => trans('admin::app.blog.index.datagrid.delete'),
                'method' => 'DELETE',
                'url'    => function ($row) {
                    return route('admin.blog.delete', $row->id);
                },
            ]);
        }
    }
}
