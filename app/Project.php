<?php

namespace LTP;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function creator()
    {
        return $this->hasOne(User::class);
    }

    public function contributors()
    {
        return $this->hasMany(User::class);
    }

    public function updates()
    {
        return $this->hasMany(ProjectUpdate::class);
    }
}
