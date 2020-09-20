<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'id_order';

    protected $fillable = [
        'no_meja',
        'id_user',
        'tanggal',
        'status_order',
        'jumlah_harga',
    ];
}
