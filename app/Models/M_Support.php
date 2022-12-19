<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Support extends Model
{
    protected $table = "tbl_support";

    protected $fillable = [
        'kd_pengujian',
        'kd_produk',
        'support'
    ];

    public function dataProduk($kdProduk)
    {
        return Product::where('id', $kdProduk)->first();
    }

    public function totalTransaksi($kdProduk)
    {
        return OrderItem::where('product_id', $kdProduk)->count();
    }
}
