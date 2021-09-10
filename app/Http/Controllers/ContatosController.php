<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContatosRequest;
use App\Http\Requests\UpdateContatosRequest;
use App\Repositories\ContatosRepository;
use App\Http\Controllers\AppBaseController;
use App\Mail\EnvioMailContato;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Response;

class ContatosController extends AppBaseController
{
    /** @var  ContatosRepository */
    private $contatosRepository;

    public function __construct(ContatosRepository $contatosRepo)
    {
        $this->contatosRepository = $contatosRepo;
    }

    /**
     * Display a listing of the Contatos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $contatos = $this->contatosRepository->all();

        return view('contatos.index')
            ->with('contatos', $contatos);
    }

    /**
     * Show the form for creating a new Contatos.
     *
     * @return Response
     */
    public function create()
    {
        return view('contatos.create');
    }

    /**
     * Store a newly created Contatos in storage.
     *
     * @param CreateContatosRequest $request
     *
     * @return Response
     */
    public function store(CreateContatosRequest $request)
    {   
       try {
            $input = $request->all();
            $date = new DateTime();
            $data = $date->getTimestamp();  //para evitar arquivos com nome repetido
            $path = 'contatos/'.$data.'_'.$input['file']->getClientOriginalName();
            $conteudo = file_get_contents($input['file']->getRealPath());
            Storage::disk('local')->put($path,$conteudo);
            
            $input['url_anexo'] = $path;
            $input['ip_remetente'] = $request->ip(); //salva o ip do usuario que ta gravando o formulario
            $contato = $this->contatosRepository->create($input);
            
            Mail::to(env('MAIL_DESTINO'))->send(new EnvioMailContato($contato));
            
            Flash::success('Contato salvo com sucesso.');

            return redirect(route('contatos.index'));
       } catch (\Exception $e) {
           return $e->getMessage();
       }
    }

    /**
     * Display the specified Contatos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contatos = $this->contatosRepository->find($id);
        
        if (empty($contatos)) {
            Flash::error('Contato não encontrado');

            return redirect(route('contatos.index'));
        }

        return view('contatos.show')->with('contatos', $contatos);
    }

    /**
     * Show the form for editing the specified Contatos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contatos = $this->contatosRepository->find($id);
        if (empty($contatos)) {
            Flash::error('Contato não encontrado');


            return redirect(route('contatos.index'));
        }

        return view('contatos.edit')->with('contatos', $contatos);
    }

    /**
     * Update the specified Contatos in storage.
     *
     * @param int $id
     * @param UpdateContatosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContatosRequest $request)
    {   
        try {
            $input = $request->all();
            $contato = $this->contatosRepository->find($id);
            if (empty($contato)) {
                Flash::error('Contato não encontrado');

                return redirect(route('contatos.index'));
            }

            Storage::disk('local')->delete($contato->url_anexo); //excluir arquivo anterior do storage
            $date = new DateTime();
            $data = $date->getTimestamp();
            $path = 'contatos/'.$data.'_'.$input['file']->getClientOriginalName();
            $conteudo = file_get_contents($input['file']->getRealPath());
            
            Storage::disk('local')->put($path,$conteudo);
            
            $input['url_anexo'] = $path; //atualiza o path do novo arquivo
            $input['ip_remetente'] = $request->ip(); //salva o ip do usuario que ta gravando o formulario
            $contato = $this->contatosRepository->update($input, $id);
            Mail::to(env('MAIL_DESTINO'))->send(new EnvioMailContato($contato));
            Flash::success('Contato atualizado com sucesso.');

            return redirect(route('contatos.index'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified Contatos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contatos = $this->contatosRepository->find($id);

        if (empty($contatos)) {
            Flash::error('Contato não encontrado');

            return redirect(route('contatos.index'));
        }
        $this->contatosRepository->delete($id);
        Storage::disk('local')->delete($contatos->url_anexo); //excluir arquivo do storage ao excluir contato


        Flash::success('Contato deletado com sucesso.');

        return redirect(route('contatos.index'));
    }
}
