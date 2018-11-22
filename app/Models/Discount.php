<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
  protected $fillable = [
      'reservation_id',
      'discount_code_id',
  ];

  public function discount_code()
  {
      return $this->belongsTo('App\Models\DiscountCode');
  }


}
