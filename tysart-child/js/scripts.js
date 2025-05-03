jQuery(document).ready(function($) {
    $('#contactForm').on('submit', function(e) {
        e.preventDefault(); // Предотвращаем стандартную отправку формы

        // Собираем данные формы
        var formData = $(this).serialize();

        // Отправляем AJAX-запрос
        $.ajax({
            type: 'POST',
            url: '/send-mail.php', // Укажите правильный путь к вашему скрипту
            data: formData,
            success: function(response) {
                $('#response').html('<p>' + response + '</p>');
                $('#contactForm')[0].reset(); // Очищаем форму
            },
            error: function(xhr, status, error) {
                $('#response').html('<p>Ошибка: ' + error + '</p>');
            }
        });
    });
});
document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("feedback-form");
  const successDiv = document.getElementById("form-success");
  const errorSpans = form.querySelectorAll(".error-message");

  if (!form || !successDiv) return;

  form.addEventListener("submit", async (e) => {
    e.preventDefault();

    // Сброс предыдущих ошибок и сообщений
    errorSpans.forEach(span => (span.textContent = ""));
    successDiv.style.display = "none";

    const fd = new FormData(form);
    fd.append("action", "tysart_contact_form");
    fd.append("nonce", tysart_ajax.nonce);

    try {
      const res = await fetch(tysart_ajax.url, {
        method: "POST",
        credentials: "same-origin",
        body: fd
      });
      const json = await res.json();

      if (json.success) {
        form.reset();
        successDiv.className = "success-message success";
        successDiv.innerHTML = "<p>Спасибо! Я отвечу вам в течение дня 😊</p>";
        successDiv.style.display = "block";
        setTimeout(() => (successDiv.style.display = "none"), 5000);
      } else {
        // Показываем общее сообщение
        successDiv.className = "success-message error";
        successDiv.innerHTML = `<p>${
          json.data.errors.general ||
          "Пожалуйста, исправьте ошибки в форме и попробуйте снова."
        }</p>`;
        successDiv.style.display = "block";

        // Показываем полевые ошибки
        Object.entries(json.data.errors || {}).forEach(([field, msg]) => {
          if (field === "general") return;
          const input = form.querySelector(`[name="${field}"]`);
          const span = input && input.nextElementSibling;
          if (span && span.classList.contains("error-message")) {
            span.textContent = msg;
            span.style.color = "#8B1E1E";
          }
        });
      }
    } catch (err) {
      console.error("Ajax error:", err);
      successDiv.className = "success-message error";
      successDiv.innerHTML = "<p>Ошибка соединения. Попробуйте позже.</p>";
      successDiv.style.display = "block";
    }
  });
document.querySelectorAll('.video-container').forEach(video => {
 video.addEventListener('mouseenter', () => {
 document.body.classList.add('video-hover');
 });
 video.addEventListener('mouseleave', () => {
 document.body.classList.remove('video-hover');
 });});
  // Сброс ошибки при фокусе на поле
  form.querySelectorAll("input, textarea").forEach((input) => {
    input.addEventListener("focus", () => {
      const span = input.nextElementSibling;
      if (span && span.classList.contains("error-message")) {
        span.textContent = "";
      }
    });
  });
});
document.querySelectorAll('#portfolio .video').forEach(video => {
 video.addEventListener('mouseenter', () => {
 document.querySelectorAll('section:not(#portfolio)').forEach(section => {
 section.style.transition = 'opacity0.3s ease';
 section.style.opacity = '0.3';
 });
 });
 video.addEventListener('mouseleave', () => {
 document.querySelectorAll('section:not(#portfolio)').forEach(section => {
 section.style.opacity = '1';
 });
 });
});
document.addEventListener("DOMContentLoaded", () => {
    // Эффект размытия при загрузке
    const heroVideo = document.querySelector('#hero video');
    if (heroVideo) {
        heroVideo.classList.add('blur-in');
        
        // После загрузки видео
        heroVideo.addEventListener('loadeddata', () => {
            setTimeout(() => {
                heroVideo.classList.add('loaded');
            }, 500);
        });
    }
    
    // Замена стандартного overlay на градиентный
    const overlay = document.querySelector('#hero .overlay');
    if (overlay) {
        overlay.classList.remove('overlay');
        overlay.classList.add('gradient-overlay');
    }
    
    // Добавление эффекта параллакса при скролле
    window.addEventListener('scroll', () => {
        const scrollPosition = window.scrollY;
        if (heroVideo && scrollPosition < window.innerHeight) {
            // Эффект параллакса для видео при скролле
            heroVideo.style.transform = `scale(1.1) translateY(${scrollPosition * 0.1}px)`;
        }
    });
    
    // Улучшенный preloader для видео
    const portfolioVideos = document.querySelectorAll('#portfolio iframe');
    portfolioVideos.forEach(iframe => {
        // Добавление класса loaded после загрузки
        iframe.addEventListener('load', function() {
            this.parentNode.classList.add('loaded');
        });
    });
    
    // Автоматическое воспроизведение видео в портфолио при наведении (если поддерживается)
    const videoContainers = document.querySelectorAll('#portfolio .iframe-container');
    
    // Функция для отправки сообщения в iframe для управления воспроизведением
    function postVideoMessage(iframe, action) {
        try {
            const player = iframe.contentWindow;
            // Формат сообщения зависит от типа плеера (YouTube, Vimeo)
            if (iframe.src.includes('vimeo')) {
                // Для Vimeo
                player.postMessage({
                    method: action === 'play' ? 'play' : 'pause'
                }, '*');
            }
        } catch (e) {
            console.log('Не удалось управлять видео:', e);
        }
    }
    
    // Применение автовоспроизведения при наведении
    videoContainers.forEach(container => {
        const iframe = container.querySelector('iframe');
        
        container.addEventListener('mouseenter', () => {
            postVideoMessage(iframe, 'play');
        });
        
        container.addEventListener('mouseleave', () => {
            postVideoMessage(iframe, 'pause');
        });
    });
    
    // Анимированное появление видео при скролле с использованием IntersectionObserver
    const videoObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'scale(1)';
                videoObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.3 });

    const allVideos = document.querySelectorAll('#portfolio .iframe-container');
    allVideos.forEach(video => {
        video.style.opacity = '0';
        video.style.transform = 'scale(0.95)';
        video.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
        videoObserver.observe(video);
    });
});
{
  "event": {
    "token": "TOKEN",
    "expectedAction": "USER_ACTION",
    "siteKey": "6LfPHywrAAAAAHUdw0nC1BGJB87nWqzVAICNt4Kh",
  }
}
