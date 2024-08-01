<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;
    protected $table = 'messages';
    protected $guarded = false;

    protected $fillable = ['id', 'user_from', 'user_to', 'body'];

    /**
     * @return BelongsTo
     */
    public function userFrom(): BelongsTo {
        return $this->belongsTo(User::class, 'user_from', 'id');
    }
    public function userTo(): BelongsTo {
        return $this->belongsTo(User::class, 'user_to', 'id');
    }

    /**
     * @return string
     */
    public function getTimeAttribute(): string {
        return date(
            "d M Y, H:i:s",
            strtotime($this->attributes['created_at'])
        );
    }
}
