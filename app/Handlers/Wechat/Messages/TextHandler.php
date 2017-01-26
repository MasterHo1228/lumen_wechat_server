<?php
/**
 * Created by PhpStorm.
 * User: MasterHo1228
 * Date: 2017/1/26
 * Time: 22:19
 */

namespace App\Handlers\Wechat\Messages;

/**
 * Wechat Plain text messages handler
 * @package Handlers\Wechat\Messages
 */
class TextHandler extends Handler
{
    public function handleMessage($type)
    {
        switch ($type) {
            case 'doge':
                $response = "精神污染~";
                break;
            case 'hello':
                $response = "哈喽~";
                break;
            case '你好':
                $response = "雷猴~";
                break;
            default:
                $response = "哦/:dig/:dig";
                break;
        }
        return $response;
    }
}