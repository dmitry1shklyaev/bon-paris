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
      body {
        background-color: #f8f9fa;
        padding: 5%;
      }

      .registration-container {
        max-width: 400px;
        margin: auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      .form-group {
        margin-bottom: 20px;
      }
      .btn-primary {
        background-color: #eb3467;
        border-color: #eb3467;
      }
      .btn-primary:hover {
        background-color: #9c1138;
      }
    </style>
    <title>Регистрация</title>
  </head>
  <body>
    <div class="registration-container">
      <h2 class="text-center mb-4">Регистрация</h2>
      <form>
        <div class="form-group">
          <label for="login">Имя:</label>
          <input
            type="text"
            class="form-control"
            id="login"
            placeholder="Введите имя"
            required
          />
        </div>
        <div class="form-group">
          <label for="login">Номер телефона:</label>
          <input
            type="text"
            class="form-control"
            id="login"
            placeholder="Введите номер телефона (логин)"
            required
          />
        </div>
        <div class="form-group">
          <label for="password">Пароль:</label>
          <input
            type="password"
            class="form-control"
            id="password"
            placeholder="Введите пароль"
            required
          />
        </div>
        <button type="submit" class="btn btn-primary btn-block">
          Зарегистрироваться
        </button>
      </form>
    </div>

    <!-- Подключаем скрипты Bootstrap и jQuery (необходим для некоторых компонентов Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>
