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
  <h2>Edytuj studenta:</h2>  

  <form action="edycja.php" method="post">
      Numer albumu:
      <input type="text" name="nr" /><br />
      Imię:
      <input type="text" name="imie" /><br />
      Nazwisko:
      <input type="text" name="nazwisko"/><br />
      Województwo:
      <input type="text" name="wojewodztwo"/><br />
      Kierunek studiów:
      <select name="kierunek" >
          <option>Informatyka</option>
          <option>Matematyka</option>
          <option>Prawo</option>
          <option>Informatyka 2</option>
          <option>Fizyka</option>
      </select><br />
      Semestr:
      <select name="semestr" >
          <option>I</option>
          <option>II</option>
          <option>III</option>
          <option>IV</option>
          <option>V</option>
          <option>VI</option>
      </select><br />
      Tryb studiów:
      <select name="tryb" >
          <option>Stacjonarne</option>
          <option>Niestacjonarne</option>
      </select><br />
      Miejscowość:
      <input type="text" name="miejscowosc"/><br />
      Specjalność:
      <select name="specjalnosc" >
          <option>Grafika komputerowa</option>
          <option>Informatyka stosowana</option>
          <option>Informatyka w przemyśle</option>
          <option>Fizyka jądrowa</option>
          <option>Bazy danych</option>
          <option>Testy</option>
      </select><br />
      Rok studiów:
      <select name="rok" >
          <option>I</option>
          <option>II</option>
          <option>III</option>
          <option>IV</option>
          <option>V</option>
      </select><br />
      <input type="submit" value="Edytuj" />
      </form>
      <?php
      $conn = mysqli_connect("localhost", "root", "", "students");   
      if($conn === false){
        die("Nie można połączyć!. " . mysqli_connect_error());
    }       
   
   $nr = strval(mysqli_real_escape_string($conn, $_REQUEST['nr']));
   $imie = mysqli_real_escape_string($conn, $_REQUEST['imie']);
   $naz = mysqli_real_escape_string($conn, $_REQUEST['nazwisko']);
   $woj = mysqli_real_escape_string($conn, $_REQUEST['wojewodztwo']);
   $kier = mysqli_real_escape_string($conn, $_REQUEST['kierunek']);
   $sem = mysqli_real_escape_string($conn, $_REQUEST['semestr']);
   $tryb = mysqli_real_escape_string($conn, $_REQUEST['tryb']);
   $miej = mysqli_real_escape_string($conn, $_REQUEST['miejscowosc']);
   $spec = mysqli_real_escape_string($conn, $_REQUEST['specjalnosc']);
   $rok = mysqli_real_escape_string($conn, $_REQUEST['rok']);

   
   $sql = "UPDATE student SET Imie = '$imie', Nazwisko = '$naz', Wojewodztwo = '$woj', Kierunek = '$kier', Semestr = '$sem', 
   Tryb = '$tryb', Miejscowosc = '$miej', Specjalnosc = '$spec', Rok = '$rok' WHERE Id = '$nr'";

   if(mysqli_query($conn, $sql))
   {
    echo "Edytowano studenta.";
   } 
   else
   {
    echo "Błąd! Nie znaleziono studenta o takim indeksie $sql. " . mysqli_error($conn);   
   }     
    mysqli_close($conn);
          ?>
      </table>
  </div>

</body>
</html>