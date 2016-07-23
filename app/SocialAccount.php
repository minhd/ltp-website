<?php

namespace LTP;

use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    protected $fillable = ['type', 'identifier'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
