<?php
session_start();
if (isset($_SESSION['username'])) {
    $temp_login = $_SESSION['username'];
} else {
    $temp_login = "Гость";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
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
    <style>
        /* Добавляем немного отступов и выравнивания для красоты */
        body {
            margin: 10%;
        }

        .content {
            display: flex;
            margin-top: 10px;
        }
        .appointments {
            margin-left: 0; /* Изменено значение отрицательного margin-left */
            margin-top: 0; /* Изменено значение отрицательного margin-top */
        }
        .nav-menu {
            width: 100%;
            background-color: #f8f9fa; /* Цвет фона */
            padding: 25px;
            border-radius: 10px;
            position: sticky; /* Добавляем position: sticky */
            top: 10px; /* Располагаем меню немного выше */
        }

        .nav-menu a {
            display: block;
            margin-bottom: 10px;
            text-decoration: none;
            color: #333; /* Цвет текста */
            font-size: 16px; /* Размер шрифта */
        }

        .nav-menu a:hover {
            color: #eb3467; /* Изменяем цвет текста при наведении */
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

        .service-selection {
            margin-bottom: 20px;
        }

        .tab-pane {
            display: none;
        }

        .tab-pane.show {
            display: block;
        }

        .content {
            display: flex;
            margin-top: 10px;
        }

        .table {
            margin-left: 5%;
            margin-top: 0; /* Изменено значение отрицательного margin-top */
        }

    </style>

    <div class="top-right-text">Выполнен вход как: <?php echo $temp_login; ?></div>
    <a class="top-right-link" href="index.php">Выйти</a>
    <title>Страница клиента</title>
</head>
<body>
<div class="container">
    <div class="service-selection">
        <label for="serviceSelect">Выберите услугу:</label>
        <select class="form-control" id="serviceSelect">
            <option>Маникюр</option>
            <option>Макияж</option>
            <option>Парикмахерская</option>
            <option>Депиляция</option>
        </select>
    </div>

    <div class="row">
        <div class="col-md-2.5">
            <div class="nav-menu">
                <a href="#content1" class="nav-link" onclick="showContent('content1')">Запись</a>
                <a href="#myAppointments" class="nav-link" onclick="showContent('myAppointments')">Мои записи</a>
            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center table">
    <div class="col-md-6" id="content1">
        <br><br><br>
        <?php
        // Подключение к базе данных
        $mysqli = new mysqli("localhost", "root",   "mysql", "saloon");

        // Проверка соединения
        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        // Подготовка запроса
        $sql = "SELECT id, login, isTop FROM users WHERE id_role = 1";
        $result = $mysqli->query($sql);

        if ($result) {
            // Вывод заголовков таблицы
            echo "<table class='table table-striped table-bordered' id='scheduleTable'>
        <thead>
            <tr>
                <th>ID мастера</th>
                <th>Логин мастера</th>
                <th>График работы</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>";

            // Обработка данных и вывод строк таблицы
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $login = $row['login'];
                $isTop = $row['isTop'];
                $workingHours = ($id % 2 == 1) ? "8:00 - 14:00" : "14:00 - 20:00";

                // Вывод строки таблицы с добавлением вызова функции scheduleAppointment с параметрами
                echo "<tr>
        <td class='master-id'>$id</td>
        <td class='master-login'>$login</td>
        <td class='working-hours'>$workingHours</td>
        <td><button class='rounded-pill' style='background-color: #eb3467; border-color: #eb3467' onclick='scheduleAppointment($id, \"$login\", \"$workingHours\",\"$temp_login\")'>Записаться</button></td>
    </tr>";
            }

            // Закрытие таблицы
            echo "</tbody></table>";

            // Освобождение результата
            $result->free();
        } else {
            // Обработка ошибки запроса
            echo "Ошибка при выполнении запроса: " . $mysqli->error;
        }

        // Закрытие соединения
        $mysqli->close();
        ?>
    </div>

    <div class="col-md-6 tab-pane appointments" id="myAppointments">
        <br><br><br>
        <?php
        // Подключение к базе данных
        $mysqli = new mysqli("localhost", "root", "mysql", "saloon");

        // Проверка соединения
        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        // Подготовка запроса для получения записей пользователя
        $myAppointmentsQuery = "SELECT date, service FROM schedule WHERE client_login = '$temp_login'";
        $myAppointmentsResult = $mysqli->query($myAppointmentsQuery);

        if ($myAppointmentsResult) {
            // Вывод заголовков таблицы
            echo "<table class='table table-striped table-bordered' id='myAppointmentsTable'>
                <thead>
                    <tr>
                        <th>Время записи</th>
                        <th>Услуга</th>
                        <th>Действие</th>
                    </tr>
                </thead>
                <tbody>";

            // Обработка данных и вывод строк таблицы
            while ($appointmentRow = $myAppointmentsResult->fetch_assoc()) {
                $appointmentTime = $appointmentRow['date'];
                $appointmentService = $appointmentRow['service'];

                // Вывод строки таблицы
                echo "<tr>
                        <td>$appointmentTime</td>
                        <td>$appointmentService</td>
                        <td><button class='rounded-pill' style='background-color: #eb3467; border-color: #eb3467' onclick='cancelAppointment()'>Отменить запись</button></td>
                    </tr>";
            }

            // Закрытие таблицы
            echo "</tbody></table>";

            // Освобождение результата
            $myAppointmentsResult->free();
        } else {
            // Обработка ошибки запроса
            echo "Ошибка при выполнении запроса: " . $mysqli->error;
        }

        // Закрытие соединения
        $mysqli->close();
        ?>
    </div>
</div>

<!-- Подключаем скрипты Bootstrap и jQuery (необходим для некоторых компонентов Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    function showContent(contentId) {
        const tabs = document.querySelectorAll(".nav-link");
        tabs.forEach((t) => t.classList.remove("active"));

        const tab = document.querySelector(`[href="#${contentId}"]`);
        if (tab) {
            tab.classList.add("active");
        }

        const contents = document.querySelectorAll(".tab-pane");
        contents.forEach((content) => {
            content.classList.remove("show", "active");
        });

        const selectedContent = document.getElementById(contentId);
        if (selectedContent) {
            selectedContent.classList.add("show", "active");

            // Дополнительная логика для управления отображением таблиц
            if (contentId === "content1") {
                document.getElementById("myAppointmentsTable").classList.remove("show", "active");
                document.getElementById("scheduleTable").classList.add("show", "active");
            } else if (contentId === "myAppointments") {
                document.getElementById("scheduleTable").classList.remove("show", "active");
                document.getElementById("myAppointmentsTable").classList.add("show", "active");
            }
        }
    }

    function scheduleAppointment(masterId, masterLogin, workingHours, clientLogin) {
        // Получаем дополнительные данные
        var service = $("#serviceSelect").val();

        // Отправляем данные на сервер
        $.ajax({
            type: 'POST',
            url: 'process_schedule.php',
            data: {
                masterId: masterId,
                masterLogin: masterLogin,
                date: workingHours,
                service: service,
                clientLogin: clientLogin
            },
            success: function (response) {
                // Выводим сообщение об успешной записи (или обработку ошибки)
                alert(response);
            }
        });
    }
        function cancelAppointment() {
        alert("Запись отменена");
    }
</script>

</body>
</html>