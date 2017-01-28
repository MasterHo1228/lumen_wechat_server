<?php
/**
 * Created by PhpStorm.
 * User: MasterHo
 * Date: 2017/1/28
 * Time: 22:35
 */

namespace App\Http\Controllers;

use EasyWeChat\Foundation\Application;

class MaterialsController extends Controller
{

    private $material;

    public function __construct(Application $material)
    {
        $this->material = $material->material;
    }

    public function getMedia($mediaID)
    {
        return $this->material->get($mediaID);
    }

    public function imageUpload()
    {
        //TODO image变量填写完整上传图片文件路径
        $image = public_path() . '/images/' . '';
        return $this->material->uploadImage($image);
    }

    public function imageList()
    {
        return $this->material->lists('image');
    }

    public function audioUpload()
    {
        //TODO audio变量填写完整上传图片文件路径
        $audio = public_path() . '/audios/' . '';
        return $this->material->uploadVoice($audio);
    }

    public function audioList()
    {
        return $this->material->lists('voice');
    }

    public function videoUpload()
    {
        //TODO Waiting to complete~~
    }

    public function videoList()
    {
        return $this->material->lists('video');
    }

    public function articleUpload()
    {
        //TODO Waiting to complete~~
    }

    public function articleList()
    {
        return $this->material->lists('news');
    }
}