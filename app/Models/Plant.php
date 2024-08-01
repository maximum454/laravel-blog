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

    protected $withCount = ['likedUsers'];
    protected $with = ['category'];
}
