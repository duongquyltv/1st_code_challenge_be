<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Department extends Model
{
    use HasFactory, Uuid;

    public function teams()
    {
        return $this->hasMany('\App\Models\Team', 'dep_id');
    }
}
