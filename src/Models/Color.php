<?php

namespace Anditsung\Master\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Color extends Model
{
    protected $table = 'master_colors';

    protected $fillable = [
        'name',
        'code',
        'user_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function($color) {
            if(! $color->user_id) {
                $color->user_id = auth()->user()->id;
            }
        });
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
