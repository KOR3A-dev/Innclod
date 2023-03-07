<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PRO_PROCESO extends Model
{
    use HasFactory;

    protected $table = 'pro_procesos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'PRO_PREFIJO',
        'PRO_NOMBRE',
    ];
}
