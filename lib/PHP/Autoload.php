<?php
    /*
     * ���������� ������������� �������� �������
     */

     class PHP_Autoload{

         # ������ �������� ������ �������, ������������ ��� ������� ��
         # autoload
         static $funcs = array();

         # ���������� ��� ��������, ������� ���������� �� ������� ����������
         # __autoload()
         static $ok = true;

         # ������� ������������ ����� ������� � ������ ������������
         static function register($func){
             # � ������ ������ ������� ���������� ������ �� ������� � ��� ����� 
             # ��� ���������� ����������������
             self::$funcs[] =& $func;
         }

         # ������� ������� ������� �� ������ ������������������ ������������
         static function unregister($func){
             # ��� �������� ��������� � ���������� F �������� ������ �� ������ 
             # �� ������ �������
             $f =& self::$funcs;

             # ���������� ��� �������� �������
             for($i = 0; $i < count($f); $i++){

                 # � ������ ���������� � ������� �� ������� ������� ��� ��������
                 # ������� ������ � ���������� ...
                 if($f[$i] === $func){

                     # ... �� ������� �� ������� �� ������� ������ ���� �������
                     # ������������ � ������� $i
                     array_splice($f, $i, 1);
                     break;
                 }
             }
         }

         # ���������� � ������ ������� �� autoload
         static function autoload($classname){
             static $loading = array();

             # ���� ����� �� ��������, ����������� class_exists(),
             # ���������� ��������� ������ �� autoload, � ��������� �������������. ��� ��
             # �������� �����,���������, ����� ���� � autoload() � ��� �� ������
             # ������ �� ���������� ������
             if(@$loading[$classname])  return;

             # ���� ��������. ���� autoload() ����� ������� ����������,
             # ��������� ���������� �������.
             $loading[$classname] = true;

             # array_reverse() - ���������� ������ � ���������� � �������� �������
             foreach(array_reverse(self::$funcs) as $f){

                 # ����� ���������� ����������� ����� autoload(),
                 # ����� ����� ��� �� ��������
                 # class_exists() - ���������, ��� �� �������� �����
                 if(class_exists($classname)) break;

                 # �������� ����������. ���� �� ������ false, ������,
                 # ��������� �����-�� ������, � ���������� ���������
                 # ��������� �� ������ ����������.
                 # call_user_func() - �������� ���������������� �������
                 if(call_user_func($f, $classname)) break;
             }

             # �������� ���������
             $loading[$classname] = false;
         }
     }

     # ���, ����������� ��� ����������� ����������.
     # ������������� ����������� ���������� ����������
     # �� __autoload, �� ������ � ������, ���� ����� ���������� ��� �� ���
     # ���������� ���-�� ���
     if(!function_exists("__autoload")){
         function __autoload($c){
             PHP_Autoload::autoload($c);
         }
     } else {
         PHP_Autoload::$ok = false;
     }