<?php
require('config/config.php');
require('template/odd.php');

if (isset($_POST['selectedNamemin'])) {
    $_SESSION['selectedNamemin'] = $_POST['selectedNamemin'];
}
/*echo'<pre>';
print_r($result3);
echo '</pre>';
*/
//для даты min and max and avg
$sqlStartDate = "

SELECT
    t.name,
    t.category,
    t.min_price,
    (SELECT date FROM avto1 WHERE name = t.name AND price = t.min_price LIMIT 1) AS min_date,
    t.max_price,
    (SELECT date FROM avto1 WHERE name = t.name AND price = t.max_price LIMIT 1) AS max_date,
    t.avg_price,
    (SELECT price FROM avto1 WHERE name = t.name ORDER BY date DESC LIMIT 1 OFFSET 1) AS prev_price,
    (SELECT price FROM avto1 WHERE name = t.name ORDER BY date DESC LIMIT 1) AS current_price
FROM (
    SELECT
        name,
        category,
        MIN(price) AS min_price,
        MAX(price) AS max_price,
        AVG(price) AS avg_price
    FROM avto1
    GROUP BY name, category
) AS t
ORDER BY ABS(current_price - min_price);

";
$resultStartDate = mysqli_query($mysqli, $sqlStartDate);
$rowsStartDate = mysqli_fetch_all($resultStartDate, MYSQLI_ASSOC);

$columnNames = array_keys($rowsStartDate[0]);
/*
echo'<pre>';
print_r($columnNames);
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
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </nav>

        <h3 class="text-muted">Project name


        </h3>



        <table class="iksweb">
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Min Price</th>
                <th>Min Date</th>
                <th>Max Price</th>
                <th>Max Date</th>
                <th>Avg Price</th>
                <th>Prev Price</th>
                <th>Current Price</th>
            </tr>
            <?php foreach ($rowsStartDate as $row): ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td><?php echo $row['min_price']; ?></td>
                    <td><?php echo $row['min_date']; ?></td>
                    <td><?php echo $row['max_price']; ?></td>
                    <td><?php echo $row['max_date']; ?></td>
                    <td><?php echo $row['avg_price']; ?></td>
                    <td class="<?php echo ($row['current_price'] < $row['prev_price']) ? 'less-than-prev' : ''; ?>"><?php echo $row['prev_price']; ?></td>
                    <td class="<?php echo ($row['current_price'] < $row['avg_price']) ? 'current-price' : ''; ?>"><?php echo $row['current_price']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>







        <div class="date-picker">
            <label for="start-date">Начальная дата:</label>
            <input type="date" id="start-date" name="start-date">

            <label for="end-date">Конечная дата:</label>
            <input type="date" id="end-date" name="end-date">

            <button id="apply-date-range">Применить</button>
        </div>
    </div>


    <div class="row marketing">

        <div id="selectedData">
            <!-- Сюда будут добавляться данные выбранного элемента -->
        </div>

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
