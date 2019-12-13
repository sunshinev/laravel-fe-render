# laravel-fe-render


## 介绍

用于配合base-fe项目渲染控制器的视图页面

如果需要进行`src/assets/dist/js/app.bundle.js`修改，请参考[https://github.com/sunshinev/base-fe](https://github.com/sunshinev/base-fe)，可重新编译该项目。

## 如何升级相关组件

页面渲染使用`base-fe`项目，请将base-fe项目编译后的dist目录放到laravel-fe-render项目的assets目录下，重新发布

```
➜  laravel-fe-render git:(master) tree
.
├── README.md
├── composer.json
└── src
    ├── Controller
    │   └── BaseRenderController.php
    ├── LICENSE
    ├── RenderServiceProvider.php
    ├── assets
    │   └── dist # 这里是base-fe编译后的文件
    │       ├── css
    │       │   └── chunk-vendors.css
    │       ├── favicon.ico
    │       ├── fonts
    │       │   ├── ionicons.ttf
    │       │   ├── ionicons.woff
    │       │   └── ionicons.woff2
    │       ├── img
    │       │   └── ionicons.svg
    │       ├── index.html
    │       └── js
    │           ├── app.bundle.js
    │           └── chunk-vendors.js
    ├── config.php
    └── views
        └── layouts
            └── index.blade.php

10 directories, 16 files
```