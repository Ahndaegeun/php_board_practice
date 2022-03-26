<?php
require_once __DIR__ . '/global.php';

function APP_runAction($action) {
    list($controllerTypeCode, $controllerName, $actionFuncName) = explode('/', $action);

    $controllerClassName = 'APP_' . ucfirst($controllerTypeCode) . ucfirst($controllerName) . 'Controller';
    $actionMethodName = "action";

    if( str_starts_with($actionFuncName, 'do') ) {
        $actionMethodName .= ucfirst($actionFuncName);
    } else {
        $actionMethodName .= 'Show' . ucfirst($actionFuncName);
    }

    $usrArticleController = new $controllerClassName();
    $usrArticleController->$actionMethodName();
}

function runApp($action) {
    APP_runInterceptors($action);
    APP_runAction($action);
}