<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public $fillable = ['title', 'customers', 'employees', 'menu_id'];

    public function menu(){
        return $this->belongsTo('App\Menu');
    }

}
