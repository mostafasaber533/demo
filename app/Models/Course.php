<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    protected $fillable = ['name', 'description', 'logo'];

    public function tracks(): BelongsToMany
    {
        return $this->belongsToMany(Track::class);
    }
}
