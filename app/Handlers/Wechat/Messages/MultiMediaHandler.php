<?php
/**
 * Created by PhpStorm.
 * User: MasterHo1228
 * Date: 2017/1/26
 * Time: 22:22
 */

namespace App\Handlers\Wechat\Messages;

/**
 * Wechat MultiMedia messages handler
 * @package Handlers\Wechat\Messages
 */
class MultiMediaHandler extends Handler
{
    public function handleMessage($type)
    {
        switch ($type) {
            case 'image':
                # 图片消息...
                $response = "发了个表情包给我，还是~~~？/:dig";
                break;
            case 'voice':
                # 语音消息...
                $response = "发文字 语音懒得听~/:dig";
                break;
            case 'video':
                # 视频消息...
                $response = "嗯！肯定是。。。。。视频一个~/:dig";
                break;
            case 'shortvideo':
                # 视频消息...
                $response = "小视频？？？！！！/:dig";
                break;
            case 'link':
                # 链接消息...
                $response = "老实告诉我 这是什么链接呢~~/:dig";
                break;
            default:
                $response = '';
                break;
        }

        return $response;
    }
}