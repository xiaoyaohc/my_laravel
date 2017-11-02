<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2017/11/2
 * Time: 9:48
 */
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller{
    public function test1(){
        //添加(成功：返回布尔值)
        /*$bool=DB::insert('insert into student(name,age) values(?,?)',['李四',28]);
        var_dump($bool);*/
        //修改(成功：返回修改的行数)
        /*$num=DB::update('update student set age=? where name=?',[20,'张三']);
        var_dump($num);*/
        //查询
        /*$students=DB::select('select * from student where id>?',[1]);
        dd($students);*/
        //删除(成功：返回删除的行数)
        $num=DB::delete('delete from student where id>?',[2]);
        var_dump($num);
    }
}