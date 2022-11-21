<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $table='articles';
    protected $fillable=['id','tittle','image','deleted','description','cicle_id'];
}
