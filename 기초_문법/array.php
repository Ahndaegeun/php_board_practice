<?php
$arr = array();
$arr[0] = 'apple';

$arr = array(1, 2, 3, 4);

// 인덱스가 없으면 push와 같음
$arr[] = 5;

// 값이 없는 인덱스는 null처리
$arr[9] = 10;

for($i = 0; $i < count($arr); $i++) {
  echo $arr[$i];
}

foreach($arr as $item) {
  echo $item;
}

// 다차원 배열
$arr2 = array(
  array(),
  array()
);

$arr2[0][0] = 1;

// 연관 배열
$arr3 = array();
// map과 같음
$arr3['apple'] = 1;

foreach($arr3 as $key=>$value) {
  echo $key." ".$value;
}
?>