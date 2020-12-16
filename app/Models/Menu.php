<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    use HasFactory;
    use SoftDeletes;

    public static function get_list($where = [])
    {
        $list = self::where($where)->orderBy('parent_id', 'asc')->orderby('order', 'asc')->orderby('id', 'asc')->get()->toArray();

        $tree = self::tree($list);
        return $tree;
    }

    public static function tree($list = [], $root = 0, $haschild = false, $pk = 'id', $parent_id = 'parent_id')
    {
        $tree = [];
        foreach ($list as $key => $item) {
            // 判断是不是与传入的栏目ID 相同
            if ($item[$parent_id] == $root) {
                // 相同 将当前数据赋值给当前ID 的 数据
                $tree[$item[$pk]] = $item;
                unset($list[$key]);
                // 递归返回 当前parent_id 是 当前ID 的 数组
                $child = self::tree($list, $item[$pk]);

                // 判断是否以_child 数组返回， 还是以合并数组返回
                if ($haschild) {
                    $tree[$item[$pk]]['_child'] = $child;
                } else {
                    if (count($child)) {
                        $tree = $tree + $child;
                    }
                }
            }
        }
        return $tree;
    }


}
