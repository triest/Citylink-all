<?php

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
 * 	   "Ленина ул.", 
 * 	   "14а"
 * )
 *  
 * Функция должна вернуть массив:
 *
 * array(
 *  	'Ленина ул. 14а',
 *      'Ленина ул. 14А',
 *      'Ленина улица 14а',
 *      'Ленина улица 14А',
 *      'ул. Ленина 14а',
 *      'ул. Ленина 14А',
 *      'улица Ленина 14-а',
 *      'улица Ленина 14-А',
 *      'Ленина ул. 14-а',
 *      'Ленина ул. 14-А',
 *      'Ленина улица 14-а',
 *      'Ленина улица 14-А',
 *      'ул. Ленина 14-а',
 *      'ул. Ленина 14-А',
 *      'улица Ленина 14-а',
 *      'улица Ленина 14-А',
 *      'Ленина ул. 14/а',
 *      'Ленина ул. 14/А',
 *      'Ленина улица 14/а',
 *      'Ленина улица 14/А',
 *      'ул. Ленина 14/а',
 *      'ул. Ленина 14/А',
 *      'улица Ленина 14/а',
 *      'улица Ленина 14/А'
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


function variant_arr($arr){
    echo $arr[0][0];
     echo $arr[0][1];


}

function variant($arr){
    setlocale(LC_ALL, "ru_RU.CP1251");
    $Strit_name_string=$arr[0][0]; // строка с названием и приставкой
    $Strit_number_corpus=$arr[0][1];
     
     //получаем название 
    $arr = explode(' ',trim($Strit_name_string));
     $nazvanie=$arr[0];
        echo "Название ";
        echo $nazvanie;echo PHP_EOL;
        PHP_EOL;
        echo "Приставка ";
     $pristavka=$arr[1];echo $pristavka;echo PHP_EOL;
      
      // теперь надо получить корпус
       echo "home ";
       echo $Strit_number_corpus;
         //в начле ищим, есть ли в строке дефис

          $strripos=strripos($Strit_number_corpus,"-"); echo PHP_EOL; echo $strripos;
          $strripos2=strripos($Strit_number_corpus,"/"); echo PHP_EOL;
        if ($strripos!=null or $strripos2!=null) { //проверяем, есть ли раделитель
            if($strripos!=null){ //если разделитель черточка
                $home_number=substr($Strit_number_corpus, 0,$strripos);
                echo $home_number; //дом 
                PHP_EOL;
                $korpus=substr($Strit_number_corpus, $strripos,strlen($Strit_number_corpus)); // корпус
                echo "Корпус ";
                echo $korpus;
            }
        }

       echo " number corpes ";
       echo $Strit_number_corpus;
        // теперь надо проверить, есть ли буквеный корпус
        if(preg_match("/[а-я]/i", $Strit_number_corpus)){
                  //если есть, то берём
                  $char_korp=substr($Strit_number_corpus,strlen($Strit_number_corpus-2) ,strlen($Strit_number_corpus-1)); 
                  echo "korpus ";
                  echo $char_korp;
            }


         PHP_EOL;
       //теперь будем составлять все возможные варианты:
        $rez_array="";echo  PHP_EOL;
        echo "Приставка2 " ;
        echo $pristavka;echo PHP_EOL;
        $rez_array[0]=$nazvanie;    
             echo PHP_EOL;   
       
          PHP_EOL;
        echo $pristavka . $rez_array[0] ." " .$Strit_number_corpus; echo PHP_EOL;
        //изменим букву корпуса
      //  echo $pristavka . $rez_array[0] ." " .strtoupper($Strit_number_corpus, "utf-8"); //echo PHP_EOL;
        echo $pristavka . $rez_array[0] ." " .mb_convert_case($Strit_number_corpus,MB_CASE_UPPER, "utf-8"); //

}




//variant_arr($addresses);
variant($addresses);