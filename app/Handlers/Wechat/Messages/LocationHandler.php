<?php
/**
 * Created by PhpStorm.
 * User: MasterHo1228
 * Date: 2017/1/26
 * Time: 22:34
 */

namespace App\Handlers\Wechat\Messages;

/**
 * Wechat location messages handler
 * @package Handlers\Wechat\Messages
 */
class LocationHandler
{
    public function handleMessage($Location_X, $Location_Y, $Scale = '', $Label = '')
    {
        $response = '';

        $response .= "名称：" . $Label . "\n";
        $response .= "经度：" . $Location_Y . "\n";
        $response .= "纬度：" . $Location_X . "\n";
        $response .= "缩放：" . $Scale . "\n";
        $response .= "呦 要我约你的节奏？？/:dig";

        return $response;
    }
}