<?php


// PHPエラー出力レベルの設定
//error_reporting(E_ALL ^E_NOTICE ^E_DEPRECATED); // 基本的なエラー出力
error_reporting(E_ALL ^E_NOTICE ^E_DEPRECATED ^E_STRICT ^E_WARNING ); 

require_once './Define.php';
require_once './Function.php';

// include('./route.php');
require_once './route.php';

$route = new route_App;
$route->routeAction();

?>