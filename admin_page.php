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
        /* Добавляем немного оступов и выравнивания для красоты */
        body {
            margin: 15%;
        }

        .content {
            display: flex;
            margin-top: 10px;
        }

        .table-row{
            margin-left: 300px;
            margin-top: -200px;
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
            color: #007bff; /* Изменяем цвет текста при наведении */
        }
        .tab-pane {
            display: none;
        }

        .table-bordered{
            text-align: center;
        }
        .tab-pane.show {
            display: block;
        }
        .admin-content {
            width: 50%;
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
    <title>Страница администратора</title>
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
<div class="top-right-text">Выполнен вход как: Администратор</div>
<a class="top-right-link" href="index.php">Выйти</a>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <!-- Левое меню -->
            <div class="nav-menu float-left">
                <a href="#" onclick="showContent('registration')"
                >Регистрация мастера</a
                >
                <a href="#" onclick="showContent('clientDatabase')"
                >Просмотр базы данных клиентов</a
                >
                <a href="#" onclick="showContent('schedule')"
                >Просмотр графика работы мастеров</a
                >
            </div>
        </div>
        <div class="col-md-9 admin-content">
            <!-- Содержимое -->
            <div id="registration" class="tab-pane fade show active">
                <!-- Форма для регистрации мастера -->
                <h2>Регистрация мастера в базе данных</h2>
                <form id="registrationForm" action="/master_add.php" method="post">
                    <div class="form-group">
                        <label for="masterLogin">Логин:</label>
                        <input
                                type="text"
                                class="form-control"
                                id="masterLogin"
                                name="masterLogin"
                                placeholder="Введите логин"
                        />
                    </div>
                    <div class="form-group">
                        <label for="masterPassword">Пароль:</label>
                        <input
                                type="password"
                                class="form-control"
                                id="masterPassword"
                                name="masterPassword"
                                placeholder="Введите пароль"
                        />
                    </div>
                    <div class="form-group form-check">
                        <input
                                type="checkbox"
                                class="form-check-input"
                                id="topMasterCheckbox"
                                name="topMasterCheckbox"
                        />
                        <label class="form-check-label" for="topMasterCheckbox">Является ли мастер ТОП-мастером?</label>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Зарегистрировать
                    </button>
                </form>
            </div>
        </div>
            <div id="clientDatabase" class="tab-pane fade table-row">
                <!-- Таблица для просмотра базы данных клиентов -->
                <h2>Просмотр базы данных клиентов</h2>
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Имя</th>
                        <th>Телефон</th>
                        <th>Пароль</th>
                        <!-- Добавьте другие поля по необходимости -->
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    // Подключение к базе данных
                    $mysqli = new mysqli("localhost", "root", "mysql", "saloon");

                    // Проверка соединения
                    if ($mysqli->connect_error) {
                        die("Connection failed: " . $mysqli->connect_error);
                    }

                    // Запрос к базе данных
                    $result = $mysqli->query("SELECT id, name, login, password FROM users WHERE id_role = 2");
                    // Вывод данных в таблицу
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['login'] . "</td>";
                        echo "<td>" . $row['password'] . "</td>";
                        echo "</tr>";
                    }

                    // Закрытие соединения
                    $mysqli->close();
                    ?>
                    </tbody>
                </table>
            </div>

            <div id="schedule" class="tab-pane fade table-row">
                <!-- Таблица для просмотра графика работы мастеров -->
                <h2>Просмотр графика работы мастеров</h2>
                    <?php
                    // Подключение к базе данных
                    $mysqli = new mysqli("localhost", "root", "mysql", "saloon");

                    // Проверка соединения
                    if ($mysqli->connect_error) {
                        die("Connection failed: " . $mysqli->connect_error);
                    }

                    // Подготовка запроса
                    $sql = "SELECT id, login, isTop FROM users WHERE id_role = 1";
                    $result = $mysqli->query($sql);

                    if ($result) {
                        // Вывод заголовков таблицы
                        echo "<table class='table table-striped table-bordered'>
            <thead>
                <tr>
                    <th>ID мастера</th>
                    <th>Логин мастера</th>
                    <th>График работы</th>
                </tr>
            </thead>
            <tbody>";

                        // Обработка данных и вывод строк таблицы
                        while ($row = $result->fetch_assoc()) {
                            $id = $row['id'];
                            $login = $row['login'];
                            $isTop = $row['isTop'];

                            // Определение графика работы в зависимости от четности id
                            $workingHours = ($id % 2 == 1) ? "8:00 - 14:00" : "14:00 - 20:00";

                            // Вывод строки таблицы
                            echo "<tr>
                <td>$id</td>
                <td>$login</td>
                <td>$workingHours</td>
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
        </div>
    </div>
</div>

<!-- Подключаем скрипты Bootstrap и jQuery (необходим для некоторых компонентов Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
    function showContent(contentId) {
        // Показываем соответствующее содержимое
        const contents = document.querySelectorAll(".tab-pane");
        contents.forEach((content) => {
            content.classList.remove("show", "active");
        });

        const selectedContent = document.getElementById(contentId);
        if (selectedContent) {
            selectedContent.classList.add("show", "active");
        }
    }
</script>
</body>
</html>
