<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class books extends Model
{
    protected $fillable = ['title', 'description', 'quantity', 'category_id', 'user_id', 'file', 'cover'];

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function category():BelongsTo{
        return $this->belongsTo(categories::class);
    }

}
