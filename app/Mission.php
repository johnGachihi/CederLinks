<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    protected $casts = [
        'date' => 'date:Y-m-d H:m:s'
    ];
    protected $appends = ['description_preview'];

    public function getDescriptionPreviewAttribute()
    {
        return get_preview($this->description);
    }
}
