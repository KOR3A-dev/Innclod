<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TIP_TIPO_DOC extends Model
{
    use HasFactory;

    protected $table = 'tip_tipo_docs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'TIP_PREFIJO',
        'TIP_NOMBRE',
    ];
}
