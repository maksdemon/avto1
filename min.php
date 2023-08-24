<?php
require('config/config.php');
require('template/odd.php');
/*echo'<pre>';
print_r($result3);
echo '</pre>';
*/
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
            <form id="selectForm" method="post">
                <select name="selectedNamemin" id="selectedNamemin">
                    <?php while (($result = mysqli_fetch_assoc($sql)) && ($count < 10)): ?>
                        <option value="<?php echo $result['name']; ?>"><?php echo $result['name']; ?></option>
                        <?php $count++; ?>
                    <?php endwhile; ?>
                </select>
                <button type="submit" name="updateButton">Обновить график</button>
            </form>

        </h3>
    </div>


    <div class="row marketing">

        <div id="selectedData">
            <!-- Сюда будут добавляться данные выбранного элемента -->
        </div>

    </div>
    <div class="container">
        <canvas id="myChart4" width="600" height="400"
                data-min-prices="<?php echo htmlspecialchars(json_encode(array_column($result4, 'min_price')), ENT_QUOTES, 'UTF-8'); ?>"
                data-start-dates="<?php echo htmlspecialchars(json_encode(array_column($result4, 'start_date')), ENT_QUOTES, 'UTF-8'); ?>">
        </canvas>
    </div>
    data-url="update_chart_data.php?name=<?php echo urlencode(isset($_POST['selectedNamemin']) ? $_POST['selectedNamemin'] : $selectedNamemin); ?>"

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
