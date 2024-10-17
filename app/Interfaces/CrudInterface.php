<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface CrudInterface{

    public function findAll(): Collection;
    public function paginate(int $number_item);
    public function findOrFail(int $id): Model;
    public function findWhere(array $data): Collection;
    public function findWhereOrderBy(array $data, string $column, string $mode): Collection;
    public function store(array $data): Model;
    public function update(array $data, int $id): void;
    public function delete(int $id): void;
    public function updateWhere(array $data_where, array $data_update): void;
    public function deleteWhere(array $data_where): void;

}
