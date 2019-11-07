<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        th,tr,td{
            border:solid black;
        }
    </style>
</head>
<body>
    <?php 
         echo " <table> <thead> <th> </th>";
                 for ($i=0;$i<=12;$i++){
                 echo "<th>".$i."</th>";
                  }
         echo " </thead> <tbody> ";
                  for($a=1;$a<=10;$a++){
                      echo "<tr> <td>".$a;
                      for($b=0;$b<=12;$b++){
                          echo "<td>".$a*$b."</td>";
                      }
                     echo "</tr>";
                  }
         echo " </tbody> </table>"    
    ?>
</body>
</html>
