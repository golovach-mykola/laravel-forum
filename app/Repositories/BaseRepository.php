<?php

namespace App\Repositories;


abstract class BaseRepository
{
    public $sortBy = 'created_at';
    public $sortOrder = 'asc';
    public $filter = [];
    public $with = [];

    public function getAll()
    {
        return $this->model
            ->orderBy($this->sortBy, $this->sortOrder)
            ->get();
    }

    public function paginated($paginate)
    {
        return $this
            ->model
            ->orderBy($this->sortBy, $this->sortOrder)
            ->when($this->filter, function ($query){
                $query->whereIn('user_id', $this->filter);
            })
            ->when($this->with, function ($query){
                $query->with($this->with);
            })
            ->paginate($paginate);
    }

    public function create(array $input)
    {
        $model = $this->model;
        $model->fill($input);
        $model->save();

        return $model;
    }

    public function find($id)
    {
        return $this->model->when($this->with, function ($query){
            $query->with($this->with);
        })->findOrFail($id);
    }

    public function delete($id)
    {
        return $this->find($id)->delete();
    }

    public function update($id, array $input)
    {
        $model = $this->find($id);
        $model->fill($input);
        $model->save();

        return $model;
    }
}