<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function organizations()
    {
        return $this->hasMany(Organization::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
    public function funnels()
    {
        return $this->hasMany(Funnel::class);
    }

    public function leadforms()
    {
        return $this->hasMany(Leadform::class);
    }
    public function estimates()
    {
        return $this->hasMany(Estimate::class);
    }
}
