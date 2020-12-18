<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'ident', 'icon', 'uri', 'parent_id'];

    public function permissions()
    {
        return $this->hasMany('App\Models\Permission', 'menu_id', 'id');
    }


    //子权限
    public function childs()
    {
        return $this->hasMany('App\Models\Menu', 'parent_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        // 在删除用户时执行
        static::deleting(function ($menu) {
            // 删除与用户关联的文章
            $menu->permissions()->delete();

        });
    }


    public static function save_permission_info($menu, $btns, $old_menu = false)
    {

        $per_btn = config('backend.menu_permission');

        $permission_list = Permission::query()->where(['menu_id' => $menu->id])->get();
//        $per_list = Arr::pluck($permission_list, 'name');


        $permission = [
            'name' => $menu->ident,
            'show_name' => $menu->title.':列表',
            'menu_id' => $menu->id,
            'btn' => 'list',
        ];
//        dd(array_search());

        if ((($id = array_search($old_menu->ident, Arr::pluck($permission_list, 'name', 'id'))) !== false)) {
            Permission::query()->where('id', $id)->update($permission);
        } else {
            Permission::query()->create($permission);
        }

        foreach ($btns as $index => $btn) {
            $permission = [
                'name' => $menu->ident . '.' . $btn,
                'show_name' => $menu->title . ':' . $per_btn[$btn],
                'menu_id' => $menu->id,
                'btn' => $btn,
            ];
            if ((($id = array_search($old_menu->ident . '.' . $btn, Arr::pluck($permission_list, 'name', 'id'))) !== false)) {
                Permission::query()->where('id', $id)->update($permission);
            } else {
                Permission::query()->create($permission);
            }
        }

        $diff = array_diff(array_keys($per_btn), $btns);

        if (!empty($diff)) {
            Permission::query()->whereIn('btn', $diff)->where(['menu_id' => $menu->id])->delete();
        }


    }

    public static function get_list($where = [])
    {
        $list = self::query()->where($where)->orderBy('parent_id', 'asc')->orderby('order', 'asc')->orderby('id', 'asc')->get()->toArray();

        $tree = self::tree($list);
        return array_column($tree,null);
    }

    public static function get_list_menu($where = [])
    {
        $list = self::where($where)->orderBy('parent_id', 'asc')->orderby('order', 'asc')->orderby('id', 'asc')->get()->toArray();

        $tree = self::tree($list, 0, 0, true);

        return $tree;
    }

    /**
     * @param array $list           数组
     * @param int $level            菜单第几级
     * @param int $parent_id        父级ID
     * @param bool $haschild        是否 以_child 字段保存
     * @param string $pk
     * @param string $parent_id_key
     * @return array
     *
     */

    public static function tree($list = [], $level = 0, $parent_id = 0, $haschild = false, $pk = 'id', $parent_id_key = 'parent_id')
    {

        $tree = [];
        foreach ($list as $key => $item) {
            // 判断是不是与传入的栏目ID 相同
            if ($item[$parent_id_key] == $parent_id) {
//                dump($item);
                // 相同 将当前数据赋值给当前ID 的 数据
                $item['level'] = $level;
                $tree[$item[$pk]] = $item;
                if ($level != 0 && !$haschild) {
//                    │   │   ├
                    $tree[$item[$pk]]['title'] = str_repeat('         ', ($level ) ) . '├' . $item['title'];
                }
                unset($list[$key]);

                // 递归返回 当前parent_id 是 当前ID 的 数组
                $child = self::tree($list, $level + 1, $item[$pk] , $haschild);

                // 判断是否以_child 数组返回， 还是以合并数组返回
                if ($haschild) {
                        $tree[$item[$pk]]['_child'] = $child ?? [];
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
