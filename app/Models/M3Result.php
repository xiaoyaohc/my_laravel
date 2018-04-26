<?php

namespace App\Models;

class M3Result {

  public $status;
  public $message;

  public function toJson()
  {
    return json_encode($this, JSON_UNESCAPED_UNICODE);//返回json格式数据，其中第二个参数，可以将返回的中文编码编译成中文
  }

}
