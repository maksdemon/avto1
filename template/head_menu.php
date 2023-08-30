        <nav>
          <ul class="nav nav-pills float-right">
            <li class="nav-item">
              <a class="nav-link <?php if ($_SERVER['REQUEST_URI'] === '/') echo "active"; ?>" href="\">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if ($_SERVER['REQUEST_URI'] === '/pie.php') echo "active"; ?>" href="\pie.php">pie</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if ($_SERVER['REQUEST_URI'] === '/min.php') echo "active"; ?> " href="\min.php" >min</a>
            </li>
              <li class="nav-item">
                  <a class="nav-link <?php if ($_SERVER['REQUEST_URI'] === '/add.php') echo "active"; ?>" href="\add.php">add</a>
              </li>
              <li class="nav-item">
                  <span class="<?php echo ($isLessThan10Hours) ? 'green-circle' : 'red-circle'; ?>"></span>
                  <?php echo $rowlastdate[0]; ?> <!-- Вывод значения рядом с кругом -->
                  <br><br>
              </li>
          </ul>
        </nav>

