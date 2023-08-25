<?php
$mysqli = new mysqli('62.109.2.72', 'avtoparser', '7xXD2rN9i', 'avto1');

$sqloll = "SELECT * from avto1 LIMIT 5";
$resultStartDate = mysqli_query($mysqli, $sqloll);
$rowStartDate = mysqli_fetch_all($resultStartDate, MYSQLI_ASSOC);

echo'<pre>';
var_dump($rowStartDate);
echo '</pre>';

$start_date = $rowStartDate['start_date'];


if ($mysqli->connect_error) {
    echo 'Failed to connect to MySQL: ' . $mysqli->connect_error;
} else {
    echo 'Connection established';
}

?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
    <link rel="stylesheet" href="style.css">
    <title>Narrow Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../../css/editor.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Custom styles for this template -->
    <link href="narrow-jumbotron.css" rel="stylesheet">
  <script src="chrome-extension://bnfdmghkeppfadphbnkjcicejfepnbfe/spFormElementPrototypeEx.js" id="spHTMLFormElementPrototypeScript"></script></head>

  <body>

    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills float-right">
            <li class="nav-item">
              <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="\pie.php">pie</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="\min.php">min</a>
            </li>
          </ul>
        </nav>
          <h3 class="text-muted">Project name


          </h3>
      </div>


        <?php
        echo '<table  class="iksweb">';
        foreach ($rowStartDate as $user) {
            echo '<tr>';

            echo "<td>{$user['name']}</td>";
            echo "<td>{$user['price']} price</td>";
            echo "<td>{$user['category']} category</td>";

            echo '</tr>';
        }
        echo '</table>';
        ?>

      <div class="row marketing">

          <div id="selectedData">
              <!-- Сюда будут добавляться данные выбранного элемента -->
          </div>

      </div>
        <div class="container">
            <canvas id="myChart3" width="600" height="400"
                    data-prices3="<?php echo htmlspecialchars(json_encode(array_column($result3, 'avg_price')), ENT_QUOTES, 'UTF-8'); ?>"
                    data-dates3="<?php echo htmlspecialchars(json_encode(array_column($result3, 'date_day')), ENT_QUOTES, 'UTF-8'); ?>">

            </canvas>
        </div>
        data-url="update_chart_data.php?name=<?php echo urlencode(isset($_POST['selectedName']) ? $_POST['selectedName'] : $selectedName); ?>"
        <div class="container">

        </div>
    </div>
      <footer class="footer">
        <p>© Company 2017</p>
      </footer>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>

    <script src="script.js"></script>
  </body>
</html>