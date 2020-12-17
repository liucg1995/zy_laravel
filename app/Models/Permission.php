<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends \Spatie\Permission\Models\Permission
{
    use HasFactory;
    use SoftDeletes;

    protected  $fillable = [ 'name','show_name','menu_id','guard_name','btn'];
}
