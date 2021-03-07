<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class TeamMember extends Model
{
    use HasFactory, Uuid;

    protected $hidden = [
        'user_id',

    ];
    public function team()
    {
        return $this->belongsTo('App\Models\Team', 'team_id')->select(['id', 'team_name', 'dep_id']);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
