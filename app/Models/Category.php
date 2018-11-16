<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ['name', 'type', ];

    /**
     * Get the user that owns a category
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
