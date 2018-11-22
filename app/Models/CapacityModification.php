<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CapacityModification extends BaseModel
{
    protected $fillable = ['date','inspection_center_id',
    'p_7_00','p_7_15','p_7_30','p_7_45',
    'p_8_00','p_8_15','p_8_30','p_8_45',
    'p_9_00','p_9_15','p_9_30','p_9_45',
    'p_10_00','p_10_15','p_10_30','p_10_45',
    'p_11_00','p_11_15','p_11_30','p_11_45',
    'p_12_00','p_12_15','p_12_30','p_12_45',
    'p_13_00','p_13_15','p_13_30','p_13_45',
    'p_14_00','p_14_15','p_14_30','p_14_45',
    'p_15_00','p_15_15','p_15_30','p_15_45',
    'p_16_00','p_16_15','p_16_30','p_16_45',
    ];


}
