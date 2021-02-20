<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormSection extends Model
{
    //use HasFactory;
    use SoftDeletes;
    protected $table = 'forms_sections';

    public function formId()
    {
        return $this->belongsTo('App\Models\Forms','form_id');
    }
}
