<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarType extends Model
{
  protected $fillable = [
      'name_ar',
      'name_en',
      'price',
      'dowri_fee'
  ];
}
