<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends \Spatie\Permission\Models\Permission
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'show_name', 'menu_id', 'guard_name', 'btn', 'parent_id'];

    //子权限
    public function childs()
    {
        return $this->hasMany('App\Models\Permission', 'parent_id', 'id');
    }


    //三级子权限
    public function thirdchilds()
    {
        return $this->childs()->with('childs');
    }

}
