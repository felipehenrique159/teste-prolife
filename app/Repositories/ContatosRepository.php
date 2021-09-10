<?php

namespace App\Repositories;

use App\Models\Contatos;
use App\Repositories\BaseRepository;

/**
 * Class ContatosRepository
 * @package App\Repositories
 * @version September 8, 2021, 10:51 pm UTC
*/

class ContatosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'email',
        'telefone',
        'mensagem',
        'url_anexo'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Contatos::class;
    }
}
