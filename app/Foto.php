<?php

namespace atividade_vitor_final;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $fillable = [
        'nome','autor','album_id','imagem'
    ];
}
