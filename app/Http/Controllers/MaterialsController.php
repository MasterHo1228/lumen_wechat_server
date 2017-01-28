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

    public function image()
    {
        return $this->material->uploadImage(public_path() . '/images/demo.jpg');
    }

    public function audio()
    {

    }

    public function video()
    {

    }

    public function article()
    {

    }
}