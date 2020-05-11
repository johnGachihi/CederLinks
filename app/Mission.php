<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    protected $casts = [
        'date' => 'date:Y-m-d H:m:s'
    ];
}
