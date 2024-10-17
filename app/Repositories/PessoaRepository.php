<?php

namespace App\Repositories;

use App\Interfaces\CrudInterface;
use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class PessoaRepository implements CrudInterface
{
    public function findAll(): Collection
    {
        return Pessoa::all();
    }

    public function paginate(int $number_item)
    {
        return Pessoa::paginate($number_item);
    }

    public function findOrFail(int $id): Model
    {
        return Pessoa::findOrFail($id);
    }

    public function findWhere(array $data): Collection
    {
        return Pessoa::where($data)->get();
    }

    public function findWhereOrderBy(array $data, string $column, string $mode): Collection
    {
        return Pessoa::where($data)->orderBy("$column", "$mode")->get();
    }

    public function store(array $data): Model
    {
        return Pessoa::create($data);
    }

    public function update(array $data, int $id): void
    {
        Pessoa::findOrFail($id)->update($data);
    }

    public function delete(int $id): void
    {
        Pessoa::findOrFail($id)->delete();
    }

    public function updateWhere(array $data_where, array $data_update): void
    {
        Pessoa::where($data_where)->update($data_update);
    }

    public function deleteWhere(array $data_where): void
    {
        Pessoa::where($data_where)->delete();
    }
}
