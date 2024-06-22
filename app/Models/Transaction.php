<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'tb_transaksi';

    public function BankUser()
    {
        return $this->belongsTo(Bank::class, 'dari_bank', 'id');
    }

    public function Bonus()
    {
        return $this->belongsTo(Bonus::class, 'bonus', 'id');
    }
}
