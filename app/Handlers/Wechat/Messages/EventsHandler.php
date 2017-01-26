<?php
/**
 * Created by PhpStorm.
 * User: MasterHo1228
 * Date: 2017/1/26
 * Time: 22:00
 */

namespace Handlers\Wechat\Messages;

/**
 * Wechat Event messages handler
 * @package Handlers\Wechat\Messages
 */
class EventsHandler extends Handler
{
    public function handleMessage($type)
    {
        switch ($type) {
            case 'subscribe':
                $response = "嗯 灰常感谢你的关注 公众号功能在不断完善中 若招呼不周 多多见谅哈~~/:dig";
                break;
            default:
                $response = '';
                break;
        }
        return $response;
    }
}