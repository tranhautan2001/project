<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDetail;
class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_customer',
        'customer_status',
        'province_id',
        'district_id',
        'wards_id',
    ];

    public function getProvinceNameByIdAttribute($province_id) 
    {
        $province_name = Province::where('id', $province_id)->first()->name;
        return $province_name;
    }
    public function OrderDetail()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
}
