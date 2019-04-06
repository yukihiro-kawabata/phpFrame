<?
/*
 * viewファイルにデータを送る
 * @param $file string ファイル名
 * @param $data object viewに渡すデータ
 */ 
function view($file = '', $data = null)
{
    // ビューファイルを指定する
    $route_App = new route_App();
    $viewFile = './' . $route_App->appDirPath . $route_App->urlArray[1] . '/view/' . $file . '.php';
    //include($viewFile);

}

/*
 * デバック用
 * @param mixed
 */ 
function dx($str = '')
{
    echo '<pre>';
    var_dump($str);
    echo '</pre>';
    exit();
}