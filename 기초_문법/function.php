<?php
function func1() {
  return 1;
}

$result = $func1();

// 값 전달
function func2($param) {
  $param++;
}

// 참조 전달
function func3(&$param) {
  $param++;
}
$value = 1;
$func3($value);
echo $value; // 2출력;

// 매개변수 기본 값 할당
function func4($value1, $value2 = 2) {
  return $value1 + $value2;
}

$func4(1, 5); // 6;
$func4(1); // 3;

// 가변인수
function func5(...$num) {
  foreach($num as $n) {
    echo $n;
  }
}

// js의 호이스팅 없음 순서 잘쓰자!
// 가변함수 / 괄호가 붙으면 함수호출 아니면 변수
function func6() {

}
$func6 = 'hello';
$func6(); // 함수 호출

// ==================================================
// 기본 내장 함수는 홈페이지 들어가서 보자
?>