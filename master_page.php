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
      /* Добавляем немного отступов и выравнивания для красоты  */
      body {
        margin: 15%;
      }

      .content {
        display: flex;
        margin-top: 10px;
      }
      .days-of-week-container,
      .calendar-container {
        margin-left: 150%;
        display: grid;
        grid-template-columns: repeat(7, 30px);
        text-align: right;
      }

      .calendar-container div:hover {
        background-color: #007bff;
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
    <div class="top-right-text">Выполнен вход как: Мастер</div>
    <a class="top-right-link" href="index.html">Выйти</a>
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <!-- Вкладки с использованием Bootstrap nav-pills -->
          <ul class="nav flex-column nav-pills" id="tabs">
            <li class="nav-item">
              <a
                class="nav-link active"
                id="tab1"
                data-toggle="pill"
                href="#content1"
                onclick="showContent('content1')"
                >Расписание</a
              >
            </li>
          </ul>
        </div>
        <div class="col-md-9">
          <!-- Содержимое с использованием Bootstrap tab-content -->
          <div class="tab-content content">
            <div id="content1" class="tab-pane fade show active">
              <div class="days-of-week-container">
                <div>Пн</div>
                <div>Вт</div>
                <div>Ср</div>
                <div>Чт</div>
                <div>Пт</div>
                <div>Сб</div>
                <div>Вс</div>
              </div>
              <div class="calendar-container">
                <div>1</div>
                <div>2</div>
                <div>3</div>
                <div>4</div>
                <div>5</div>
                <div>6</div>
                <div>7</div>
                <div>8</div>
                <div>9</div>
                <div>10</div>
                <div>11</div>
                <div>12</div>
                <div>13</div>
                <div>14</div>
                <div>15</div>
                <div>16</div>
                <div>17</div>
                <div>18</div>
                <div>19</div>
                <div>20</div>
                <div>21</div>
                <div>22</div>
                <div>23</div>
                <div>24</div>
                <div>25</div>
                <div>26</div>
                <div>27</div>
                <div>28</div>
                <div>29</div>
                <div>30</div>
                <div>31</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Подключаем скрипты Bootstrap и jQuery (необходим для некоторых компонентов Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
      function showContent(contentId) {
        // Активируем выбранную вкладку
        const tab = document.getElementById(
          `tab${contentId.charAt(contentId.length - 1)}`
        );
        const tabs = document.querySelectorAll(".nav-link");
        tabs.forEach((t) => t.classList.remove("active"));
        tab.classList.add("active");

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
