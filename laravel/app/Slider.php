<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Slider extends Model
{
    public $timestamps = false;
    /**
     * Get the user that owns the Slider
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function story(): BelongsTo
    {
        return $this->belongsTo(Story::class,'story_id');
    }
}
