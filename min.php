<?php
session_start();

if (isset($_POST['selectedNamemin'])) {
    $_SESSION['selectedNamemin'] = $_POST['selectedNamemin'];
}
require('config/config.php');
require('template/odd.php');

/*echo'<pre>';
print_r($result3);
echo '</pre>';
*/
?>
<!DOCTYPE html>

<?php include 'template/header.php'; ?>

<body>

<div class="container">
    <div class="header clearfix">
        <?php include 'template/head_menu.php'; ?>
        <h3 class="text-muted">Project name
            <form id="selectForm" method="post">
                <select name="selectedNamemin" id="selectedNamemin"  style="width: 800px;">
                    <?php while ($result = mysqli_fetch_assoc($sql)) : ?>
                        <option value="<?php echo $result['name']; ?>" <?php if ($_SESSION['selectedNamemin'] === $result['name']) echo 'selected'; ?>>
                            <?php echo $result['name'] . ' - ' . $result['category']; ?>

                        </option>
                        <?php $count++; ?>
                    <?php endwhile; ?>
                </select>
                <p>Выберите дату начиная с: <?php echo $start_date; ?></p>
                <button type="submit" name="updateButton">Обновить график</button>
            </form>

        </h3>
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
