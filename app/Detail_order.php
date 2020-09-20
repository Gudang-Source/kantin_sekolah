<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_order extends Model
{
    protected $primaryKey = 'id_detail_order';

    protected $fillable = [
        'id_order',
        'id_menu',
        'jumlah',
        'sub_total',
        'status_detail_order',
    ];
}
