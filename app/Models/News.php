<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class News extends Model
{
    use HasFactory;

    use SoftDeletes;

    public $flag = true;

    protected $fillable = [
        'wid',
        'title',
        'source',
        'author',
        'intro',
        'publish_time',
        'is_pub',
        'image',
        'image_id'
    ];

    public function getIsPubArrAttribute($value)
    {
        $pub_arr = [
            0 => '未发布',
            1 => '已发布',
        ];
        return $pub_arr[$this->is_pub];
    }

    public static function get_data($where, $limit)
    {

        $query = self::_where($where);
        return $query->paginate($limit)->toArray();

    }

    private static function _where($where = [])
    {

        $query = News::query();

        if ($where) {

            foreach ($where as $index => $item) {

                if ($item === null || $item === '') {
                    continue;
                }

                $query = $query->where($index, $item);

            }

        }

        return $query;


    }


}
