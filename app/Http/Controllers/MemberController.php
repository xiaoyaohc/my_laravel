<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2017/10/31
 * Time: 11:06
 */
namespace App\Http\Controllers;

use App\Member;

class MemberController extends Controller{
    public function info($id){
        return Member::getMember();
        //return 'member-info-'.$id;
        //return route('memberinfo');
        //return view('member-info');
       /* return view('member/info',[
            'name'=>'huchao',
            'age'=>26
        ]);*/
    }
}