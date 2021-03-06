<?php

namespace App\Http\Controllers;

use App\Data\Models\Acao as ModelAcao;
use App\Data\Models\Juiz as ModelJuiz;
use App\Data\Models\Meio as ModelMeio;
use App\Data\Models\Processo;
use App\Data\Models\Tribunal as ModelTribunal;
use App\Data\Models\User as ModelUser;
use App\Data\Repositories\Processos as ProcessosRepository;
use App\Http\Requests\Processo as ProcessoRequest;

class Processos extends Controller
{
    public function create()
    {
        return view(
                'processos.create',
                $this->getProcessosData()
        );
    }

    public function store(ProcessoRequest $request, ProcessosRepository $repository)
    {
        $repository->createFromRequest($request);

        return $this->create();
    }

    public function detail(ProcessoRequest $request)
    {
        $processo = Processo::find($request->id);

        return view('processos.detail')->with(array_merge(['processo'=>$processo], $this->getProcessosData()));
    }

    /**
     * @return array
     */
    public function getProcessosData(): array
    {
        return [
                'juizes'    => ModelJuiz::orderBy('nome')->pluck('nome', 'id'),
                'tribunais' => ModelTribunal::orderBy('nome')->pluck('nome', 'id'),
                'usuarios'  => ModelUser::orderBy('name')->pluck('name', 'id'),
                'meios'     => ModelMeio::orderBy('nome')->pluck('nome', 'id'),
                'acoes'     => ModelAcao::orderBy('nome')->pluck('nome', 'id'),
        ];
    }
}
