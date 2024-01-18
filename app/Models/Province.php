<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    
    public function getDitrictByProvinceIdAttribute($province_id) 
    {
        // province_id la id tỉnh (10)
        $district = District::where('province_id', $province_id)->get();
    }
}
