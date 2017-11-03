<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2017/11/3
 * Time: 11:29
 */
namespace App;
use Illuminate\Database\Eloquent\Model;

class Student extends Model{
    //自定表名
    protected $table='student';//模型关联数据表
    //修改字段作为主键，默认指定id作为主键
    protected $primaryKey='id';
    //指定允许批量赋值的字段
    protected $fillable=['name','age'];
    //指定不允许批量赋值的字段
    protected $guarded=[];
    //自动维护时间戳
    public $timestamps=true;
    //自动时间戳设置为当前时间
    protected function getDateFormat()
    {
        return time();
    }
    //将返回的时间按照时间时间戳返回（原先：时间格式化返回）
    protected function asDateTime($val){
        return $val;
    }
}