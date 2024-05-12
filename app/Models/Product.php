<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }
    /*Ini Adalah Accessor,
    Jadi Kita Membuat Kolom Baru Bernama Status_Label Kolom Tersebut Dihasilkan Oleh Accessor,
    Meskipun Field Tersebut Tidak Ada Ditable Products
    Akan Tetapi Akan Disertakan Pada Hasil Query*/
    public function getStatusLabelAttribute()
    {
        //Adapun Valuenya Akan Mencetak Html Berdasarkan Value Dari Field Status
        if ($this->status == 0) {
            return '<span class="badge badge-secondary">Draft</span>';
        }
        return '<span class="badge badge-success">Aktif</span>';
    }

    //Fungsi Yang Meng-Handle Relasi Ke Table Category
    public function product()
    {
        //JENIS RELASINYA ADALAH ONE TO MANY, YANG BERARTI KATEGORI INI BISA DIGUNAKAN OLEH BANYAK PRODUK
        return $this->hasMany(Product::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
