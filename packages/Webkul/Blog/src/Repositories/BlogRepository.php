<?php

namespace Webkul\Blog\Repositories;

use Webkul\Core\Eloquent\Repository;

class BlogRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    function model(): string
    {
        return 'Webkul\Blog\Contracts\Blog';
    }

    /**
     * @param  array  $data
     * @return \Webkul\Blog\Contracts\Blog
     */
    public function create(array $data)
    {
        $blog = $this->model->create($data);

        return $blog;
    }

    /**
     * @param  string  $id
     * @return \Webkul\Blog\Contracts\Blog
     */
    public function findOrFail($id, $columns = ['*'])
    {
        $blog = $this->model->findOrFail($id);

        return $blog;
    }

    /**
     * @param  array  $data
     * @param  int  $id
     * @param  string  $attribute
     * @return \Webkul\Blog\Contracts\Blog
     */
    public function update(array $data, $id, $attribute = "id")
    {
        try {
            $blog = $this->model->find($id);
            if (!$blog) {
                return ["success" => true, 'message' => "Record not found"];
            }
            $blog->update($data);
            return ["success" => true];
        } catch (\Exception $e) {
            return ["success" => false];
        }
    }

    /**
     * @param  string  $id
     * @return \Webkul\Blog\Contracts\Blog
     */
    public function delete($id)
    {
        try {
            $blog = $this->model->find($id);
            if (!$blog) {
                return ["success" => false, "message" => "Record is not found"];
            }
            $blog->delete();
            return ["success" => true, "message" => "Record is deleted"];
        } catch (\Exception $e) {
            return ["success" => false, "message" => $e->getMessage()];
        }
    }
}
