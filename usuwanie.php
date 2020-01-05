<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Strona uniwersytetu</title>
  <meta name="description" content="Strona uniwersytetu">
  <meta name="author" content="Mikołaj Jonczyk">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="navbar">
  <ul>
    <li><a class="active" href="index.php">Strona główna</a></li>
    <li><a href="dodaj.php">Dodaj studenta</a></li>
    <li><a href="edycja.php">Edytuj studenta</a></li>
    <li><a href="usuwanie.php">Usuń studenta</a></li>
    <li><a href="grafika.php">Grafika komputerowa</a></li>
    <li><a href="informatyka.php">Informatyka stosowana</a></li>
    <li><a href="zaocznie.php">Studenci zaoczni - 2 rok</a></li>    
  </ul>
  </div>
  <div class="main">
    <h2>Usuń studenta:</h2>
    <form action="usuwanie.php" method="post">
    Podaj indeks studenta:<br />
      <input type="text" name="id" /><br />      
      <input type="submit" value="Usuń" />
    </form>
         <?php
          $conn = mysqli_connect("localhost", "root", "", "students");    
          if($conn === false){
            die("Nie można połączyć!. " . mysqli_connect_error());
        }      

        $id= strval(mysqli_real_escape_string($conn, $_REQUEST['id']));

        $sql = "DELETE FROM student WHERE Id = '$id'";


          if(mysqli_query($conn, $sql)){
            echo "Usunięto studenta.";
           } else{
            echo "Błąd! Nie ma takiego indeksu $sql. " . mysqli_error($conn);    }
            
            mysqli_close($conn);
          ?>
      </table>
  </div>
</body>
</html>