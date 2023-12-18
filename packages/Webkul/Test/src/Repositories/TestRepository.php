<?php

namespace Webkul\Test\Repositories;

use Webkul\Core\Eloquent\Repository;

class TestRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    function model(): string
    {
        return 'Webkul\Test\Contracts\Test';
    }

    /**
     * @param  array  $data
     * @return \Webkul\Test\Contracts\Test
     */
    public function create(array $data)
    {
        $blog = $this->model()::create($data);

        return $blog;
    }
}
