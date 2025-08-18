<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisionMissionStrength extends Model
{
    protected $fillable =  ['visionTitle', 'missionTitle', 'strengthTitle', 'visionDescription', 'missionDescription', 'strengthDescription'] ;
}
