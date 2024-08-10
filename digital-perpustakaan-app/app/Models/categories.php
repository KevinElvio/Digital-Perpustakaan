<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class categories extends Model
{
    protected $fillable = 'name';

    public function books():HasMany{
        return $this->hasMany(books::class);
    }

}
