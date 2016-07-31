<?php
$dirPath='F:\test1';//目录,结尾不加’/‘

//执行遍历
recursion_readdir($dirPath);

/**
*@summary 重复times次字符char
*@param $char 需要重复的字符
*@param $times 重复次数
*@return 返回重复字符组成的字符串
*/
function forChar($char='-',$times=0){
    $result='';
    for($i=0;$i<$times;$i++){
        $result.=$char;
    }
    return $result;
}

/**
*@summary   递归读取目录
*@param $dirPath 目录
*@param $Deep=0 深度，用于缩进,无需手动设置
*@return 无
*/
function recursion_readdir($dirPath,$Deep=0){
  $resDir=opendir($dirPath);
  while($basename=readdir($resDir)){
      //当前文件路径
      $path=$dirPath.'/'.$basename;
      if(is_dir($path) AND $basename!='.' AND $basename!='..'){
        //是目录，打印目录名，继续迭代
        echo forChar('-',$Deep).$basename.'/<br/>';
        $Deep++;//深度+1
        recursion_readdir($path,$Deep);
      }else if(basename($path)!='.' AND basename($path)!='..'){
          //不是文件夹，打印文件名
          echo forChar('-',$Deep).basename($path).'<br/>';
      }

  }
  closedir($resDir);
}