<?php

namespace LTP;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'description'];

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator');
    }

    public static function from(User $user)
    {
        $project = new static;
        $project->creator = $user->id;
        return $project;
    }

    public function creates($attributes)
    {
        $this->fill($attributes)->save();
        return $this;
    }

    public function contributors()
    {
        return $this->belongsToMany(User::class, 'user_project', 'project_id');
    }

    public function updates()
    {
        return $this->hasMany(ProjectUpdate::class);
    }
}
