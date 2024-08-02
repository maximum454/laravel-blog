<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlantTag extends Model
{
    use SoftDeletes;

    protected $table = 'plant_tags';
    protected $guarded = false;
}
