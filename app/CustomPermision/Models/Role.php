<?php

namespace App\CustomPermision\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

   protected $fillable = [
        'name', 'slug', 'description', 'full-access',
    ];


public function users(){
	return $this->BelongsToMany('App\User')->withTimesTamps();
}

}
