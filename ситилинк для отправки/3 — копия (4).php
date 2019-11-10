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
 *  	'Ленина ул. 14а',1 +
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



function zapusk($arr){
      foreach ($arr as $key) {
         variant($key);
      }
}


/**
 * @param $arr
 */
function variant($arr){
    setlocale(LC_ALL, "ru_RU.CP1251");
  //  print_r($arr);
   print_r($arr);
    $Strit_name_string=$arr[0]; // строка с названием и приставкой
 //  echo "строка с названием и приставкой";
  //   echo $Strit_name_string;
 //   $Strit_number_corpus=$arr[1];
    
 //   die();
    $Strit_name_string_array=explode(' ', $Strit_name_string); 

     echo "массив";
    // print_r($Strit_name_string_array);
    // print_r($Strit_name_string_array);
    //получаем название
    $arr = explode(' ',trim($Strit_name_string));
   // print_r($arr);
   
   
    // теперь надо получить корпус
      //в начле ищим, есть ли в строке дефис
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
   $home_number="";
   $char_korp="";
    // теперь надо проверить, есть ли буквеный корпус
    if(preg_match("/[а-я]/i", $Strit_number_corpus)){

        //если есть, то берём
        $char_korp=substr($Strit_number_corpus,strlen($Strit_number_corpus-2) ,strlen($Strit_number_corpus-1));
    
  
        $home_number = preg_replace('~[^0-9]+~','',$Strit_number_corpus);
      
    }

      //***********************
      //'Ленина ул. 14а',1 +
     //****************************
  
      $temp=$Strit_name_string_array[0]." ".$Strit_name_string_array[1]."".$home_number."".$char_korp;
 
      $rez_array=[];
      array_push($rez_array, $temp);

      //***********************
      //'Ленина ул. 14А',1 +
     //****************************
 
     $temp=$Strit_name_string_array[0]." ".$Strit_name_string_array[1]."".$home_number."".up($char_korp);
       array_push($rez_array, $temp);

          //**************
      //	'Ленина улица 14а',3 +
       //**************
  			
  			  			   $temp=$Strit_name_string_array[0]." ".$pristavka_full.$home_number."".$char_korp;
  			  			
  			   		  array_push($rez_array, $temp);

//**********
//  'Ленина улица 14А',4 +
//****************  			   		  
           	if($Strit_name_string_array[1]=="ул."){
  			  			   $temp=$Strit_name_string_array[0].$pristavka_full.$home_number."".up($char_korp);		
  			   		  array_push($rez_array, $temp);
  			   		  	}
//**********
// 'ул. Ленина 14а',
//*********  			   		  
   $temp=$Strit_name_string_array[1]."".$Strit_name_string_array[0]." ".$home_number."".$char_korp;
       array_push($rez_array, $temp);

  //'ул. Ленина 14А'
  $temp=$Strit_name_string_array[1]."".$Strit_name_string_array[0]." ".$home_number."".up($char_korp);
       array_push($rez_array, $temp);

  				// 'Ленина улица 14-а',3 +
  			  			   $temp=$pristavka_full." ".$Strit_name_string_array[0]."".$home_number."-".$char_korp;
  			  			
  			   		  array_push($rez_array, $temp);
  			
  				// 'Ленина улица 14-A',3 +
  			  			   $temp=$pristavka_full." ".$Strit_name_string_array[0]."".$home_number."-".up($char_korp);
  			  			
  			   		  array_push($rez_array, $temp);
  			  	
              
           // 'Ленина ул. 14-а',9
  			   		  $temp=$Strit_name_string_array[0]." ".$pristavka_cut." " .$home_number."-".$char_korp;
  			  			
  			   		  array_push($rez_array, $temp);  	

    // 'Ленина ул. 14-А',9
  			   		  $temp=$Strit_name_string_array[0].$pristavka_cut." ".$home_number."-".up($char_korp);
  			  			
  			   		  array_push($rez_array, $temp);  	

      //
            //'Ленина ул. 14-а',9
  			   		  $temp=$Strit_name_string_array[0]." ".$pristavka_full." ".$home_number."-".$char_korp;
  			  			
  			   		  array_push($rez_array, $temp);  	

    // 'Ленина ул. 14-А'-11,
  			   		  $temp=$Strit_name_string_array[0]." ".$pristavka_full ." ".$home_number."-".up($char_korp);
  			  			
  			   		  array_push($rez_array, $temp);  	
    //  'ул. Ленина 14-а',13
  			   	  $temp=$pristavka_cut."".$Strit_name_string_array[0]." ".$home_number."-".$char_korp;
  			  			
  			   		  array_push($rez_array, $temp);  		  
			//  
			 //  'ул. Ленина 14-А',14
  			   	  $temp=$pristavka_cut."".$Strit_name_string_array[0]." ".$home_number."-".up($char_korp);
  			  			
  			   		  array_push($rez_array, $temp);  		  
			//    
  			   	  $temp=$pristavka_full."".$Strit_name_string_array[0]." ".$home_number."-".$char_korp;
  			  			
  			   		  array_push($rez_array, $temp);  	  

  			   		  	   	  $temp=$pristavka_full."".$Strit_name_string_array[0]." ".$home_number."-".up($char_korp);
  			  		

  			   		  array_push($rez_array, $temp);  		
	  $temp=$Strit_name_string_array[0]."".$pristavka_cut."".$home_number."/".$char_korp;
	 array_push($rez_array, $temp);  
	    $temp=$Strit_name_string_array[0]."".$pristavka_cut."".$home_number."/".up($char_korp);
 	array_push($rez_array, $temp);  
   $temp=$Strit_name_string_array[0]." ".$pristavka_full."".$home_number."/".$char_korp;
    	array_push($rez_array, $temp);  
    $temp=$Strit_name_string_array[0]." ".$pristavka_full."".$home_number."/".up($char_korp);
    	array_push($rez_array, $temp);  
    	    $temp=$pristavka_cut.$Strit_name_string_array[0]." ".$home_number."/".$char_korp;
 		array_push($rez_array, $temp);  
               $temp=$pristavka_cut.$Strit_name_string_array[0]." ".$home_number."/".up($char_korp);
 		array_push($rez_array, $temp);  
 		    $temp=$pristavka_full."".$Strit_name_string_array[0]." ".$home_number."/".$char_korp;
 		array_push($rez_array, $temp);  
               $temp=$pristavka_full."".$Strit_name_string_array[0]." ".$home_number."/".up($char_korp);
 		array_push($rez_array, $temp);  
      print_r($rez_array);
echo PHP_EOL;
      

}


//функция перевода в верхний регистр
function up($str){
	$temp=strripos ("абвгдеёжзийклмнопрстуфхцчшщъыьэюя",$str);
	$alf="AБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ";
    $temp2=substr($alf, $temp/2,1);
	return $temp2;

}

function strcmptest($arr,$str){
   $temp=strcasecmp("пер.","пер.");
 
   echo $temp;
}

//strcmptest($addresses,"пер.");

foreach ($addresses as $key => $value) {
  variant($value);
}
//variant($addresses);
//zapusk($addresses);