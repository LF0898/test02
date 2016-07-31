<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<body>
<?php
	$arr=array(3,63,47,43,65,99,32,6,8,12,39);
	echo " 原数组:<br>";
	print_r($arr);
	echo "<br>";
	//冒泡排序算法
	function bubbleSort($arr)
	{  
		echo "这是冒泡排序算法<br>";
	  $len=count($arr);
	  //该层循环控制 需要冒泡的轮数
	  for($i=1;$i<$len;$i++)
	  { //该层循环用来控制每轮 冒出一个数 需要比较的次数
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
	//选择排序算法
	function selectSort($arr) {
		echo "这是选择排序算法<br>";
		//双重循环完成，外层控制轮数，内层控制比较次数
		$len=count($arr);
		for($i=0; $i<$len-1; $i++) {
			//先假设最小的值的位置
			$p = $i;
	
			for($j=$i+1; $j<$len; $j++) {
				//$arr[$p] 是当前已知的最小值
				if($arr[$p] > $arr[$j]) {
					//比较，发现更小的,记录下最小值的位置；并且在下次比较时采用已知的最小值进行比较。
					$p = $j;
				}
			}
			//已经确定了当前的最小值的位置，保存到$p中。如果发现最小值的位置与当前假设的位置$i不同，则位置互换即可。
			if($p != $i) {
				$tmp = $arr[$p];
				$arr[$p] = $arr[$i];
				$arr[$i] = $tmp;
			}
		}
		//返回最终结果
		return $arr;
	}
	//插入排序
	function insertSort($arr){
		echo '这是插入排序算法<br>';
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
	//快速排序算法
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
	//归并算法
    function gbSort($arr){
    	
    	if(count($arr)<=1){return $arr;}
    	$min = floor(count($arr)/2);//取中间数字进行拆分
    	$left = array_slice($arr,0,$min);
    	$right = array_slice($arr,$min);
    	$left = gbSort($left); //递归
    	$right = gbSort($right);
    	return get_merge($left,$right);//调用排序合并函数进行合并
    }
    function get_merge($left,$right){
    	while(count($left) && count($right)){
    		$m[] = $left[0]>$right[0] ? array_shift($right) : array_shift($left);
    		//进行比较，小的移除，并且放入到数组$m中。
    	}
    	return array_merge($m,$left,$right);//进行合并（由于不知道left right 哪个会为空，所以进行统一合并）
    }
	
	//
	print_r(bubbleSort($arr));
	echo "<br>";
	print_r(selectSort($arr));
	echo "<br>";
	print_r(insertSort($arr));
	echo "<br>这是快速排序算法<br>";
	print_r(quick_sort($arr));
	echo "<br>这是归并算法<br>";
	print_r(gbSort($arr));
	
	
?>

</body>
</html>