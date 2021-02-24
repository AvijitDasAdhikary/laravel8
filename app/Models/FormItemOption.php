<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormItemOption extends Model
{
    //use HasFactory;
    protected $table = 'form_item_options';

    public $timestamps = false;

    public function ItemId()
    {
        return $this->belongsTo('App\Models\FormItem','item_id');
    }

    public function OptionId()
    {
       return $this->belongsTo('App\Models\masterFormOptions','option_id');
    }
}
