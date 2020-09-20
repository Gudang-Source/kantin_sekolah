<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $primaryKey = 'id_menu';

    protected $fillable = [
        'nama_menu',
        'harga',
        'kategori_menu',
        'stok',
        'gambar',
    ];

    public function detail_order()
    {
        return $this->hasMany('App\Detail_order', 'id_menu', 'id_menu');
    }
}
