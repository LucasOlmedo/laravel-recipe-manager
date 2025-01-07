<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'preparation_time',
        'steps',
        'ingredients',
        'tags',
        'image_url',
        'integration',
        'integration_ref_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
