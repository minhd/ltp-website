<?php

namespace LTP;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function participate(Project $project)
    {
        $this->projects()->attach($project);
    }

    public function accounts()
    {
        return $this->hasMany(SocialAccount::class);
    }

    public function creatorOf()
    {
        return $this->hasMany(Project::class, 'creator');
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'user_project', 'user_id');
    }

}
