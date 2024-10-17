<?php

namespace App\Repositories;

use App\Interfaces\CrudInterface;
use App\Models\Estudante;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EstudanteRepository implements CrudInterface
{

    public function findAll(): Collection
    {
        return Estudante::all();
    }

    public function paginate(int $number_item)
    {
        return Estudante::paginate($number_item);
    }

    public function findOrFail(int $id): Model
    {
        return Estudante::findOrFail($id);
    }

    public function findWhere(array $data): Collection
    {
        return Estudante::where($data)->get();
    }

    public function findWhereOrderBy(array $data, string $column, string $mode): Collection {
        return Estudante::where($data)->orderBy("$column", "$mode")->get();
    }

    public function store(array $data): Model {
        return Estudante::create($data);
    }

    public function update(array $data, int $id): void {
        Estudante::findOrFail($id)->update($data);
    }

    public function delete(int $id): void {
        Estudante::findOrFail($id)->delete();
    }

    public function updateWhere(array $data_where, array $data_update): void {
        Estudante::where($data_where)->update($data_update);
    }

    public function deleteWhere(array $data_where): void {
        Estudante::where($data_where)->delete();
    }
}
