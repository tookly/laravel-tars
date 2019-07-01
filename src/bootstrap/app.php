<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/

$app = new Illuminate\Foundation\Application(
    realpath(__DIR__.'/../')
);

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI.
|
*/

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

// 理解下来，绑定即是告诉容器如何解析接口，从而构建对象。
// 简单绑定，注册的类或接口名，返回类的实例。
$app->bind('Cxl\Kernel', function() {
    return new Cxl\Kernel();
});
// 简单绑定，或者是将接口绑定到它的一个实现。
$app->bind(\Cxl\BaseKernel::class,\Cxl\Kernel::class);

// 单例绑定
$app->singleton('Cxl\Kernel', function() {
    return new Cxl\Kernel();
});

// 实例绑定
$kernel = new \Cxl\Kernel();
$app->instance('Cxl\Kernel', $kernel);

// 绑定初始数据，这个意思是在这个类里需要某个变量时，就把注册的变量给他。
// 这个不仅可以绑定初始数据，也可以用来绑定不同上下文中的接口的实现。
$rule = array();
$app->when('Cxl\Controller')
    ->needs('rule')
    ->give($rule);

// 这个没有太明白做什么用
$app->tag(['AReport', 'BReport'], 'reports');
$app->bind('Cxl\Kernel', function($app) {
    return new \Cxl\Kernel($app->tagged('reports'));
});

// 使用make方法将容器中的类实例解析出来
$kernel = $app->make('Cxl\Kernel');
//$app->makeWith();


/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

$app->register(\Lxj\Laravel\Tars\ServiceProvider::class);

return $app;
