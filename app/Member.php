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
    public static function getMember(){
        return 'member name is sean';
    }

}