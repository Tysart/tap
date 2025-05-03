<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Адаптивное меню v2</title>
  <style>
    /* сброс и фон */
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      font-family: 'Inter', sans-serif;
      background-color: #0A0A0A; /* чёрный фон */
    }

    /* шапка */
    .main-header {
      position: fixed;
      top: 0; left: 0; width: 100%;
      padding: 16px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      z-index: 1000;
    }

    .main-logo img {
      height: 40px;
      display: block;
    }

    /* навигация - десктоп */
    .main-nav {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
      justify-content: flex-end;
      flex: 1;
      z-index: 900; /* чуть ниже бургер-кнопки */
    }
    .main-nav a {
      color: #fff;
      text-decoration: none;
      font-family: 'Playfair Display', serif;
      font-size: 16px;
      letter-spacing: .5px;
      transition: color .3s;
    }
    .main-nav a:hover { color: #D4AF37; }

    /* бургер-иконка */
    .burger {
      display: none;
      flex-direction: column;
      justify-content: space-between;
      width: 30px; height: 22px;
      cursor: pointer;
      z-index: 1001; /* самый верх */
    }
    .burger span {
      display: block;
      height: 3px;
      background: #D10000; /* красный */
      border-radius: 2px;
      transition: all .3s;
    }

    /* мобильная версия */
    @media (max-width: 768px) {
      .main-nav {
        position: fixed;
        top: 0; left: 0;
        width: 100%; height: 100vh;
        background: #0A0A0A;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 30px;
        display: none;           /* скрыто по умолчанию */
      }
      .main-nav.show {
        display: flex;          /* показываем при клике */
      }
      .burger {
        display: flex;
      }
    }
  </style>
</head>
<body>

  <header class="main-header">
    <a href="#hero" class="main-logo">
      <img src="https://tysart.pro/wp-content/uploads/2025/03/red-1.png" alt="Логотип">
    </a>

    <nav class="main-nav" id="mainMenu">
      <a href="#about">Обо мне</a>
      <a href="#services">Услуги</a>
      <a href="#portfolio">Портфолио</a>
      <a href="#blog">Статьи</a>
      <a href="#contacts">Контакты</a>
    </nav>

    <div class="burger" id="burgerBtn" aria-label="Меню" aria-expanded="false">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </header>

  <main>
    <!-- ваше содержимое -->
  </main>

  <script>
    const burger = document.getElementById('burgerBtn');
    const nav    = document.getElementById('mainMenu');

    burger.addEventListener('click', () => {
      const isOpen = nav.classList.toggle('show');
      burger.setAttribute('aria-expanded', isOpen);
    });

    // если ширина больше 768px, принудительно закрываем моб.меню
    window.addEventListener('resize', () => {
      if (window.innerWidth > 768 && nav.classList.contains('show')) {
        nav.classList.remove('show');
        burger.setAttribute('aria-expanded', 'false');
      }
    });
  </script>
     <script src="https://www.google.com/recaptcha/enterprise.js?render=6LfPHywrAAAAAHUdw0nC1BGJB87nWqzVAICNt4Kh"></script>
    <script>
   function onSubmit(token) {
     document.getElementById("demo-form").submit();
   }
   
 </script>

</body>
</html>