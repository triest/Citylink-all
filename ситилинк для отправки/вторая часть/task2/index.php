
<html>
<head>

</head>
<body>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
<?php
//echo phpversion() ;
$servername = "http://127.0.0.1";
$username = "root";
$password = "";
$db="izdanus";

$connection = mysqli_connect('localhost', 'root', '', 'izdanus');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {
 //    echo "Connected successfully";
}
?>
      <b></b>
            <br>
<b>2.Пользователи старше 30 лет, выписывающие жунал "Мурзилка"</b>
<br>
    <?php
if ($result = mysqli_query($connection, "SELECT user.name as 'user_name',user.date as 'date' FROM `relationship` 
	INNER JOIN user ON user.id=user_id INNER JOIN magazin ON magazin.id=magazin_id
	WHERE floor(datediff(curdate(),user.date)/365)>30 AND
magazin.name=\"Мурзилка\"")) {
  ?>


    <table class="table">
    <thead>
    <tr>
        <th scope="col">№</th>
        <th scope="col">Имя пользователя</th>
        <th scope="col">Дата рождения</th>

    </tr>
    </thead>
    <tbody>
    <?php
    $count=0;
    while ($user = $result->fetch_assoc()) {
        $count++
        ?><tr>
        <td>
            <?php
            echo $count;
            ?>
        </td>
        <td>
            <?php
                echo $user["user_name"];
            ?>
        </td>
        <td>
            <?php
            echo $user["date"];
            ?>
        </td>
    </tr>

   <?php }
    ?>

    </tbody>
    </table>
   <?php }
   ?>




<b>3.Случйный пользователь для отображения в блоке "Наш любимые читатель"</b>


<table class="table">
    <thead>
    <tr>
        <th scope="col">№</th>
        <th scope="col">Имя пользователя</th>
        <th scope="col">Дата рождения</th>

    </tr>
    </thead>
    <tbody>

   <?php
   $result = mysqli_query($connection, "SELECT * FROM `user` ORDER BY RAND() LIMIT 1
	");
    $count=0;
   while ($user = $result->fetch_assoc()) {
       $count++
   ?> <tr>
           <td>
               <?php echo $count ?>
           </td>
        <td>
            <?php echo $user["name"]; ?>
            </td>
        <td>
            <?php echo $user["date"]; ?>
            </td>
        </tr>
   <?php
    }
 ?>
    </tbody>
</table>
    </div>
    </div>
</div>
</body>
</html>


