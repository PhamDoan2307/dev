<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='cates';
    protected $fillable=['name','alias','order','parent_id','keywords','description'];
    public $timestamps=false;
    public function cate(){
       return $this->belongsTo('App\Cate');
    }
    public function user(){
       return $this->belongsTo('App\User');
    }
    public function pimages(){
        return $this->hasMany('App\ProductImages');
    }
}
