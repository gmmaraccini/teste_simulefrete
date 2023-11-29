<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;
    public $table = 'fornecedores';

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'id','nome', 'telefone','cep', 'email','logradouro','numero','complemento'
    ];


}
