<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Menu extends Model
{
    public function scopeGetMenu($query)
	{
	    $menu = DB::table('menus')
	    ->leftJoin('permissions', 'menus.permission_id', 'permissions.id')
	    ->leftJoin('modules', 'modules.id', 'menus.module_id')
	    ->select('menus.*', 'permissions.name as permission')
	    ->where('menus.active', 1)->where('modules.active', 1)->get();
	    return $menu;
	}
}
