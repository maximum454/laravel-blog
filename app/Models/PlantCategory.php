<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlantCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'plant_categories';
    protected $guarded = false;
}
