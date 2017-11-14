<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Module extends Model
{
   public function scopeAllFormated($query)
	{
	    $m = DB::table('modules')->orderBy('weight')->get();
	    $returnArray = [];
	    foreach ($m as $temp) {
		  $returnArray[$temp->key] = $temp;
		}
	    return $returnArray;
	}
}
