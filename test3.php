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

<?php include 'template/header.php'; ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<body>

<div class="container">
    <div class="header clearfix">
        <?php include 'template/head_menu.php'; ?>

        <h3 class="text-muted">Project name


        </h3>



        <table id="example" class="iksweb" data-page-length="50">
            <thead>
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
            </thead>
            <tbody>
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
                    <td class="<?php echo ($row['current_price'] <= $row['min_price']) ? 'min-price' : (($row['current_price'] < $row['avg_price']) ? 'current-price' : ''); ?>"><?php echo $row['current_price']; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
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



</div>
</div>
<footer class="footer">
    <p>© Company 2017</p>
</footer>


<script src="script.js"></script>
</body>
</html>
<script>
    $(document).ready( function () {
        $('#example').DataTable(
            {
                language: {
                    search: 'Найти:',
                    searchPlaceholder: "Ведите для поиска"
                }
            }
        );
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
