<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Channel extends Model
{
    use HasFactory;
    protected $guarded = false;

    protected $fillable = ['id', 'user_from', 'user_to'];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }
}
