<?php
namespace App\Http\Controllers;

use Log;

class WechatController extends Controller
{
    public function serve()
    {
        Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志

        $wechat = app('wechat');
        $wechat->server->setMessageHandler(function ($message) {
            $reply = '';
            switch ($message->MsgType) {
                case 'event':
                    # 事件消息...
                    switch ($message->Event) {
                        case 'subscribe':
                            $reply = "嗯 灰常感谢你的关注 公众号功能在不断完善中 若招呼不周 多多见谅哈~~/:dig";
                            break;
                        default:
                            # code...
                            break;
                    }
                    break;
                case 'text':
                    # 文字消息...
                    switch ($message->Content) {
                        case 'doge':
                            $reply = "精神污染~";
                            break;
                        case 'hello':
                            $reply = "哈喽~";
                            break;
                        case '你好':
                            $reply = "雷猴~";
                            break;
                        default:
                            $reply = "哦/:dig/:dig";
                            break;
                    }
                    break;
                case 'image':
                    # 图片消息...
                    $reply = "发了个表情包给我，还是~~~？/:dig";
                    break;
                case 'voice':
                    # 语音消息...
                    $reply = "发文字 语音懒得听~/:dig";
                    break;
                case 'video':
                    # 视频消息...
                    $reply = "嗯！肯定是。。。。。视频一个~/:dig";
                    break;
                case 'shortvideo':
                    # 视频消息...
                    $reply = "小视频？？？！！！/:dig";
                    break;
                case 'location':
                    # 坐标消息...
                    $Label = $message->Label;
                    $Location_X = $message->Location_X;
                    $Location_Y = $message->Location_Y;
                    $Scale = $message->Scale;

                    $reply .= "名称：" . $Label . "\n";
                    $reply .= "经度：" . $Location_Y . "\n";
                    $reply .= "纬度：" . $Location_X . "\n";
                    $reply .= "缩放：" . $Scale . "\n";
                    $reply .= "呦 要我约你的节奏？？/:dig";
                    break;
                case 'link':
                    # 链接消息...
                    $reply = "老实告诉我 这是什么链接呢~~/:dig";
                    break;
                // ... 其它消息
                default:
                    # code...
                    $reply = "我就默默的看着你装逼~~/:dig";
                    break;
            }
            return $reply;
        });

        Log::info('return response.');

        return $wechat->server->serve();
    }
}
