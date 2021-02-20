<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormItem extends Model
{
    //use HasFactory;
    use SoftDeletes;

    protected $table = 'form_items';
}
