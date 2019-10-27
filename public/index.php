<?php

// PHPエラー出力レベルの設定
//error_reporting(E_ALL ^E_NOTICE ^E_DEPRECATED); // 基本的なエラー出力
error_reporting(-1); 

require_once __DIR__ . "/../vendor/autoload.php";

require_once './../Function.php'; // オリジナル関数
require_once './../Define.php';   // 定義系
require_once './../route.php';


$route = new route_App;
$route->routeAction();

?>