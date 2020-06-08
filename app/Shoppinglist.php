<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Shoppinglist extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'until', 'cost', 'user_creator_id', 'user_helper_id',
    ];


    public function user_helper() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function user_creator() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function items() : HasMany {
        return $this->hasMany(Item::class);
    }

    public function comments() : HasMany {
        return $this->hasMany(Comment::class);
    }

}
