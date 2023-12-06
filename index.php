<?php
require('template/session.php');
require('config/config.php');
require('template/odd.php');
/*echo'<pre>';
print_r($result3);
echo '</pre>';
*/
?>
<!DOCTYPE html>

<?php
include 'template/header.php'; ?>

<body>

<div class="container">
    <div class="header clearfix">
        <?php
        include 'template/head_menu.php'; ?>
        <h3 class="text-muted">Project name
            <form id="selectForm" method="post">
                <select name="selectedName" id="selectedName">
                    <?php
                    while (($result = mysqli_fetch_assoc($sql)) && ($count < 10)): ?>
                        <option value="<?php
                        echo $result['name']; ?>"><?php
                            echo $result['name']; ?></option>
                        <?php
                        $count++; ?>
                    <?php
                    endwhile; ?>
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
        <canvas id="myChart3" width="600" height="400"
                data-prices3="<?php
                echo htmlspecialchars(json_encode(array_column($result3, 'avg_price')), ENT_QUOTES, 'UTF-8'); ?>"
                data-dates3="<?php
                echo htmlspecialchars(json_encode(array_column($result3, 'date_day')), ENT_QUOTES, 'UTF-8'); ?>">

        </canvas>
    </div>
    data-url="update_chart_data.php?name=<?php
    echo urlencode(isset($_POST['selectedName']) ? $_POST['selectedName'] : $selectedName); ?>"
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