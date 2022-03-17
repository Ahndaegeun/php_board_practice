<?php
class my_class {
  public $pValue;
  private $priValue;
  protected $proValue;

  function __construct() {
    // 생성자
    $this->pValue = 'hello';
    $this->priValue = 'hello';
    $this->proValue = 'hello';
  }

  public function pMethod() {
    // public 공개
  }

  private function priMethod() {
    // private 비공개
  }

  protected function proMethod() {
    // protected 상속 / 외부에선 private
  }

  function __destruct() {
    // 소멸자 
    // 객체 삭제시 호출
    // 매개변수 불가능
  }
}

// =========== OOP =================
// 상속
class my_parent {
  public function override() {

  }
}

class child extends my_parent {
  public function override() {
    // overriding
  }
}

// static
class StaticMember {
  public static $sMember = 'hello';
}

// 범위 지정 연산자 ::
// 상수, static 에 접근
echo StaticMember::$sMember;

// 클래스 내에서 self::?? or parent::?? 사용하면 특정 프로퍼티 혹은 메서드에 접근 가능

// abstract class
abstract class AbstractClass {
  // abstract method
  abstract protected function move();
}

interface my_interface {
  public function move();
  public function stop();
}

//
?>