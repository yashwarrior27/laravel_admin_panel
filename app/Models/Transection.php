<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transection extends Model
{
    use HasFactory;
    protected $table='transections';
    protected $fillable=['r_payment_id','user_id','addmission_id','method','currency','user_email','amount','json_response'];
}
