<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'desc', 
        'user_id'
    ];

    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
}
