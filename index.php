<?php
require('config/config.php');
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

      </div>

      <footer class="footer">
        <p>© Company 2017</p>
      </footer>

    <div data-component-chartjs="" class="chartjs" data-chart="{&quot;type&quot;:&quot;line&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Red&quot;,&quot;Blue&quot;,&quot;Yellow&quot;,&quot;Green&quot;,&quot;Purple&quot;,&quot;Orange&quot;],&quot;datasets&quot;:[{&quot;data&quot;:[12,19,3,5,2,3],&quot;fill&quot;:false,&quot;borderColor&quot;:&quot;rgba(255, 99, 132, 0.2)&quot;},{&quot;fill&quot;:false,&quot;data&quot;:[3,15,7,4,19,12],&quot;borderColor&quot;:&quot;rgba(54, 162, 235, 0.2)&quot;}]}}" style="min-height:240px;min-width:240px;width:100%;height:100%;position:relative">			  <canvas width="706" height="353" style="display: block; width: 706px; height: 353px;" class="chartjs-render-monitor"></canvas>			</div><div class="form-group" style=""><label>Choose an option </label></div></div> <!-- /container -->


<script id="chartjs-script" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script><script>				$(document).ready(function() {					$(".chartjs").each(function () {						ctx = $("canvas", this).get(0).getContext("2d");						config = JSON.parse(this.dataset.chart);						chartjs = new Chart(ctx, config);					});				});

  </body>
</html>