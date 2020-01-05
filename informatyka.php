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
      <table>
      <h2>Studenci - Informatyka stosowana (stacjonarnie)</h2>
          <tr>
              <th>Imię</th>
              <th>Nazwisko</th>
              <th>Województwo</th>
              <th>Specjalność</th>
              <th>Semestr</th>
          </tr>
          <?php
          $conn = mysqli_connect("localhost", "root", "", "students");    
          if($conn === false){
            die("Nie można połączyć!. " . mysqli_connect_error());
          }      

          $sql = "SELECT Imie, Nazwisko, Wojewodztwo, Specjalnosc, Semestr FROM student WHERE Specjalnosc = 'Informatyka stosowana' AND Tryb = 'Stacjonarne'";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              echo "<tr><td>" . $row["Imie"] . "</td><td>"
              . $row["Nazwisko"]. "</td><td>" . $row["Wojewodztwo"]. "</td><td>" . $row["Specjalnosc"]. "</td><td>" . $row["Semestr"].  "</td></tr>";
            }
            echo "</table>";
          } 
          else 
          { 
            echo "brak wyników"; 
          }
            
          mysqli_close($conn);

          ?>
      </table>
  </div>
</body>
</html>