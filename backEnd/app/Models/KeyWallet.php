<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyWallet extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'key_wallet';

    protected $fillable = [
        "id",
        'apelido',
        'email',
        'key',
        'id_user'
    ];

}
