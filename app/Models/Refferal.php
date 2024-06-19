<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refferal extends Model
{
    use HasFactory;
    protected $table = 'tb_refferal';

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
