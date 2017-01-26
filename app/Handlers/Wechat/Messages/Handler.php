<?php
/**
 * Created by PhpStorm.
 * User: MasterHo1228
 * Date: 2017/1/26
 * Time: 22:01
 */

namespace App\Handlers\Wechat\Messages;

use Illuminate\Database\Eloquent\Model;

/**
 * Base Wechat Messages Handler class
 * @package Handlers\Wechat\Messages
 */
abstract class Handler extends Model
{
    abstract public function handleMessage($type);
}