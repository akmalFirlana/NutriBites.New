<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory;

    protected $table = 'alamat';

    protected $fillable = [
        'postal_id', 'subdis_id', 'dis_id', 'city_id', 'prov_id', 
        'postal_code', 'subdis_name', 'dis_name', 'city_name', 'prov_name'
    ];
}
