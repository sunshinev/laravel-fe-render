<?php

namespace Sunshinev\Render\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


/**
 * Class RenderController
 * @package App\Http\Controllers\Manage
 */
class BaseRenderController extends Controller
{

    /**
     * 默认层
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function index() {

        $viewPath = 'fe-render::index';


        $appJsVersion = app()['config']->get('fe-render.app_js_version',[]);

        $appJsVersion = !$appJsVersion ? '' : '.'.$appJsVersion;

        return response()->view($viewPath,['app_js_version'=>$appJsVersion]);
    }

    /**
     * 每个页面单独的层
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function render(Request $request) {

        $parentPath = trim(str_replace(['App\Http\Controllers','RenderController'],['',''],static::class),'\\');

        $viewPath = $request->get('path');

        $viewPath = strtolower(str_replace(['\\','/'],['.','.'],trim($parentPath.'/'.$viewPath,'/')));

        // 改造viewpath
        $viewPath = view($viewPath)->getPath();

        return response(file_get_contents($viewPath))->withHeaders([
            'Access-Control-Allow-Origin'=>'*'
        ]);
    }
}
