<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomersModel extends Model
{
    use HasFactory;
    protected $table = "customers";
    protected $fillable = ['cus_identification', 'rou_name', 'cus_lastname', 'cus_phone', 'cus_latitude', 'cus_altitude', 'routes_rou_id'];
}
