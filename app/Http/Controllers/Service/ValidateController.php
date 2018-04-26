<?php

namespace App\Http\Controllers\Service;

use App\Models\M3Result;
use App\Tool\Validate\ValidateCode;
use App\Http\Controllers\Controller;

use App\Tool\SMS\SendTemplateSMS;
use App\Entity\TempPhone;
use Illuminate\Http\Request;

class ValidateController extends Controller
{
    /**
     * 获取验证码
     * @param string $value
     */
    public function create($value=''){
       $validateCode=new ValidateCode();
       return $validateCode->doimg();
    }

    /**
     * 发送短信
     * @param Request $request
     * @return string
     */
    public function sendSMS(Request $request){
        $m3_result=new M3Result();
        $phone=$request->input('phone','');
        if($phone==''){
            $m3_result->status=1;
            $m3_result->message='手机号不能为空!';
            return $m3_result->toJson();
        }
        if(strlen($phone)!=11 && $phone[0]!='1'){
            $m3_result->status=2;
            $m3_result->message='手机号格式不正确!';
            return $m3_result->toJson();
        }
        $sendTemplateSMS=new SendTemplateSMS();
        //生成6位数字的短信验证码
        $code = '';
        $charset = '1234567890';
        $_len = strlen($charset) - 1;
        for ($i = 0;$i < 6;++$i) {
            $code .= $charset[mt_rand(0, $_len)];
        }
        //调用短信接口发短信
        $m3_result=$sendTemplateSMS->sendTemplateSMS($phone,array($code,60),1);
        if($m3_result->status==0){
            $tempPhone=new TempPhone();
            $tempPhone->phone=$phone;
            $tempPhone->code=$code;
            $tempPhone->deadline=date('Y-m-d H:i:s',time()+60*60);
            $tempPhone->save();
        }
        return $m3_result->toJson();
    }

}
