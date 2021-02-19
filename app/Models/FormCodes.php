<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class FormCodes extends Model
{
    //use HasFactory;
    use SoftDeletes;

    protected $table = 'form_codes';

    public function departmentId()
    {
        return $this->belongsTo('App\Models\Department', 'department_id');
    }
}

