<?php
// app/Models/UserAddress.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $table = 'user_addresses';

    protected $fillable = [
        'user_id',
        'label',
        'recipient_name',
        'phone_number',
        'full_address',
        'postal_code',
        'province_id',
        'city_id',
        'district_id',
        'is_primary'
    ];


    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with Alamat
    public function alamat()
    {
        return $this->belongsTo(Alamat::class, 'postal_id', 'postal_id');
    }

    public function provinsi()
    {
        return $this->belongsTo(Alamat::class, 'province_id', 'prov_id');
    }

    public function kota()
    {
        return $this->belongsTo(Alamat::class, 'city_id', 'city_id');
    }

    public function kecamatan()
    {
        return $this->belongsTo(Alamat::class, 'district_id', 'dis_id');
    }

}

