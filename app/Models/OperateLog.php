<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperateLog extends Model
{
    use HasFactory;

    protected  $fillable = [ 'user_id' ,'username','uri','parameter','method'];
}
