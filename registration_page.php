<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
          border-color: #9c1138;
      }
    </style>
      <title>Регистрация</title>
  </head>
  <body>
  <div class="registration-container">
      <?php
      require_once('registration_process.php');
      if ($registration_successful) { ?>
          <h2 class="text-center mb-4">Регистрация успешно завершена</h2>
          <a href="index.php" class="btn btn-primary btn-block">Вернуться на главную</a>
      <?php } else { ?>
          <h2 class="text-center mb-4">Регистрация</h2>
          <?php if ($login_error) { ?>
              <div class="alert alert-danger" role="alert">
                  Логин уже занят. Пожалуйста, выберите другой логин.
              </div>
          <?php } ?>
          <form method="post">
              <div class="form-group">
                  <label for="name">Имя:</label>
                  <input
                          type="text"
                          class="form-control"
                          id="name"
                          placeholder="Введите имя"
                          name="name"
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
                          name="login"
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
                          name="password"
                          required
                  />
              </div>
              <button type="submit" class="btn btn-primary btn-block">
                  Зарегистрироваться
              </button>
          </form>
      <?php } ?>
  </div>

    <!-- Подключаем скрипты Bootstrap и jQuery (необходим для некоторых компонентов Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>
