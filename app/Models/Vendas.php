<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_usuario', 'produto',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id', 'id_usuario');
    }
}
