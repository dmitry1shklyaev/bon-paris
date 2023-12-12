<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
    <style>
      /* Добавляем немного отступов и выравнивания для красоты*/
      body {
        margin: 15%;
      }

      .content {
        display: flex;
        margin-top: 10px;
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
    </style>

    <div class="top-right-text">Выполнен вход как: Клиент</div>
    <a class="top-right-link" href="index.html">Выйти</a>
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
        <div class="col-md-3">
          <!-- Левое меню -->
          <div class="nav-menu">
            <a href="#" onclick="showCalendar('appointment')">Запись</a>
            <a href="#" onclick="showCalendar('cancelAppointment')"
              >Отмена записи</a
            >
          </div>
        </div>
        <div class="col-md-9">
          <!-- Содержимое -->
          <div id="appointment" class="tab-pane fade show active">
            <h2>Календарь для записи</h2>
            <!-- Ваш код для календаря записи здесь -->
          </div>
          <div id="cancelAppointment" class="tab-pane fade">
            <h2>Календарь для отмены записи</h2>
            <!-- Ваш код для календаря отмены записи здесь -->
          </div>
        </div>
      </div>
    </div>

    <!-- Подключаем скрипты Bootstrap и jQuery (необходим для некоторых компонентов Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
      function showCalendar(calendarId) {
        // Показываем соответствующий календарь
        const calendars = document.querySelectorAll(".tab-pane");
        calendars.forEach((calendar) => {
          calendar.classList.remove("show", "active");
        });

        const selectedCalendar = document.getElementById(calendarId);
        if (selectedCalendar) {
          selectedCalendar.classList.add("show", "active");
        }
      }
    </script>
  </body>
</html>
