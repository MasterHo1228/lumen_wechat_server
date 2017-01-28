<?php
/**
 * Created by PhpStorm.
 * User: MasterHo
 * Date: 2017/1/28
 * Time: 20:28
 */

namespace App\Http\Controllers;

use EasyWeChat\Foundation\Application;

class UsersController extends Controller
{
    private $wechat;

    public function __construct(Application $wechat)
    {
        $this->wechat = $wechat;
    }


    public function users()
    {
        $users = $this->wechat->user->lists();

        return $users;
    }

    public function user($openID)
    {
        $user = $this->wechat->user->get($openID);

        return $user;
    }

//    public function remark(Request $request){
//        return $this->wechat->user->remark($request->openID,$request->name);
//    }
}