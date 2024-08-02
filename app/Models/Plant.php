<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plant extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'plants';
    protected $guarded = false;

    protected $with = ['category'];

    public function category()
    {
        return $this->belongsTo(PlantCategories::class, 'plant_category_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(PlantTag::class, 'plant_tags', 'plant_id', 'plant_tag_id');
    }
}
