<?php
// 세미콜론 필수!
// 변수, $로 시작해야됨
$name = 10;

// 슈퍼 글로벌 변수
// 미리 정의된 변수를 제공
$_SERVER;

// static 변수
// 함수 내부에서 static으로 선언하면 메모리에서 안지워짐
static $staticValue = 0;

// 상수
// 상수이름, 상숫값, 대소문자 구분 여부
define("name", "value", true);

// 마법 상수
echo __FILE__; // file full path and name return


// 1. 불리언(boolean)
$boo = true;
$boo = 1;
$boo = false;
$boo = 0;

// 2. 정수(integer) 1 / 2 / ...
$int = 1;

// 3. 실수(float) 1.2 / 2.3 / ...
$float = 3.14;

// 4. 문자열(string) "hello" 'hello'
$str = 'hello';
$str = "hello";

// 5. 배열(array)
$arr = array(
  1 => 'first',
  2 => 'second'
);
echo $arr[0];

// 6. 객체(object)
class Lecture {
  function Lecture() {
    $this->lec_01 = "php";
    $this->lec_02 = "MySql";
  }
}

// 7. 리소스(resource)
// 외부자원, DB값 등

// 8. NULL
$null; // <-- null

// casting
$type_str = "10";
$type_num = (int)$type_str;

?>