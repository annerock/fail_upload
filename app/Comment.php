<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text',
    ];


    public function shoppinglist() : BelongsTo {
        return $this->belongsTo(Shoppinglist::class);
    }

    public function written_by() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
