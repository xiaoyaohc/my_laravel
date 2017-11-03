<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2017/11/2
 * Time: 9:48
 */
namespace App\Http\Controllers;
use App\Student;
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
    //使用模型查询数据
    public function orm1(){
        //查询表的所有记录（all()）
        /*$students=Student::all();
        dd($students);*/
        //获取结果集的第一条数据[主键查找](find())
        //$student=Student::find(4);
        //根据主键查找，查找不到就报错（findOrFail()）
        /*$student=Student::findOrFail(5);
        dd($student);*/

        //查询所有的数据(get())
        //$students=Student::get();
        //获取结果集的第一条数据(first())
        /*$student=Student::where('id','>',2)->orderBy('age','desc')->first();
        dd($student);*/
        //每次查询指定条数,防止服务压力过大(chunk)
        /*echo "<pre>";
        Student::chunk(2,function ($students){
            var_dump($students);
        });*/
        //聚合函数
        //$num=Student::count();//统计表的记录数
        $max=Student::where('id','>',2)->max('age');//返回表中字段数据的最大值
        var_dump($max);
    }
    //使用模型添加数据
    public function orm2(){
        //使用模型新增数据
        /*$student=new Student();
        $student->name='sean';
        $student->age=30;
        $bool=$student->save();
        dd($bool);*/
        /*$student=Student::find(12);
        echo date("Y-m-d H:i:s",$student->created_at);*/
        //使用模型的create方法新增数据
        /*$student=Student::create(['name'=>'王五','age'=>18]);
        dd($student);*/
        //以属性值查找字段，没有就新增（firstOrCreate()）
        /*$student=Student::firstOrCreate(['name'=>'胡超1']);
        var_dump($student);*/
        //以属性查找用户，若没有则建立新的实例，需要保存提交就save()（成功：返回布尔值）
        $student=Student::firstOrNew(['name'=>'胡超2']);
        $bool=$student->save();
        var_dump($bool);
    }
    //使用模型修改数据
    public function orm3(){
        //通过模型更新数据(成功：返回布尔值)
        /*$student=Student::find(15);
        $student->name='huchao';
        $bool=$student->save();//更新时间字段
        var_dump($bool);*/
        //结合查询语句批量更新（成功：返回更新的行数）
        $num=Student::where('id','>',11)->update(['age'=>19]);
        var_dump($num);
    }
    //使用模型删除数据
    public function orm4(){
        //通过模型删除数据
       /* $student=Student::find(13);
        $bool=$student->delete();
        var_dump($bool);*/
        //通过主键删除(成功：返回删除的条数)
        //$num=Student::destroy(15);
        //$num=Student::destroy(12,14);
        /*$num=Student::destroy([10,11]);
        var_dump($num);*/
        //删除指定条件的数据(成功：返回删除的条数)
        $num=Student::where('id','>',6)->delete();
        var_dump($num);
    }
}