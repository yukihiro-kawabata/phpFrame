<?php
/*
 * 
 * URLで読みに行く先を指定
 * http://example.com/ディレクトリ/function名/
 * 
 */ 
class route_App {

    public $url;
    public $urlArray;

    public $appDirPath = 'app/src/';

    private $controller = 'Controller';
    private $model      = 'Model';
    private $view       = 'View';

    private $common = 'common';

    /* 
     */
    public function __construct()
    {
        $this->url =  $_SERVER["REQUEST_URI"];
        $this->urlArray = explode('/', $this->url);
    }

    /* 
     * route setting
     * 
     * @return void
     */ 
    public function routeAction()
    {
        $this->createPath($this->urlArray);
    }

    /*
     * ファイルパスを通す
     * パス通した後は、controllerに行く
     * 
     * @param array $urlArray urlのスラッシュ区切り
     * @return void
     */
    public function createPath(array $urlVal)
    {
        // ホスト名だけでアクセス時
        if (empty($urlVal[1]))
        {
            phpinfo();
            exit();
        }

        // 必ずPathを通したいファイル
        // abstruct,error 
        $this->requeireAction('./' . $this->appDirPath .'abstruct');
        
        // common
        $this->requeireAction('./' . $this->appDirPath . $this->common . '/' . $this->controller);
        $this->requeireAction('./' . $this->appDirPath . $this->common . '/' . $this->model);
        $this->requeireAction('./' . $this->appDirPath . $this->common . '/' . $this->view);

        // model
        $this->requeireAction('./' . $this->appDirPath . $urlVal[1] . '/' . $this->model);
        // view
        $this->requeireAction('./' . $this->appDirPath . $urlVal[1] . '/' . $this->view);
        // controller
        $fileExist = $this->requeireAction('./' . $this->appDirPath. $urlVal[1] . '/' . $this->controller);
        $this->execute($urlVal , $fileExist);

    }

    /*
     * controller に処理を移す
     * 
     * controller の class はファイル名と同じと想定
     * 
     * @param array $urlVal urlをスラッシュ区切り
     * @param boolean $controllerFile 指定先のファイル
     * @return void
     */
    public function execute(array $urlVal , $controllerFile = false)
    {
        if (!$controllerFile)
        {
            dx('ファイルが見つかりません');
        }

        if (!array_key_exists('2', $urlVal)) $call = 'index';
    
        if (empty($urlVal[2])) 
        {
            $call = 'index';        
        } else {
            $call = $urlVal[2];
        }
        
        // クラス名
        $class = $urlVal[1] . $this->controller;

        // インスタンス生成
        $instance = new $class();

        // 呼び出し
        $instance->{$call}();

    }

    /*
     * パスを通す
     * 
     * @param string $dirPath 指定先のディレクトリパス
     * @return boolean
     */
    public function requeireAction(string $dirPath = '')
    {
        $fileExist = false;
        foreach(glob($dirPath . '/*') as $file)
        {
            if(is_file($file))
            {
                $fileExist = true;
                require_once $file;
            }
        }

        // ディレクトリ内にファイルが1つ以上あるかないか
        if ($fileExist)
        {
            return true; // ある
        } else {
            return false; // ない
        }
    }


}

?>