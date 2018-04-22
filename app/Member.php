<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2017/11/1
 * Time: 16:39
 */
namespace App;
use Illuminate\Database\Eloquent\Model;

class Member extends Model{
    protected $table='member';//绑定表
    protected $primaryKey='id';//默认主键名是id
    public  $timestamps=false;
    public static function getMember(){
        return 'member name is sean';
    }

}