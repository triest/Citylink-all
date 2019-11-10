﻿<?php

/**
 * @charset UTF-8
 *
 * Работа с массивами и строками.
 *
 * Есть список адресов домов.
 *
 * Необходимо написать функцию, которая формирует множество возможных написаний адреса
 * с учетом возможных сокращений, перестановок, записей номера дома большой/маленькой буквой,
 * записей корпуса через дробь/дефис.
 *
 * Пример:
 *
 * Есть адрес, заданный массивом:
 *
 * array(
 *     "Ленина ул.",
 *     "14а"
 * )
 *
 * Функция должна вернуть массив:
 *
 * array(
 *    'Ленина ул. 14а',1 +
 *      'Ленина ул. 14А',2 +
 *      'Ленина улица 14а',3 +
 *      'Ленина улица 14А',4 +
 *      'ул. Ленина 14а', 5 +
 *      'ул. Ленина 14А',6+
 *      'улица Ленина 14-а',7
 *      'улица Ленина 14-А',8
 *      'Ленина ул. 14-а',9
 *      'Ленина ул. 14-А',10
 *      'Ленина улица 14-а',11
 *      'Ленина улица 14-А',12
 *      'ул. Ленина 14-а',13
 *      'ул. Ленина 14-А',14
 *      'улица Ленина 14-а',15
 *      'улица Ленина 14-А',16
 *      'Ленина ул. 14/а',17
 *      'Ленина ул. 14/А',18
 *      'Ленина улица 14/а',19
 *      'Ленина улица 14/А',20
 *      'ул. Ленина 14/а',21
 *      'ул. Ленина 14/А',22
 *      'улица Ленина 14/а',23
 *      'улица Ленина 14/А',24
 * )
 */

# Можно использовать список:

$addresses = array (
    array(
        "Ленина ул.",
        "14а"
    ),
    array(
        "Таёжный пер.",
        "17-2"
    ),
    array(
        "Горняков просп.",
        "13Б"
    ),
);






/**
 * @param $arr
 */
function variant($arr){
    setlocale(LC_ALL, "ru_RU.CP1251");
    $Strit_name_string=$arr[0]; // строка с названием и приставкой
    $Strit_number_corpus=$arr[1];
     $Strit_name_string_array=explode(' ', $Strit_name_string); 
     print_r($Strit_name_string_array);
    
  // echo "улица "; echo  $Strit_name_string; echo PHP_EOL;

    //получаем название
    $arr = explode(' ',trim($Strit_name_string));

   
   
    // теперь надо получить корпус
    echo "home и корпус ";
    echo $Strit_number_corpus;
    //  $Korpus=substr($Strit_number_corpus, 1);
      echo PHP_EOL;
    echo "массив";echo PHP_EOL;
    print_r($arr);
    //в начле ищим, есть ли в строке дефис
       $pristavka_full="";
       $pristavka_cut="";
      // тут надо разобрать возможные приставки
       $pristavka_full="";
       $pristavka_cut="";
      // тут надо разобрать возможные приставки
                  
              $temp=strcmp($arr[1],"ул.");
              echo "temp ";echo $temp; echo "";
         if($temp==0){
                  echo "in strit ";
               $pristavka_full="улица ";
               $pristavka_cut="ул.";
         }
             $temp=strcasecmp($arr[1],"пер.");
               echo "temp ";echo $temp;
           if($temp==0){
                echo "in per";
               $pristavka_full="переулок ";
               $pristavka_cut="пер.";
         }
           $temp=strcasecmp($arr[1],"просп.");
             echo "temp ";echo $temp;
             if($temp==0){
                echo "in prosp";
               $pristavka_full="проспект ";
               $pristavka_cut="просп.";
         }
echo PHP_EOL;
   
   // echo $home_number;echo  PHP_EOL;
    // теперь надо проверить, есть ли буквеный корпус
    if(preg_match("/[а-я]/i", $Strit_number_corpus)){
       echo "string";echo PHP_EOL;
        //если есть, то берём
        $char_korp=substr($Strit_number_corpus,strlen($Strit_number_corpus-2) ,strlen($Strit_number_corpus-1));
        echo "korpus ";
        echo $char_korp;
        $home_number = preg_replace('~[^0-9]+~','',$Strit_number_corpus);
        //теперь получим номер домаecho PHP_EOL;
        echo PHP_EOL;
       echo "номер дома ";echo $home_number;        
    }

    //теперь надо проверить, есть ли корпус через дефис
     elseif(strpos($Strit_number_corpus, '-') !== false) {
       echo "Корпус дефис: ";
        //если есть, то берём
      //  $char_korp=substr($Strit_number_corpus,strlen($Strit_number_corpus-1) ,strlen($Strit_number_corpus-0));
        $char_korp=explode("-", $Strit_number_corpus);
        $char_korp=$char_korp[1];
      //  echo "korpus ";

        echo $char_korp; 
        $home_number = preg_replace('~[^0-9]+~','',$Strit_number_corpus);
        //теперь получим номер домаecho PHP_EOL;
        echo PHP_EOL;
       echo "номер дома ";echo $home_number;        
     }

      //***********************
      //'Ленина ул. 14а',1 +
     //****************************
       //временное значение результата
      echo PHP_EOL;
   //  echo "Результат: ";
      if (is_numeric($char_korp)){
      $temp=$Strit_name_string_array[0]." ".$Strit_name_string_array[1]." ".$home_number." ".$char_korp;

       array_push($rez_array, $temp);
    }
    else{
          $temp=$Strit_name_string_array[0]." ".$Strit_name_string_array[1]." ".$home_number." ".$char_korp;
       array_push($rez_array, $temp);
    }
      echo PHP_EOL;
    
  //    echo $temp;;

      //массив результата
      $rez_array=[];
      array_push($rez_array, $temp);
      print_r($rez_array);
echo PHP_EOL;

      //***********************
      //'Ленина ул. 14А',1 +
     //****************************
    echo PHP_EOL;
    echo "До функции: ";  echo  $char_korp;
 /*  if(strpos($char_korp, '-') !== false) {
       echo "Корпус дефис";echo PHP_EOL;
       $char_korp=substr($char_korp, 1);
 // print_r(explode("-", $Strit_number_corpus));
 }*/
    echo PHP_EOL;
    echo "После функции ";
   echo  $char_korp;
    //надо обрезать дефис в гачале

    echo PHP_EOL;
// echo mb_strtoupper("Ахтунг", "UTF-8");
   //  print_r($char_korp);
     echo PHP_EOL;
     echo "Результат: ";
    // echo $char_korp2;
     if (!is_numeric($char_korp)){

     $temp=$Strit_name_string_array[0]." ".$Strit_name_string_array[1]." ".$home_number." ".up($char_korp);
       array_push($rez_array, $temp);
      echo PHP_EOL;}
    //  echo $temp;;
 
  

      //массив результата
   //   $rez_array=[];
  //    array_push($rez_array, $temp);
          //**************
      //  'Ленина улица 14а',3 +
       //**************
         if (!is_numeric($char_korp)){
                   $temp=$Strit_name_string_array[0]." ".$pristavka_full." ".$home_number."".$char_korp;
                 }
                 else{
                   $temp=$Strit_name_string_array[0]." ".$pristavka_full." ".$home_number." ".$char_korp;
                 }
                
                array_push($rez_array, $temp);

//**********
//  'Ленина улица 14А',4 +
//****************                
            if($Strit_name_string_array[1]=="ул."){
          //$temp[1]="улица";
               if (!is_numeric($char_korp)){

                   $temp=$Strit_name_string_array[0]." ".$pristavka_full." ".$home_number."".up($char_korp);
                
                array_push($rez_array, $temp);
              }
               else{
                  $temp=$Strit_name_string_array[0]." ".$pristavka_full." ".$home_number." ".up($char_korp);
               }
                  }
               
//**********
// 'ул. Ленина 14а',
//*********    
 if (!is_numeric($char_korp)){           
   $temp=$Strit_name_string_array[1]." ".$Strit_name_string_array[0]." ".$home_number."".$char_korp;
     array_push($rez_array, $temp);
 }
 else{
    $temp=$Strit_name_string_array[1]." ".$Strit_name_string_array[0]." ".$home_number." ".$char_korp;
     array_push($rez_array, $temp);
 }

     

  //'ул. Ленина 14А'
        if (!is_numeric($char_korp)){
  $temp=$Strit_name_string_array[1]."".$Strit_name_string_array[0]." ".$home_number."".up($char_korp);
       array_push($rez_array, $temp);
     }

 

                   //   if($Strit_name_string_array[1]=="ул."){
          // 'Ленина улица 14-а',3 +
                   $temp=$pristavka_full." ".$Strit_name_string_array[0]." ".$home_number."-".$char_korp;
                
                array_push($rez_array, $temp);
                //  }
                //          if($Strit_name_string_array[1]=="ул."){
          // 'Ленина улица 14-A',3 +
                 if (!is_numeric($char_korp)){
                   $temp=$pristavka_full." ".$Strit_name_string_array[0]."".$home_number."-".up($char_korp);
                
                array_push($rez_array, $temp);
              }
                //  }   
              
           // 'Ленина ул. 14-а',9
                $temp=$Strit_name_string_array[0]." ".$pristavka_cut." " .$home_number."-".$char_korp;
                
                array_push($rez_array, $temp);    

    // 'Ленина ул. 14-А',9
                 if (!is_numeric($char_korp)){
                $temp=$Strit_name_string_array[0].$pristavka_cut." ".$home_number."-".up($char_korp);
                
                array_push($rez_array, $temp); 
                }   

      //
            //'Ленина ул. 14-а',9
                $temp=$Strit_name_string_array[0]." ".$pristavka_full." ".$home_number."-".$char_korp;
                
                array_push($rez_array, $temp);    

    // 'Ленина ул. 14-А'-11,
                 if (!is_numeric($char_korp)){
                $temp=$Strit_name_string_array[0]." ".$pristavka_full ." ".$home_number."-".up($char_korp);
                
                array_push($rez_array, $temp); 
                }   
    //  'ул. Ленина 14-а',13
              $temp=$pristavka_cut."".$Strit_name_string_array[0]." ".$home_number."-".$char_korp;
                
                array_push($rez_array, $temp);        
      //  
       //  'ул. Ленина 14-А',14
                 if (!is_numeric($char_korp)){
              $temp=$pristavka_cut."".$Strit_name_string_array[0]." ".$home_number."-".up($char_korp);
                
                array_push($rez_array, $temp);  
              }      
            if (!is_numeric($char_korp)){
              $temp=$pristavka_full."".$Strit_name_string_array[0]." ".$home_number."-".up($char_korp);
                
                array_push($rez_array, $temp);   
                }   

                        $temp=$pristavka_full."".$Strit_name_string_array[0]." ".$home_number."-".$char_korp;
              

                array_push($rez_array, $temp);      
    $temp=$Strit_name_string_array[0]." ".$pristavka_cut." ".$home_number."/".$char_korp;
   array_push($rez_array, $temp);  
    if (!is_numeric($char_korp)){
      $temp=$Strit_name_string_array[0]." ".$pristavka_cut." ".$home_number."/".up($char_korp);
  array_push($rez_array, $temp);  
}
   $temp=$Strit_name_string_array[0]." ".$pristavka_full." ".$home_number."/".$char_korp;
      array_push($rez_array, $temp);  
       if (!is_numeric($char_korp)){
    $temp=$Strit_name_string_array[0]." ".$pristavka_full." ".$home_number."/".up($char_korp);
      array_push($rez_array, $temp);  
    }
          $temp=$pristavka_cut.$Strit_name_string_array[0]." ".$home_number."/".$char_korp;
    array_push($rez_array, $temp);  
     if (!is_numeric($char_korp)){
               $temp=$pristavka_cut.$Strit_name_string_array[0]." ".$home_number."/".up($char_korp);
    array_push($rez_array, $temp);  }
        $temp=$pristavka_full."".$Strit_name_string_array[0]." ".$home_number."/".$char_korp;
    array_push($rez_array, $temp);  
     if (!is_numeric($char_korp)){
               $temp=$pristavka_full."".$Strit_name_string_array[0]." ".$home_number."/".up($char_korp);
    array_push($rez_array, $temp);  
  }
      print_r($rez_array);
echo PHP_EOL;

       

}


function to_uppercase($string){

   return ucfirst($string);;
}

function rucfirst($str) {
    if(ord(substr($str,0,1))<192) {
        $temp=ucfirst($str);
      return $temp;
    }
    else
    {
      $temp=chr(ord(substr($str,0,1))-32).substr($str,1);
    return $temp;
}
}

function up($str){
  $temp=strripos ("абвгдеёжзийклмнопрстуфхцчшщъыьэюя",$str);
  $alf="AБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ";
    $temp2=substr($alf, $temp/2,1);
 //   echo iconv("CP1251", "CP866", $temp2);
    echo $temp2;
  return $temp2;

}
 
 function my($arr){
   foreach ($arr as $key => $value) {
      variant($value);
   }
 }

 function test_delimer($Strit_number_corpus){
if(strpos($Strit_number_corpus, '-') !== false) {
       echo "Корпус дефис";echo PHP_EOL;
     }
 // print_r(explode("-", $Strit_number_corpus));
 }

 //echo to_uppercase("ул");echo PHP_EOL;
  echo up("я");echo PHP_EOL;
 //echo "я";
//variant_arr($addresses);
variant($addresses[1]);
//my($addresses);
//test_delimer("172-A");