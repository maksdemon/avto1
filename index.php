<?php
require('config/config.php');
require('template/odd.php');
echo'<pre>';
print_r($result3);
echo '</pre>';

?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Narrow Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../../css/editor.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script id="chartjs-script" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
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
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </nav>
          <h3 class="text-muted">Project name
              <div class="form-group">
                  <label>Choose an option</label>
                  <select class="form-control">
                      <?php while (($result = mysqli_fetch_assoc($sql)) && ($count < 10)): ?>
                          <option value="<?php echo $result['name']; ?>"><?php echo $result['name']; ?></option>
                          <?php $count++; ?>
                      <?php endwhile; ?>
                  </select>
              </div>
          </h3>
      </div>


      <div class="row marketing">

          <div id="selectedData">
              <!-- Сюда будут добавляться данные выбранного элемента -->
          </div>
          <div class="container">
              <canvas id="myChart" width="600" height="400"></canvas>
          </div>
      </div>
        <div class="container">
            <canvas id="myChart2" width="600" height="400"
                    data-names="<?php echo htmlspecialchars(json_encode(array_column($result2, 'name')), ENT_QUOTES, 'UTF-8'); ?>"
                    data-prices="<?php echo htmlspecialchars(json_encode(array_column($result2, 'price')), ENT_QUOTES, 'UTF-8'); ?>"></canvas>
        </div>
        <div class="container">
            <canvas id="myChart3" width="600" height="400"
                    data-prices3="<?php echo htmlspecialchars(json_encode(array_column($result3, 'price')), ENT_QUOTES, 'UTF-8'); ?>"
                    data-dates3="<?php echo htmlspecialchars(json_encode(array_column($result3, 'date')), ENT_QUOTES, 'UTF-8'); ?>"></canvas>
        </div>
    </div>
      <footer class="footer">
        <p>© Company 2017</p>
      </footer>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
        <script src="script.js"></script>
  </body>
</html>