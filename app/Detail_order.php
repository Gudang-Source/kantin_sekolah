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

    public function menu()
    {
        return $this->belongsTo('App\Menu', 'id_menu', 'id_menu');
    }

    public function order()
    {
        return $this->belongsTo('App\Order', 'id_order', 'id_order');
    }
}
