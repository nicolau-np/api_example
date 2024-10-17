<?php

namespace App\Services;

use App\Repositories\EstudanteRepository;
use App\Repositories\PessoaRepository;
use Illuminate\Support\Facades\DB;

class EstudanteService
{

    protected $pessoaRepository;
    protected $estudanteRepository;

    public function __construct(
        PessoaRepository $pessoaRepository,
        EstudanteRepository $estudanteRepository,
    ) {
        $this->pessoaRepository = $pessoaRepository;
        $this->estudanteRepository = $estudanteRepository;
    }

    public function findAll()
    {
        return $this->estudanteRepository->findAll();
    }

    public function store(array $data)
    {
        $pessoaData = [
            'nome' => $data['nome'],
            'genero' => $data['genero'],
        ];

        $estudanteData = [
            'pessoa_id' => null,
            'turma' => $data['turma'],
        ];

        return DB::transaction(function () use ($pessoaData, $estudanteData) {
            $pessoa = $this->pessoaRepository->store($pessoaData);
            $estudanteData['pessoa_id'] = $pessoa->id;
            $estudante = $this->estudanteRepository->store($estudanteData);

            return $estudante;
        });
    }

    public function show(string $id)
    {
        return $this->estudanteRepository->findOrFail($id);
    }

    public function update(array $data, string $id)
    {
        $pessoaData = [
            'nome' => $data['nome'],
            'genero' => $data['genero'],
        ];

        $estudanteData = [
            'pessoa_id' => null,
            'turma' => $data['turma'],
        ];

        return DB::transaction(function () use ($pessoaData, $estudanteData, $id) {
            $estudante = $this->estudanteRepository->findOrFail($id);

            $this->pessoaRepository->update($pessoaData, $estudante->pessoa_id);
            $this->estudanteRepository->update($estudanteData, $id);

            return true;
        });
    }

    public function delete(string $id)
    {
        return DB::transaction(function () use ($id) {
            $estudante = $this->estudanteRepository->findOrFail($id);

            $this->estudanteRepository->delete($id);
            $this->pessoaRepository->delete($estudante->pessoa_id);

            return true;
        });
    }
}
