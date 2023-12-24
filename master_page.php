<?php
session_start();
if (isset($_SESSION['username'])) {
    $temp_login = $_SESSION['username'];
} else {
    // Если ключа нет, устанавливаем значение по умолчанию (можете выбрать любое значение)
    $temp_login = "Гость";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Подключаем стили Bootstrap -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
    <style>
      /* Добавляем немного отступов и выравнивания для красоты */
      body {
        margin: 15%;
      }

      .content {
        display: flex;
        margin-top: 10px;

      }
      #tab1 {
          background-color: #eb3467;
          border-color: #eb3467;
      }

      .days-of-week-container,
      .calendar-container {
        margin-left: 150%;
        display: grid;
        grid-template-columns: repeat(7, 30px);
        text-align: right;
      }

      .calendar-container div:hover {
          background-color: #eb3467;
          border-color: #eb3467;
        border-radius: 30%;
        text-align: center;
        color: #fff;
        cursor: pointer;
      }
      .top-right-text {
        position: fixed;
        top: 10px;
        right: 10px;
        color: #333; /* Цвет текста */
        font-size: 16px; /* Размер шрифта */
      }
      .top-right-link {
        position: fixed;
        top: 40px;
        right: 10px;
        color: #333; /* Цвет текста */
        font-size: 16px; /* Размер шрифта */
      }
    </style>
    <title>Страница мастера</title>
    <link
      rel="apple-touch-icon"
      sizes="180x180"
      href="favicon/apple-touch-icon.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="favicon/favicon-32x32.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="favicon/favicon-16x16.png"
    />
  </head>
  <body>
  <div class="top-right-text">Выполнен вход как: <?php echo $temp_login?></div>
    <a class="top-right-link" href="index.php">Выйти</a>
  <h3 class="d-flex justify-content-center">Расписание записей для мастера <?php echo $temp_login ?></h3><br>
    <div class="table table-striped d-flex justify-content-center">
        <?php
        // Подключение к базе данных
        $servername = "localhost";
        $username = "root";
        $password = "mysql";
        $dbname = "saloon";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Проверка соединения
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Получение данных из базы данных
        $sql = "SELECT client_login, date, service FROM schedule WHERE master_login = '$temp_login'";
        $result = $conn->query($sql);

        // Вывод данных в таблицу
        echo "<table class='col-md-5 border table-bordered'>
        <tr>
            <th>Клиент</th>
            <th>Время записи</th>
            <th>Услуга</th>
        </tr>";

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>" . $row["client_login"] . "</td>
                <td>" . $row["date"] . "</td>
                <td>" . $row["service"] . "</td>
            </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Нет данных</td></tr>";
        }

        echo "</table>";

        // Закрытие соединения с базой данных
        $conn->close();
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  </body>
</html>
