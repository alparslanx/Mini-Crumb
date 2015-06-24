<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{

    protected $table = 'entries';

    protected $fillable = ['content', 'status'];

    public function getUser()
    {
        return $this->belongsTo('App\Models\User');
    }

}
