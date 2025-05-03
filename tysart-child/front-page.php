```php
<?php get_header(); ?>

<!-- Подключение Google Fonts и стилей -->
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Playfair+Display:wght@500;600&display=swap" rel="stylesheet">

<style>

/* Перекрытие фона */
#videoOverlay {
  position: fixed;
  top: 0; left: 0;
  width: 100vw; height: 100vh;
  background: rgba(0, 0, 0, 0.7);
  backdrop-filter: blur(3px);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 1000;
  opacity: 0;
  pointer-events: none;
  transition: opacity 0.4s ease;
}

#videoOverlay.active {
  opacity: 1;
  pointer-events: auto;
}

/* Видео-окно */
.video-modal {
  width: 90%;
  max-width: 960px;
  aspect-ratio: 16/9;
  background: #000;
  border-radius: 12px;
  box-shadow: 0 0 40px rgba(212, 175, 55, 0.5);
  transform: scale(0.9);
  transition: transform 0.4s ease;
}

#videoOverlay.active .video-modal {
  transform: scale(1);
}

.video-modal iframe {
  width: 100%;
  height: 100%;
  border: none;
  border-radius: 12px;
} 
 
body.highlight-portfolio section:not(#portfolio),
body.highlight-portfolio header,
body.highlight-portfolio footer {
  filter: brightness(0.2);
  transition: filter 0.5s ease;
}

body.highlight-portfolio #portfolio {
  filter: brightness(1);
  transition: filter 0.5s ease;
}
#portfolio.hover-active .video.featured:not(:hover) {
  filter: brightness(0.6) blur(0.5px);
  transition: filter 0.6s ease-in-out;
}

#portfolio.hover-active .video:not(.featured) {
  filter: none !important;
}
.video-filters {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 10px;
  margin-top: 30px;
}

.video-filters button {
  padding: 10px 16px;
  font-size: 14px;
  border: 1px solid #D4AF37;
  color: #D4AF37;
  background: none;
  border-radius: 4px;
  cursor: pointer;
  font-family: 'Inter', sans-serif;
  transition: all 0.3s;
}

.video-filters button:hover {
  background: rgba(212, 175, 55, 0.1);
}
#contacts h2 {
  margin-bottom: 40px;  /* или любое другое удобное вам значение */
  transition: filter 0.8s ease-in-out;
}

#contacts .tysart-form {
  margin-top: 20px;     /* дополнительный отступ сверху формы */
  transition: filter 0.8s ease-in-out;
}
/* при прокрутке к портфолио — затемнить всё, кроме него */
body.highlight-portfolio section:not(#portfolio),
body.highlight-portfolio header,
body.highlight-portfolio footer {
  filter: brightness(0.2);
  transition: filter 0.5s ease;
}

/* портфолио остаётся ярким */
body.highlight-portfolio #portfolio {
  filter: brightness(1);
  transition: filter 0.5s ease;
}
@-webkit-keyframes Gradient {
  0% {
    background-position: 0% 50%
  }
  50% {
    background-position: 100% 50%
  }
  100% {
    background-position: 0% 50%
  }
}

@-moz-keyframes Gradient {
  0% {
    background-position: 0% 50%
  }
  50% {
    background-position: 100% 50%
  }
  100% {
    background-position: 0% 50%
  }
}

@keyframes Gradient {
  0% {
    background-position: 0% 50%
  }
  50% {
    background-position: 100% 50%
  }
  100% {
    background-position: 0% 50%
  }
}
.main-logo img {
  filter: drop-shadow(0 0 6px rgba(212, 175, 55, 0.5));
  transition: filter 0.8s ease-in-out;
}

.main-nav a {
  position: relative;
  transition: filter 0.8s ease-in-out;
}
.main-nav a::after {
  content: "";
  position: absolute;
  bottom: -4px;
  left: 0;
  width: 100%;
  height: 2px;
  background: radial-gradient(circle, rgba(212,175,55,0.6), transparent);
  opacity: 0;
  transition: opacity 0.4s;
  transition: filter 0.8s ease-in-out;
}
.main-nav a:hover::after {
  opacity: 1;
}
#portfolio .main-videos,
#portfolio #extraVideos {
  display: flex;
  flex-wrap: wrap;
  gap: 40px;
  justify-content: center;
  margin-top: 40px;
  transition: filter 0.6s ease;
}

#portfolio .video,
#portfolio .extra-video {
  flex: 1 1 300px;
  max-width: 600px;
  position: relative;
  transition: transform 0.6s ease, box-shadow 0.6s ease, z-index 0.6s;
  z-index: 1;
}

#portfolio .iframe-container {
  position: relative;
  padding-bottom: 56.25%;
  height: 0;
  overflow: hidden;
  border-radius: 12px;
  box-shadow: 0 0 0 rgba(212, 175, 55, 0);
  transition: box-shadow 0.8s ease;
}

#portfolio .iframe-container iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border: none;
}

#portfolio .video:hover,
#portfolio .extra-video:hover {
  transform: scale(1.05);
  z-index: 2;
}

#portfolio .video:hover .iframe-container,
#portfolio .extra-video:hover .iframe-container {
  box-shadow: 0 0 40px rgba(212, 175, 55, 0.6);
}

#portfolio.hover-active .video:not(:hover),
#portfolio.hover-active .extra-video:not(:hover) {
  filter: brightness(0.6) blur(0.5px);
  transition: filter 0.6s ease-in-out;
}
body, html {
  margin: 0;
  padding: 0;
}

#hero {
  position: relative;
  height: 100vh;
  overflow: hidden;
}

#hero video {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  object-fit: cover;
  z-index: -2;
}

.video-gradient {
  position: absolute;
  top: 0;
  left: 0;
  height: 200px;
  width: 100%;
  background: linear-gradient(to bottom, rgba(0, 0, 0, 1), rgba(0, 0, 0, 0));
  z-index: -1;
}
/* === Переменные для тонкой подстройки === */
:root {
  --bg-color-dark: #080408;
  --bg-shift-1:   #1e0f05;
  --bg-shift-2:   #2f1b08;
  --highlight:    #D4AF37;
  --highlight-glow: rgba(212,175,55,0.4);
  --anim-duration: 30s;
}

/* === Фон: плавный градиент за всеми слоями === */
body::before {
  content: "";
  position: fixed; top: 0; left: 0;
  width: 100%; height: 100%;
  z-index: -100;
  background: linear-gradient(
    45deg,
    var(--bg-color-dark),
    var(--bg-shift-1),
    var(--bg-shift-2),
    var(--bg-shift-1),
    var(--bg-color-dark)
  );
  background-size: 400% 400%;
  animation: gradientShift var(--anim-duration) ease infinite;
}
@keyframes gradientShift {
  0%   { background-position: 0% 50%; }
  50%  { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}

/* === Кнопки и ссылки-акценты === */
button, #hero a {
  border: 1px solid var(--highlight);
  background: rgba(0,0,0,0.4) !important;
  color: var(--highlight) !important;
  text-shadow: 0 0 4px var(--highlight-glow);
  transition: background 0.3s, transform 0.2s;
}
button:hover, #hero a:hover {
  background: rgba(212,175,55,0.1) !important;
  transform: translateY(-2px);
}

/* === Легкий золотой glow навигации === */
.main-nav a::after {
  background: radial-gradient(circle, var(--highlight) 0%, transparent 70%) !important;
}
.main-logo img {
  filter: drop-shadow(0 0 8px var(--highlight-glow)) !important;
}
#hero .content {
  position: relative;
  z-index: 1;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
  color: #fff;
  padding: 0 20px;
}
html {
    scroll-behavior: smooth;
}

h1, h2, h3 {
    font-family: 'Playfair Display', serif;
}

body, p, li, a {
    font-family: 'Inter', sans-serif;
}

.fade-in {
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 1s ease, transform 1s ease;
}

.fade-in.visible {
    opacity: 1;
    transform: translateY(0);
}

.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.45);
    z-index: 0;
}

#hero {
    position: relative;
    height: 100vh;
    overflow: hidden;
}

#hero video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: -1;
}

#hero .content {
    position: relative;
    z-index: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100%;
    color: white;
    text-align: center;
    padding: 0 20px;
}

#hero h1 {
    color: #D4AF37;
    font-size: 48px;
    font-weight: 500;
    margin-bottom: 20px;
}

#hero p {
    font-size: 18px;
    line-height: 1.8;
    max-width: 800px;
    margin: 0 auto;
}

#hero a {
    display: inline-block;
    background: #8B1E1E;
    color: white;
    padding: 12px 24px;
    border-radius: 6px;
    margin-top: 30px;
    text-decoration: none;
}
section {
  position: relative;
  padding-left: 40px;
  margin: 80px 0;
}
section::before {
  content:"";
  position: absolute;
  top: 20px; left: 0;
  height: calc(100% - 40px);
  width: 4px;
  background: linear-gradient(
    to bottom,
    var(--highlight),
    transparent 60%,
    var(--highlight-glow)
  );
}
#about {
    padding: 80px 20px;
}

#about h2 {
    color: #D4AF37;
    text-align: center;
    margin-bottom: 40px;
}

#about .container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: flex-start;
    gap: 40px;
    max-width: 1100px;
    margin: 0 auto;
    flex-direction: row-reverse;
}

#about .image {
    flex: 1;
    min-width: 280px;
    max-width: 400px;
}

#about .image img {
    width: 100%;
    border-radius: 8px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
}

#about .text {
    flex: 2;
    min-width: 280px;
}

#about .text p {
    font-size: 16px;
    line-height: 1.7;
    color: #eee;
}

#about .links {
    margin: 30px 0;
}

#about .links a {
    margin-right: 20px;
    color: #D4AF37;
    text-decoration: none;
}

#about .details {
    display: none;
    animation: fadeIn 0.8s ease;
}

#about .details h3 {
    color: #CBA135;
    margin-bottom: 10px;
    transition: filter 0.8s ease-in-out;
}

#about .details p {
    color: #ddd;
    transition: filter 0.8s ease-in-out;
}

#about .details div {
    margin-top: 40px;
    transition: filter 0.8s ease-in-out;
}

#about button {
    margin-top: 30px;
    background: none;
    border: 1px solid #D4AF37;
    color: #D4AF37;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    transition: filter 0.8s ease-in-out;
}

#services {
    padding: 80px 20px;
    transition: filter 0.8s ease-in-out;
}

#services h2 {
    color: #D4AF37;
    text-align: center;
    transition: filter 0.8s ease-in-out;
}

#services ul {
    max-width: 800px;
    margin: 30px auto;
    list-style: none;
    padding: 0;
    color: white;
    font-size: 16px;
    line-height: 1.7;
}

#services p {
    text-align: center;
    margin-top: 20px;
    color: white;
}

#portfolio {
    padding: 80px 20px;
    background: #111;
}

#portfolio h2 {
    color: #D4AF37;
    text-align: center;
}

#portfolio .main-videos {
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
    justify-content: center;
    margin-top: 40px;
}

#portfolio .video {
    flex: 1;
    min-width: 300px;
    max-width: 600px;
}

#portfolio .video  .iframe-container {
    position: relative;
    padding-bottom: 56.25%;
    height: 0;
    overflow: hidden;
    border-radius: 8px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
}

#portfolio .video .iframe-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

#portfolio .video p {
    text-align: center;
    color: #CBA135;
    margin-top: 10px;
}

#portfolio #extraVideos {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    justify-content: center;
    margin-top: 60px;
}

#portfolio .extra-video {
    flex: 1 1 300px;
    max-width: 500px;
}

#portfolio .extra-video .iframe-container {
    position: relative;
    padding-bottom: 56.25%;
    height: 0;
    overflow: hidden;
    border-radius: 6px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

#portfolio .extra-video .iframe-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

#portfolio .extra-video p {
    text-align: center;
    color: #888;
    margin-top: 10px;
}

#portfolio button {
    margin: 40px auto 0;
    padding: 10px 20px;
    border: 1px solid #D4AF37;
    color: #D4AF37;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
}

#blog {
    padding: 80px 20px;
    transition: filter 0.8s ease-in-out;
}

#blog h2 {
    color: #D4AF37;
    text-align: center;
    transition: filter 0.8s ease-in-out;
}

#blog ul {
    max-width: 800px;
    margin: 30px auto;
    list-style: none;
    padding: 0;
    color: white;
    transition: filter 0.8s ease-in-out;
}

#blog ul li {
    margin-bottom: 20px;
    transition: filter 0.8s ease-in-out;
}

#blog ul li a {
    color: #CBA135;
    font-weight: 600;
    transition: filter 0.8s ease-in-out;
}

#blog p {
    text-align: center;
}

#blog p a:first-child {
    color: #8B1E1E;
}

#blog p a:last-child {
    color: #999;
}

#contacts {
    padding: 80px 20px;
}

#contacts h2 {
    color: #D4AF37;
    text-align: center;
}

#contacts .contacts-container {
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
    justify-content: center;
    max-width: 1100px;
    margin: 0 auto;
}

#contacts .contacts-list {
    list-style: none;
    padding: 0;
    color: white;
}

#contacts .contacts-list li {
    margin-bottom: 10px;
}

#contacts .contacts-list a {
    color: #CBA135;
    text-decoration: none;
}

#contacts .tysart-form {
    flex: 1;
    min-width: 300px;
}

#contacts .form-group {
    margin-bottom: 20px;
}

#contacts .form-group input,
#contacts .form-group textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #444;
    border-radius: 4px;
    background: #222;
    color: white;
}

#contacts .form-group textarea {
    resize: vertical;
}

#contacts .tysart-btn {
    background: #8B1E1E;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

#contacts .success-message {
    display: none;
    color: #D4AF37;
    text-align: center;
    margin-top: 20px;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

@media (max-width: 768px) {
    #about .container {
        flex-direction: column !important;
    }
}
/* === Подсветка лучами для h1 поверх видео === */
#hero h1 {
  position: relative;     /* чтобы ::before оказался под текстом */
  z-index: 3;             /* над фоном и overlay */
  text-shadow:
    0 0 8px rgba(212,175,55,0.8),
    0 0 16px rgba(212,175,55,0.6),
    0 0 24px rgba(212,175,55,0.4);
  /* ваши существующие свойства */
}

/* создаём псевдо‑элемент с конусным градиентом радиальных лучей */
#hero h1::before {
  content: "";
  position: absolute;
  top: 50%; left: 50%;
  width: 400%;  /* чтобы лучи были очень широкие */
  height: 400%;
  transform: translate(-50%, -50%) rotate(0deg);
  background: conic-gradient(
    from 0deg,
    rgba(212,175,55,0.5) 0deg,
    transparent 15deg,
    rgba(212,175,55,0.4) 30deg,
    transparent 45deg,
    rgba(212,175,55,0.3) 60deg,
    transparent 75deg,
    rgba(212,175,55,0.2) 90deg,
    transparent 105deg,
    rgba(212,175,55,0.1) 120deg,
    transparent 135deg,
    rgba(212,175,55,0.05) 150deg,
    transparent 165deg,
    rgba(212,175,55,0.5) 180deg,
    transparent 195deg,
    rgba(212,175,55,0.4) 210deg,
    transparent 225deg,
    rgba(212,175,55,0.3) 240deg,
    transparent 255deg,
    rgba(212,175,55,0.2) 270deg,
    transparent 285deg,
    rgba(212,175,55,0.1) 300deg,
    transparent 315deg,
    rgba(212,175,55,0.5) 360deg
  );
  filter: blur(20px);
  opacity: 0.6;
  animation: spin-rays 12s linear infinite;
  pointer-events: none;
}

/* анимация вращения лучей */
@keyframes spin-rays {
  to { transform: translate(-50%, -50%) rotate(360deg); }
}
.page-blurred {
    filter: blur(3px);
    opacity: 0.5;
    transition: filter 0.5s, opacity 0.5s;
}

/* Активированное видео находится поверх других элементов */
.video-container.is-expanded {
    position: absolute;
    top: 50%; /* Центрирование вертикально */
    left: 50%; /* Центрирование горизонтально */
    transform: translate(-50%, -50%) scale(1.5); /* Увеличено до 70% экрана */
    z-index: 9999;
    width: 70vw; /* Ширина видео */
    height: calc(70vw * 9/16); /* Соотношение сторон 16:9 */
    overflow: hidden;
    transition: transform 0.5s cubic-bezier(.2,.85,.31,1);
}

</style>

<script>
document.addEventListener("DOMContentLoaded", () => {
    // Анимация появления элементов
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));

    // Переключение текста в разделе "Обо мне"
    const toggleBtn = document.getElementById("toggleText");
    const hiddenBlock = document.getElementById("развернуто");
    let opened = false;

    toggleBtn.addEventListener("click", () => {
        opened = !opened;
        hiddenBlock.style.display = opened ? "block" : "none";
        toggleBtn.textContent = opened ? "Свернуть" : "Читать подробнее";
    });

    // Переключение дополнительных видео в портфолио
    const extras = document.querySelectorAll(".extra-video");
    const btn = document.getElementById("showMoreVideos");

    function toggleMobileVideos() {
        if (window.innerWidth < 768) {
            extras.forEach((el, i) => el.style.display = i < 1 ? "block" : "none");
            btn.style.display = "block";
        } else {
            extras.forEach(el => el.style.display = "block");
            btn.style.display = "none";
        }
    }

    toggleMobileVideos();
    window.addEventListener("resize", toggleMobileVideos);

    btn.addEventListener("click", () => {
        extras.forEach(el => el.style.display = "block");
        btn.style.display = "none";
    });
});

</script>


<!-- Главный раздел с видео -->
<div class="overlay"></div>
<section id="hero" style="position: relative; height: 100vh; overflow: hidden; margin: 0; padding: 0;">
  <video autoplay muted loop playsinline style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: 0;">
    <source src="https://tysart.pro/wp-content/uploads/2025/02/ШРЛ-обложка.mov" type="video/mp4">
    <p>Ваш браузер не поддерживает видео. Пожалуйста, обновите браузер.</p>
  </video>

  <!-- Затемняющий градиент -->
  <div class="video-gradient" style="position: absolute; top: 0; left: 0; height: 200px; width: 100%; background: linear-gradient(to bottom, rgba(0, 0, 0, 0.9), transparent); z-index: 1;"></div>

  <!-- Основной текст -->
  <div class="content fade-in" style="position: relative; z-index: 2; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; color: white; padding: 0 20px;">
    <h1 style="color: #D4AF37; font-size: 48px; font-weight: 500; margin-bottom: 20px;">Видео как искусство</h1>
    <p style="font-size: 18px; line-height: 1.8; max-width: 800px; margin: 0 auto;">Создаю визуальные истории: для брендов, художников, заводов и частных клиентов. Эстетика, смысл, ритм — в кадре работает всё.</p>
    <a href="#portfolio" style="display: inline-block; background: #8B1E1E; color: white; padding: 12px 24px; border-radius: 6px; margin-top: 30px; text-decoration: none;">Смотреть портфолио</a>
  </div>
</section>

<!-- Раздел "Обо мне" -->
<section id="about" class="fade-in">
    <h2>Обо мне</h2>
    <div class="container">
        <div class="image">
            <img src="https://tysart.pro/wp-content/uploads/2025/03/ph.ks-5096-—-крупный-размер-e1743340627249-edited.jpeg" alt="Моё фото">
        </div>
        <div class="text">
            <p>Я снимаю видео как визуальные эссе. Каждый проект — это не просто документирование, а передача образа, ритма, дыхания. За 15 лет я работал с музеями, заводами, архитектурными студиями, артистами и теми, кто хочет выразить себя через кадр.</p>
            <div id="развернуто" class="details">
                <div id="подход">
                    <h3>Мой подход</h3>
                    <p>Я всегда работаю с идеей. Даже если это техническая съёмка — в ней должен быть смысл. Мой процесс включает наблюдение, обсуждение с клиентом и построение композиции, чтобы каждый кадр передавал нужное ощущение.</p>
                </div>
                <div id="география">
                    <h3>География</h3>
                    <p>Работаю по всей России и за её пределами: Пермь, Москва, Санкт-Петербург, Екатеринбург, Казань, региональные и закрытые объекты, выставки, производственные площадки, музеи и студии.</p>
                </div>
                <div id="история">
                    <h3>История</h3>
                    <p>Начал с арт-среды, съёмок выставок, документального видео. Постепенно расширился в сторону бизнеса, промышленности и частных проектов. Снимаю и художественно, и структурно — это помогает работать и с артистами, и с заводами.</p>
                </div>
                <div id="ценности">
                    <h3>Ценности</h3>
                    <p>Мне важно, чтобы видео отражало суть, а не просто картинку. Я за тишину, внимание к деталям, настоящие эмоции и визуальный стиль, который не устаревает.</p>
                </div>
            </div>
            <button id="toggleText" aria-label="Развернуть или свернуть подробности">Читать подробнее</button>
        </div>
    </div>
</section>

<!-- Раздел "Услуги" -->
<section id="services" class="fade-in">
    <h2>Услуги</h2>
    <ul>
        <li>— Арт-видео: выставки, перформансы, визуальные проекты</li>
        <li>— Видео для бизнеса: процессы, интервью, презентации</li>
        <li>— Премиум-съёмка: портреты, съёмки с режиссурой</li>
    </ul>
    <p><strong>Минимальный бюджет — от 20 000 ₽</strong></p>
</section>

<!-- Раздел "Портфолио" -->

<section id="portfolio" class="fade-in" style="padding: 80px 20px; background: #111;">
  <h2 style="color:#D4AF37;text-align:center;">Портфолио</h2>

<!-- === ШОУРИЛЫ === -->
<div class="main-videos">
  <div class="video featured fade-in">
    <div class="iframe-container">
      <iframe src="https://player.vimeo.com/video/1072040281" loading="lazy" allowfullscreen></iframe>
    </div>
    <p>Showreel 2023</p>
  </div>
  <div class="video featured fade-in">
    <div class="iframe-container">
      <iframe src="https://player.vimeo.com/video/1061742963" loading="lazy" allowfullscreen></iframe>
    </div>
    <p>Showreel 2025</p>
  </div>
</div>

  <!-- === ВИДЕО ПО КАТЕГОРИЯМ === -->
  <!-- === КАТЕГОРИИ === -->
<h3 style="text-align:center; color:#D4AF37; margin-top:80px;">Другие проекты по категориям</h3>
<div class="video-filters" style="text-align:center; margin:30px 0;">
  <button class="filter-btn" data-filter="all">Все</button>
  <button class="filter-btn" data-filter="клипы">Клипы</button>
  <button class="filter-btn" data-filter="музыкальные">Музыкальные клипы</button>
  <button class="filter-btn" data-filter="промышленное">Промышленное</button>
  <button class="filter-btn" data-filter="частное">Частное</button>
  <button class="filter-btn" data-filter="бизнес">Бизнес</button>
  <button class="filter-btn" data-filter="детские">Детские проекты</button>
  <button class="filter-btn" data-filter="тизеры">Тизеры</button>
  <button class="filter-btn" data-filter="событийное">Событийное</button>
  <button class="filter-btn" data-filter="корпоративы">Корпоративы</button>
  <button class="filter-btn" data-filter="свадебное">Свадебное</button>
  <button class="filter-btn" data-filter="свадебные-клипы">Свадебные клипы</button>
  <button class="filter-btn" data-filter="свадебные-тизеры">Свадебные тизеры</button>
  <button class="filter-btn" data-filter="свадебные-фильмы">Свадебные фильмы</button>
</div>

<!-- === ВИДЕО ПО КАТЕГОРИЯМ === -->
<div id="videoGrid" class="main-videos">
    <!-- Перекрытие и модальное окно -->
<div id="videoOverlay" class="overlay-hidden">
  <div class="video-modal">
    <iframe src="" loading="lazy" allowfullscreen></iframe>
  </div>
</div>
    
  <div class="video fade-in" data-category="промышленное бизнес all">
    <div class="iframe-container">
      <iframe src="https://player.vimeo.com/video/1077945075" loading="lazy"></iframe>
    </div>
    <p>ECOTECH</p>
  </div>

  <div class="video fade-in" data-category="промышленное бизнес all">
    <div class="iframe-container">
      <iframe src="https://player.vimeo.com/video/1077942483" loading="lazy"></iframe>
    </div>
    <p>Pressmash</p>
  </div>

  <div class="video fade-in" data-category="свадебные-тизеры свадебное событийное all">
    <div class="iframe-container">
      <iframe src="https://player.vimeo.com/video/1059244427" loading="lazy"></iframe>
    </div>
    <p>Никита и Инна</p>
  </div>

  <div class="video fade-in" data-category="детские all">
    <div class="iframe-container">
      <iframe src="https://storage.yandexcloud.net/ftp-upload/2024/11/2024-11-19_13_32_GXKYAZNAYPOZN03.mp4" loading="lazy"></iframe>
    </div>
    <p>Проект "Я знаю что всё познаю"</p>
  </div>

  <div class="video fade-in" data-category="промышленное бизнес all">
    <div class="iframe-container">
      <iframe src="https://player.vimeo.com/video/1077961672" loading="lazy"></iframe>
    </div>
    <p>GK Vertikal</p>
  </div>

  <div class="video fade-in" data-category="промышленное бизнес all">
    <div class="iframe-container">
      <iframe src="https://player.vimeo.com/video/1077946759" loading="lazy"></iframe>
    </div>
    <p>Master</p>
  </div>

  <div class="video fade-in" data-category="клипы all">
    <div class="iframe-container">
      <iframe src="https://rutube.ru/play/embed/a565c56ccdaebafc614cad9eb3cc430b/" loading="lazy"></iframe>
    </div>
    <p>Клип TVRCH</p>
  </div>

  <div class="video fade-in" data-category="клипы all">
    <div class="iframe-container">
      <iframe src="https://rutube.ru/play/embed/ce0a8a663f601e3fba623a80daca1013/" loading="lazy"></iframe>
    </div>
    <p>𝗥𝘂𝘀𝘀𝗶𝗮𝗻 𝗞𝗶𝘀𝘀 — Фрукт</p>
  </div>

  <div class="video fade-in" data-category="клипы клипы музыкальные all">
    <div class="iframe-container">
      <iframe src="https://rutube.ru/play/embed/23541bbca042cbf67d456db66329a7d2/" loading="lazy"></iframe>
    </div>
    <p>SAX</p>
  </div>

  <div class="video fade-in" data-category="тизеры образовательное all">
    <div class="iframe-container">
      <iframe src="https://vk.com/video_ext.php?oid=-53605513&id=456241590&hd" loading="lazy"></iframe>
    </div>
    <p>Тизер к курсу Андрея Курпатова</p>
  </div>

  <div class="video fade-in" data-category="тизеры образовательное all">
    <div class="iframe-container">
      <iframe src="https://vk.com/video_ext.php?oid=-53605513&id=456241773&hd" loading="lazy"></iframe>
    </div>
    <p>Тизер к курсу Андрея Курпатова</p>
  </div>
  <div class="video fade-in" data-category="свадебные-тизеры свадебное событийное all">
  <div class="iframe-container">
    <iframe src="https://vkvideo.ru/video_ext.php?oid=-62737535&id=456239119&hd=1" loading="lazy" allowfullscreen></iframe>
  </div>
  <p>Свадебный тизер 1</p>
</div>
<div class="video fade-in" data-category="событийное свадебное свадебные-клипы all">
  <div class="iframe-container">
    <iframe src="https://vkvideo.ru/video_ext.php?oid=-62737535&id=456239101&hd=1" loading="lazy" allowfullscreen></iframe>
  </div>
  <p>Свадебный клип</p>
</div>
<div class="video fade-in" data-category="событийное свадебное свадебные-фильмы all">
  <div class="iframe-container">
    <iframe src="https://vkvideo.ru/video_ext.php?oid=-62737535&id=456239120&hd=1" loading="lazy" allowfullscreen></iframe>
  </div>
  <p>Свадебный фильм 1</p>
</div>
<div class="video fade-in" data-category="событийное свадебное свадебные-фильмы all">
  <div class="iframe-container">
    <iframe src="https://vkvideo.ru/video_ext.php?oid=-62737535&id=456239096&hd=1" loading="lazy" allowfullscreen></iframe>
  </div>
  <p>Свадебный фильм 2</p>
</div>
<div class="video fade-in" data-category="событийное свадебное свадебные-фильмы all">
  <div class="iframe-container">
    <iframe src="https://vkvideo.ru/video_ext.php?oid=-62737535&id=456239095&hd=1" loading="lazy" allowfullscreen></iframe>
  </div>
  <p>Свадебный фильм 3</p>
</div>
<div class="video fade-in" data-category="событийное свадебное свадебные-фильмы all">
  <div class="iframe-container">
    <iframe src="https://vkvideo.ru/video_ext.php?oid=-62737535&id=456239128&hd=2" loading="lazy" allowfullscreen></iframe>
  </div>
  <p>Свадебный фильм 4</p>
</div>
  <div class="video fade-in" data-category="свадебные-тизеры свадебное событийное all">
  <div class="iframe-container">
    <iframe src="https://vk.com/video_ext.php?oid=-62737535&id=456239122&hd=2" loading="lazy" allowfullscreen></iframe>
  </div>
  <p>Свадебный тизер 2</p>
</div>
</div>


  <!-- КНОПКА РАЗВОРОТА -->
  <div style="text-align:center;margin-top:30px;">
    <button id="toggleVideos" style="padding:10px 20px;border:1px solid #D4AF37;background:none;color:#D4AF37;border-radius:4px;">
      Смотреть все проекты
    </button>
  </div>
</section>

<!-- Раздел "Блог" -->
<section id="blog" class="fade-in">
    <h2>Последние статьи</h2>
    <ul>
        <?php
        $recent_posts = new WP_Query(['posts_per_page' => 3]);
        while ($recent_posts->have_posts()): $recent_posts->the_post();
        ?>
        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> — <?php the_time('d.m.Y'); ?></li>
        <?php endwhile; wp_reset_postdata(); ?>
    </ul>
    <p><a href="/blog">Читать все статьи</a> | <a href="/feed">RSS</a></p>
</section>

<style>
.message {
    padding: 20px;
    border-radius: 8px;
    font-size: 16px;
    max-width: 600px;
    margin: 30px auto;
    text-align: center;
    font-family: 'Inter', sans-serif;
    background-color: #1A1A1A;
    box-shadow: 0 0 10px rgba(0,0,0,0.4);
}
.message.success {
    border: 2px solid #D4AF37;
    color: #D4AF37;
}
.message.error {
    border: 2px solid #8B1E1E;
    color: #F5F5F5;
}
</style>

<!-- Раздел "Контакты" -->
<section id="contacts" class="fade-in">
  <h2>Контакты</h2>
  <div class="contacts-container">
    <ul class="contacts-list">
      <li><strong>Email:</strong> <a href="mailto:tysart@arttistfoto.ru">tysart@arttistfoto.ru</a></li>
      <li><strong>Telegram:</strong> <a href="https://t.me/arttistfoto" target="_blank">@arttistfoto</a></li>
      <li><strong>WhatsApp/Телефон:</strong> <a href="https://wa.me/+79612099502" target="_blank">+7 961 209-9502</a></li>
      <li><strong>VK:</strong> <a href="https://vk.com/tysartru" target="_blank">vk.com/tysartru</a></li>
    </ul>

    <form id="feedback-form" class="tysart-form fade-in" action="/wp-content/themes/tysart-child/send-mail.php" method="post">
      <div class="form-group">
        <input type="text" name="name" placeholder="Ваше имя*" required>
      </div>
      <div class="form-group">
        <input type="email" name="email" placeholder="Email*" required>
      </div>
      <div class="form-group">
        <input type="tel" name="phone" placeholder="Номер телефона*" required>
      </div>
      <div class="form-group">
        <textarea name="message" placeholder="Ваше сообщение..." rows="5" required></textarea>
      </div>
      <button type="submit" class="tysart-btn">Отправить →</button>
    </form>

    <div id="form-success" style="width: 100%; margin-top: 20px;"></div>
  </div>
</section>
<!-- Раздел "Отзывы" -->
<section id="reviews" class="fade-in">
    <h2>Отзывы</h2>
    <ul>
      <script src="https://res.smartwidgets.ru/app.js" defer></script>
      <div class="sw-app" data-app="40079cc0422ecb571ac0c7ef7cb9b7d3"></div>
      <script src="https://res.smartwidgets.ru/app.js" defer></script>
      <div class="sw-app" data-app="5d9d1f2ef5928ffc274742fd321906dc"></div>
    <ul>  
      &copy; <?php echo date('2025'); ?> ИП Тыщенко Артём Иванович
</section>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const videos = document.querySelectorAll('#videoGrid .video');
  const toggleBtn = document.getElementById('toggleVideos');
  const filterBtns = document.querySelectorAll('.filter-btn');
  let expanded = false;

  function updateVisible(limit = 4) {
    let count = 0;
    videos.forEach(v => {
      if (v.dataset.visible !== 'false') {
        v.style.display = count < limit || expanded ? 'block' : 'none';
        count++;
      } else {
        v.style.display = 'none';
      }
    });
    toggleBtn.style.display = count > limit ? 'inline-block' : 'none';
    toggleBtn.textContent = expanded ? 'Свернуть' : 'Смотреть все проекты';
  }

  // Фильтрация
  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const filter = btn.dataset.filter;
      videos.forEach(v => {
        const cat = v.dataset.category;
        const match = (filter === 'all' || cat.split(' ').includes(filter));
        v.dataset.visible = match ? 'true' : 'false';
      });
      expanded = false;
      updateVisible();
    });
  });

  toggleBtn.addEventListener('click', () => {
    expanded = !expanded;
    updateVisible();
  });

  // начальное состояние
  videos.forEach(v => v.dataset.visible = 'true');
  updateVisible();
});
</script>
<script>
document.addEventListener("DOMContentLoaded", () => {
  // Ставим затемнение при загрузке
  document.body.classList.add("highlight-portfolio");

  // Элементы, взаимодействие с которыми должно снять затемнение
  const filterBtns = document.querySelectorAll(".filter-btn");
  const toggleBtn = document.getElementById("toggleVideos");
  const videoItems = document.querySelectorAll(".video iframe");

  // Снятие затемнения
  function removeHighlight() {
    document.body.classList.remove("highlight-portfolio");
  }

  // Снятие при клике на фильтр
  filterBtns.forEach(btn => {
    btn.addEventListener("click", removeHighlight);
  });

  // Снятие при клике на кнопку "Смотреть все проекты"
  if (toggleBtn) {
    toggleBtn.addEventListener("click", removeHighlight);
  }

  // Снятие при клике на любое видео
  videoItems.forEach(iframe => {
    iframe.addEventListener("click", removeHighlight);
  });
});
</script>
<script>
document.addEventListener("DOMContentLoaded", () => {
  const overlay = document.getElementById("videoOverlay");
  const modal = overlay.querySelector("iframe");
  const videos = document.querySelectorAll("#videoGrid .video iframe");

  videos.forEach(iframe => {
    iframe.addEventListener("click", (e) => {
      e.preventDefault();
      const src = iframe.src;
      modal.src = src.includes("?") ? src + "&autoplay=1" : src + "?autoplay=1";
      overlay.classList.add("active");
    });
  });

  overlay.addEventListener("click", () => {
    overlay.classList.remove("active");
    modal.src = "";
  });
});
const videos = document.querySelectorAll('.video-container');

videos.forEach(video => {
    video.addEventListener('click', () => {
        if (video.classList.contains('is-expanded')) return; // Игнорируем второй клик

        // Включаем размытие и затемнение для всей страницы
        document.body.classList.add('page-blurred');

        // Масштабируем активное видео
        video.classList.add('is-expanded');

        // Закрываем по следующему клику
        video.addEventListener('click', closeExpandedVideo, { once: true });
    });
});

function closeExpandedVideo(e) {
    const container = e.currentTarget;
    container.classList.remove('is-expanded');
    document.body.classList.remove('page-blurred');
}
</script>
<?php get_footer(); ?>


```
