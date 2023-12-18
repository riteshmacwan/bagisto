<?php

namespace Webkul\Admin\DataGrids\Test;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Webkul\DataGrid\DataGrid;

class TestDataGrid extends DataGrid
{
    /**
     * Index.
     *
     * @var string
     */
    protected $primaryColumn = 'test_id';

    /**
     * Prepare query builder.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('tests')
            ->addSelect(
                'id as test_id',
                'name as test_name'
            );

        $this->addFilter('test_id', 'id');
        $this->addFilter('test_name', 'name');

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
            'index'      => 'test_id',
            'label'      => trans('admin::app.test.index.datagrid.id'),
            'type'       => 'integer',
            'searchable' => true,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'test_name',
            'label'      => trans('admin::app.test.index.datagrid.name'),
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
    // public function prepareActions()
    // {
    //     if (bouncer()->hasPermission('settings.users.users.edit')) {
    //         $this->addAction([
    //             'icon'   => 'icon-edit',
    //             'title'  => trans('admin::app.settings.users.index.datagrid.edit'),
    //             'method' => 'GET',
    //             'url'    => function ($row) {
    //                 return route('admin.settings.users.edit', $row->user_id);
    //             },
    //         ]);
    //     }

    //     if (bouncer()->hasPermission('settings.users.users.delete')) {
    //         $this->addAction([
    //             'icon'   => 'icon-delete',
    //             'title'  => trans('admin::app.settings.users.index.datagrid.delete'),
    //             'method' => 'DELETE',
    //             'url'    => function ($row) {
    //                 return route('admin.settings.users.delete', $row->user_id);
    //             },
    //         ]);
    //     }
    // }
}
