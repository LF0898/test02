<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<body>
<?php
	$arr=array(3,63,47,43,65,99,32,6,8,12,39);
	echo " ԭ����:<br>";
	print_r($arr);
	echo "<br>";
	//ð�������㷨
	function bubbleSort($arr)
	{  
		echo "����ð�������㷨<br>";
	  $len=count($arr);
	  //�ò�ѭ������ ��Ҫð�ݵ�����
	  for($i=1;$i<$len;$i++)
	  { //�ò�ѭ����������ÿ�� ð��һ���� ��Ҫ�ȽϵĴ���
	    for($k=0;$k<$len-$i;$k++)
	    {
	       if($arr[$k]>$arr[$k+1])
	        {
	            $tmp=$arr[$k+1];
	            $arr[$k+1]=$arr[$k];
	            $arr[$k]=$tmp;
	        }
	    }
	  }
	  return $arr;
	}
	//ѡ�������㷨
	function selectSort($arr) {
		echo "����ѡ�������㷨<br>";
		//˫��ѭ����ɣ��������������ڲ���ƱȽϴ���
		$len=count($arr);
		for($i=0; $i<$len-1; $i++) {
			//�ȼ�����С��ֵ��λ��
			$p = $i;
	
			for($j=$i+1; $j<$len; $j++) {
				//$arr[$p] �ǵ�ǰ��֪����Сֵ
				if($arr[$p] > $arr[$j]) {
					//�Ƚϣ����ָ�С��,��¼����Сֵ��λ�ã��������´αȽ�ʱ������֪����Сֵ���бȽϡ�
					$p = $j;
				}
			}
			//�Ѿ�ȷ���˵�ǰ����Сֵ��λ�ã����浽$p�С����������Сֵ��λ���뵱ǰ�����λ��$i��ͬ����λ�û������ɡ�
			if($p != $i) {
				$tmp = $arr[$p];
				$arr[$p] = $arr[$i];
				$arr[$i] = $tmp;
			}
		}
		//�������ս��
		return $arr;
	}
	//��������
	function insertSort($arr){
		echo '���ǲ��������㷨<br>';
		$count = count($arr);
		for($i=1; $i<$count; $i++){
			$tmp = $arr[$i];
			$j = $i - 1;
			while($arr[$j] > $tmp){
				$arr[$j+1] = $arr[$j];
				$arr[$j] = $tmp;
				$j--;
			}
		}
		return $arr;
	}
	//���������㷨
    function quick_sort($array){ 
    	
      if (count($array) <= 1) return $array;      
        
      $key = $array[0];     
      $left_arr = array();     
      $right_arr = array();     
      for ($i=1; $i<count($array); $i++){     
        if ($array[$i] <= $key)     
          $left_arr[] = $array[$i];     
        else    
          $right_arr[] = $array[$i];     
      }     
      $left_arr = quick_sort($left_arr);     
      $right_arr = quick_sort($right_arr);      
        
      return array_merge($left_arr, array($key), $right_arr);
      
    }   
	//�鲢�㷨
    function gbSort($arr){
    	
    	if(count($arr)<=1){return $arr;}
    	$min = floor(count($arr)/2);//ȡ�м����ֽ��в��
    	$left = array_slice($arr,0,$min);
    	$right = array_slice($arr,$min);
    	$left = gbSort($left); //�ݹ�
    	$right = gbSort($right);
    	return get_merge($left,$right);//��������ϲ��������кϲ�
    }
    function get_merge($left,$right){
    	while(count($left) && count($right)){
    		$m[] = $left[0]>$right[0] ? array_shift($right) : array_shift($left);
    		//���бȽϣ�С���Ƴ������ҷ��뵽����$m�С�
    	}
    	return array_merge($m,$left,$right);//���кϲ������ڲ�֪��left right �ĸ���Ϊ�գ����Խ���ͳһ�ϲ���
    }
	
	//
	print_r(bubbleSort($arr));
	echo "<br>";
	print_r(selectSort($arr));
	echo "<br>";
	print_r(insertSort($arr));
	echo "<br>���ǿ��������㷨<br>";
	print_r(quick_sort($arr));
	echo "<br>���ǹ鲢�㷨<br>";
	print_r(gbSort($arr));
	
	
?>

</body>
</html>