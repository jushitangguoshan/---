<?php
namespace errorDispose;#错误响应
class Errop_Dispose
{
    public static  function register()
    {
        #最开始设置显示错误配置  ini_set("display_error",0);
        error_reporting(E_ALL);
        #有语法错误执行的函数
        set_error_handler(__CLASS__,"appError");
        #注册报错后执行的函数
        register_shutdown_function(__CLASS__,"appShutdown");
    }
    public static function appError($type,$msg,$file,$line)
    {
        echo "错误类型：".$type.PHP_EOL;
        echo "文件位置：".$file.PHP_EOL;
        echo "错误信息".$msg.PHP_EOL;
        echo "错误所在行数：".$line;
    }
    public static function appShutdown()
    {
        $error = error_get_last();
        if($error ){
            echo ("错误级别".$error['type'].PHP_EOL."错误信息".$error['message'].PHP_EOL."错误所在文件".$error['file'].PHP_EOL."错误行数".$error['line']);
        }
    }
}

