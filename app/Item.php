<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description', 'amount', 'maxPrice'
    ];


    public function shoppinglist() : belongsTo {
        return $this->belongsTo(Shoppinglist::class);
    }
}
