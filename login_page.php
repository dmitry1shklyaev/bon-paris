<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Вход</title>
    <link href="/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/loginpage_style.css" />
</head>
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
<link rel="manifest" href="favicon/site.webmanifest" />
<body>
<div class="container login-container">
    <div class="login-form">
        <h2 class="text-center mb-4">Вход</h2>
        <form action="login_process.php" method="post">
            <div class="form-group">
                <label for="username">Логин:</label>
                <input
                        type="text"
                        class="form-control"
                        id="username"
                        name="username"
                        placeholder="Введите логин"
                />
            </div>
            <div class="form-group">
                <label for="password">Пароль:</label>
                <input
                        type="password"
                        class="form-control"
                        id="password"
                        name="password"
                        placeholder="Введите пароль"
                />
            </div>
            <div class="form-group">
                <label for="role">Выберите роль:</label>
                <select class="form-control role-select" id="role" name="role">
                    <option value="empty">-</option>
                    <option value="master">Мастер</option>
                    <option value="administrator">Администратор</option>
                    <option value="client">Клиент</option>
                </select>
            </div>
            <div class="btn1">
                <button
                        type="submit"
                        class="btn btn-primary btn-login btn-block"
                > 
                    Авторизоваться
                </button>
            </div>
        </form>
    </div>
</div>

<script src="/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>