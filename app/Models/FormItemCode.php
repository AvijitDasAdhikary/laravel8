<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormItemCode extends Model
{
    //use HasFactory;
    protected $table = 'form_item_codes';
    public $timestamps = false;

    public function formItemId()
    {
        return $this->belongsTo('App\Models\FormItem','item_id');
    }

    public function formCodeId()
    {
        return $this->belongsTo('App\Models\FormCodes','code_id');
    }
}
