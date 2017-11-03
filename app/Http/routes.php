<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
//基础路由
Route::get('basic1',function (){
    return 'basic1';
});
Route::get('basic2',function (){
    return 'basic2';
});
//多请求路由
//get、post请求
Route::match(['get','post'],'multy1',function (){
    return 'multy1';
});
//所有请求
Route::any('multy2',function (){
    return 'multy2';
});

//路由参数
/*Route::get('user/{id}',function ($id){
    return 'user-id-'.$id;
});
Route::get('user/{name?}',function ($name=null){
    return 'user-name-'.$name;
});
Route::get('user/{name?}',function ($name='sean'){
    return 'user-name-'.$name;
});
Route::get('user/{name?}',function ($name='sean'){
    return 'user-name-'.$name;
})->where('name','[A-Za-z]+');
Route::get('user/{id}/{name?}',function ($id,$name='sean'){
    return 'user-id-'.$id.'-name-'.$name;
})->where(['id'=>'[0-9]+','name'=>'[A-Za-z]+']);*/

//路由别名
Route::get('user/member-center',['as'=>'center',function(){
    return route('center');
}]);

//路由群组
Route::group(['prefix'=>'member'],function (){
    Route::get('user/member-center',['as'=>'center',function(){
        return route('center');
    }]);
    Route::any('multy2',function (){
        return 'member-multy2';
    });
});

//路由中输出视图
Route::get('view', function () {
    return view('welcome');
});

//控制器路由
//Route::get('member/info','MemberController@info');
//Route::get('member/info',['uses'=>'MemberController@info']);
//Route::post('member/info',['uses'=>'MemberController@info']);
//Route::any('member/info',['uses'=>'MemberController@info']);

//控制器路由别名
/*Route::any('member/info',[
    'uses'=>'MemberController@info',
    'as'=>'memberinfo'
]);*/

//控制器参数绑定
Route::any('member/{id}',['uses'=>'MemberController@info'])->where('id','[0-9]+');

//控制器路由
Route::any('test1',['uses'=>'StudentController@test1']);
Route::any('query1',['uses'=>'StudentController@query1']);
Route::any('query2',['uses'=>'StudentController@query2']);
Route::any('query3',['uses'=>'StudentController@query3']);
Route::any('query4',['uses'=>'StudentController@query4']);
Route::any('query5',['uses'=>'StudentController@query5']);
