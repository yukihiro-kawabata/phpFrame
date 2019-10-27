<?php 

class controller
{
    public function __construct()
    {
    }

    /*
     * htmlを描写する（twigを使用）
     * @param $file string 指定ファイル (拡張子なしで記述)
     * @param $request array viewに渡すデータ
     * @return void
     */
    public function view(string $file, array $request = []) 
    {
        // twigを使用する準備
        $loader = new Twig_Loader_Filesystem ( APPLICATION_PATH . '/view/');
        $twigObj = new Twig_Environment($loader);
        echo $twigObj->render($file . '.html', $request);
    }

}