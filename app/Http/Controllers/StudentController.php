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
    //使用查询构造器添加数据
    public function query1(){
        //添加（成功： 返回布尔值）
        /*$bool=DB::table('student')->insert([
            'name'=>'张飞','age'=>18
        ]);
        var_dump($bool);*/
        //添加（成功：返回插入的数据id）
        /*$id=DB::table('student')->insertGetId([
            'name'=>'小明','age'=>19
        ]);
        var_dump($id);*/
        //添加(多条数据[成功：返回布尔值])
        $bool=DB::table('student')->insert([
            ['name'=>'name1','age'=>20],
            ['name'=>'name2','age'=>21],
            ['name'=>'name3','age'=>22],
            ['name'=>'name4','age'=>23],
        ]);
        var_dump($bool);
    }
    //使用查询构造器修改数据
    public function query2(){
        //修改（成功：返回影响的行数）
        /*$num=DB::table('student')->where('id',6)->update(
            ['age'=>30]
        );
        var_dump($num);*/
        //修改自增和自减（成功：返回影响的行数）
        //$num=DB::table('student')->increment('age');
        //$num=DB::table('student')->increment('age',3);
        //$num=DB::table('student')->decrement('age');
        //$num=DB::table('student')->decrement('age',3);
        //$num=DB::table('student')->where('id',6)->decrement('age',3);
        $num=DB::table('student')->where('id',6)->decrement('age',3,['name'=>'huchao']);//自减的同时修改字段
        var_dump($num);
    }
    //使用查询构造器删除数据
    public function query3(){
        //删除（成功：返回删除的行数）
        //$num=DB::table('student')->where('id',6)->delete();
        /*$num=DB::table('student')->where('id','>=',4)->delete();
        var_dump($num);*/
        //清空数据表(成功：不返回任何数据)
        DB::table('student')->truncate();
    }
    //使用查询构造器查询数据
    public function query4(){
        //获取表的所有数据(get())
        //$students=DB::table('student')->get();
        //获取结果集的第一条数据(first)
        /*$student=DB::table('student')->orderBy('id','desc')->first();
        var_dump($student);*/
        //where
        /*$students=DB::table('student')->where('id','>=',3)->get();
        var_dump($students);*/
        //where多个条件
        /*$students=DB::table('student')->whereRaw('id>=? and age>?',[3,22])->get();
        var_dump($students);*/
        //返回结果集中指定的字段(pluck)
        /*$names=DB::table('student')->pluck('name');
        var_dump($names);*/
        //返回结果集中的指定字段，可指定字段作为下标（lists）
        /*$names=DB::table('student')->lists('name','id');
        var_dump($names);*/
        //指定查找相关字段(select)
        /*$students=DB::table('student')->select('id','name','age')->get();
        var_dump($students);*/
        //每次查询指定条数,防止服务压力过大(chunk)
        /*echo "<pre>";
        DB::table('student')->chunk(2,function ($students){
            var_dump($students);
            if(你的条件){
                return false;
            }
        });*/
    }
    //聚合函数
    public function query5(){
        //统计表的记录数
        /*$num=DB::table('student')->count();
        var_dump($num);*/
        //返回表中字段数据的最大值
        //$max=DB::table('student')->max('age');
        //返回表中字段数据的最小值
        /*$min=DB::table('student')->min('age');
        var_dump($min);*/
        //返回表中字段数据的平均值
        $avg=DB::table('student')->avg('age');
        var_dump($avg);
        //返回表中字段数据的总和
        $sum=DB::table('student')->sum('age');
        var_dump($sum);
    }
}