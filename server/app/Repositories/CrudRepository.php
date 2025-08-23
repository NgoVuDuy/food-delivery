<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

abstract class CrudRepository {

    protected Model $model;

    public function __construct(Model $model) {
        
        $this->model = $model;

    }

    public function findAll() {

        return $this->model::all();
    }

    public function findById(int $id) {

        $record = $this->model::find($id);

        if(!$record) {

            // report(new ResourceNotFoundException('Không tìm thấy tài nguyên'));
            throw new NotFoundHttpException('Không tìm thấy tài nguyên');
        }

        return $this->model::find($id);
    }

    public function create(array $data) {

        return $this->model::create($data);
    }

    public function update(int $id, array $data) {

        $record = $this->model::find($id);

        if(!$record) {

            return null;
        }

        return $record->update($data);
    }

    public function delete(int $id) {

        $record = $this->model::find($id);

        if(!$record) {

            return null;
        }

        return $record->delete();
    }

}
