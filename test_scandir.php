<?php
$dirPath='F:\test1';//Ŀ¼,��β���ӡ�/��

//ִ�б���
recursion_readdir($dirPath);

/**
*@summary �ظ�times���ַ�char
*@param $char ��Ҫ�ظ����ַ�
*@param $times �ظ�����
*@return �����ظ��ַ���ɵ��ַ���
*/
function forChar($char='-',$times=0){
    $result='';
    for($i=0;$i<$times;$i++){
        $result.=$char;
    }
    return $result;
}

/**
*@summary   �ݹ��ȡĿ¼
*@param $dirPath Ŀ¼
*@param $Deep=0 ��ȣ���������,�����ֶ�����
*@return ��
*/
function recursion_readdir($dirPath,$Deep=0){
  $resDir=opendir($dirPath);
  while($basename=readdir($resDir)){
      //��ǰ�ļ�·��
      $path=$dirPath.'/'.$basename;
      if(is_dir($path) AND $basename!='.' AND $basename!='..'){
        //��Ŀ¼����ӡĿ¼������������
        echo forChar('-',$Deep).$basename.'/<br/>';
        $Deep++;//���+1
        recursion_readdir($path,$Deep);
      }else if(basename($path)!='.' AND basename($path)!='..'){
          //�����ļ��У���ӡ�ļ���
          echo forChar('-',$Deep).basename($path).'<br/>';
      }

  }
  closedir($resDir);
}