<?php
namespace App\Http\Controllers\Home;
use App\http\Controllers\Controller;
class IndexController extends Controller{
    public function index(){
        return 'this is home';
    }
}