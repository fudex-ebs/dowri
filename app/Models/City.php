<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
  protected $fillable = [
      'name_ar',
      'name_en',
  ];

  public function inspection_centers()
  {
      return $this->hasMany('App\Models\InspectionCenter');
  }


    public static function boot() {
        parent::boot();

        static::deleting(function($city) {
             $city->inspection_centers()->delete();

        });
    }
}
