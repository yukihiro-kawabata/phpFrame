<?php

abstract class error_Model extends Exception
{
    protected $code;
    protected $message;

    public function __construct($code)
    {
        $this->code = $code;
        $this->error($this->code);
    }

    /*
     * 任意のエラーコードによってエラーメッセージを返す
     *
     * @param string $code
     * @return string $re
     */
    public function error()
    {
        switch($code)
        {
            case '001':
                $re  = '存在しないページです';
                break;

            case '002':
                $re  = '不正な操作が実行されました。(不正なページ遷移等)';
                break;

            case '003':
                $re  = 'データベース処理に失敗しました。';
                break;

            default ;
                $re = '例外が発生しました';
                break;
        }
    
        $this->message = $re;
    }
}


?>