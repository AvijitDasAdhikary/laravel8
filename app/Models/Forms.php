<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Forms extends Model
{
    //use HasFactory;
    use SoftDeletes;

    protected $table = 'forms';

    public function departmentId()
    {
        return $this->belongsTo('App\Models\Department', 'department_id');
    }
}
