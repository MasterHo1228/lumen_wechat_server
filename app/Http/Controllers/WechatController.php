<?php
namespace App\Http\Controllers;

use App\Handlers\Wechat\Messages\EventsHandler;
use App\Handlers\Wechat\Messages\LocationHandler;
use App\Handlers\Wechat\Messages\MultiMediaHandler;
use App\Handlers\Wechat\Messages\TextHandler;
use Log;

class WechatController extends Controller
{
    /**
     * Response request messages from Wechat
     *
     * @return string
     */
    public function serve()
    {
        Log::info('request arrived.');

        $wechat = app('wechat');
        $wechat->server->setMessageHandler(function($message){
            switch ($message->MsgType) {
                # 事件消息...
                case 'event':
                    $response = (new EventsHandler())->handleMessage($message->Event);
                    break;
                # 文字消息...
                case 'text':
                    $response = (new TextHandler())->handleMessage($message->Content);
                    break;
                # 多媒体消息
                case 'image':
                case 'voice':
                case 'video':
                case 'shortvideo':
                case 'link':
                    $response = (new MultiMediaHandler())->handleMessage($message->MsgType);
                    break;
                # 坐标消息
                case 'location':
                    $response = (new LocationHandler())->handleMessage($message->Location_X, $message->Location_Y, $message->Scale, $message->Label);
                    break;
                # 其它消息
                default:
                    # code...
                    $response = "我就默默的看着你装逼~~/:dig";
                    break;
            }
            return $response;
        });

        Log::info('return response.');

        return $wechat->server->serve();
    }
}
