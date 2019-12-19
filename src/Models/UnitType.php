<?php

namespace Anditsung\Master\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UnitType extends Model
{
    protected $table = "master_unit_types";

    protected $fillable = [
        'name',
        'user_id',
        'active',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function($unit_type) {
            if(! $unit_type->user_id) {
                $unit_type->user_id = auth()->id();
            }
        });
    }

    public function delete()
    {
        $this->setKeysForSaveQuery($this->newModelQuery())->update(['active' => false]);

        return true;
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
