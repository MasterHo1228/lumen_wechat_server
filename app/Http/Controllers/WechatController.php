<?php
namespace App\Http\Controllers;

use EasyWeChat\Foundation\Application;
use Handlers\Wechat\Messages\EventsHandler;
use Handlers\Wechat\Messages\LocationHandler;
use Handlers\Wechat\Messages\MultiMediaHandler;
use Handlers\Wechat\Messages\TextHandler;
use Log;

class WechatController extends Controller
{
    /**
     * @var array Wechat Service Server options
     */
    private $options;

    /**
     * @var Application EasyWechat Object
     */
    private $app;

    /**
     * Initialize Wechat Service Server
     */
    public function __construct()
    {
        $this->options = [
            'debug' => true,
            'app_id' => 'wx5b3373476b179003', //Wechat AppID
            'secret' => 'd80b6a2de78dedec4c2dd87fc6723668', //Wechat AppSecret
            'token' => 'm1As3tE5Rh30oQ12O28', //Wechat Token
            'aes_key' => 'P6P3UaPu1xToxt0mXB0n8tYVBU1QOi3lg3xhirLtewa', //optional
            'log' => [
                'level' => 'debug',
                'file' => storage_path('logs/wechat.log'),
            ],
            //...
        ];

        $this->app = new Application($this->options);
    }

    public function serve()
    {
        Log::info('request arrived.');

        $this->app->server->setMessageHandler(function ($message) {
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

        return $this->app->server->serve();
    }
}
