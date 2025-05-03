<script>
document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("feedback-form");
  const success = document.getElementById("form-success");

  if (!form || !success) return;

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    const formData = new FormData(form);

    fetch(form.action, {
      method: "POST",
      body: formData
    })
    .then(res => res.text())
    .then(html => {
      success.innerHTML = html;
      success.style.display = "block";
      form.reset();
    })
    .catch(() => {
      success.innerHTML = '<div class="message error">Ошибка при отправке. Попробуйте позже.</div>';
      success.style.display = "block";
    });
  });
});
</script>
<script>
document.addEventListener("DOMContentLoaded", () => {
  const portfolio = document.getElementById("portfolio");

  portfolio.addEventListener("mouseover", () => {
    portfolio.classList.add("hover-active");
  });

  portfolio.addEventListener("mouseout", () => {
    portfolio.classList.remove("hover-active");
  });
});
</script>
<script>
document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("feedback-form");
  const success = document.getElementById("form-success");

  if (form) {
    form.addEventListener("submit", function (e) {
      e.preventDefault();
      const formData = new FormData(form);

      fetch(form.action, {
        method: "POST",
        body: formData
      })
        .then(res => res.text())
        .then(html => {
          success.innerHTML = html;
          success.style.display = "block";
          form.reset();

          // скрытие через 5 секунд
          setTimeout(() => {
            success.style.display = "none";
            success.innerHTML = "";
          }, 5000);
        })
        .catch(() => {
          success.innerHTML = '<div class="message error">Ошибка сети. Попробуйте позже.</div>';
          success.style.display = "block";

          setTimeout(() => {
            success.style.display = "none";
            success.innerHTML = "";
          }, 5000);
        });
    });
  }
});
</script>
<script>
document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("feedback-form");
  const success = document.getElementById("form-success");

  if (form && success) {
    form.addEventListener("submit", function (e) {
      e.preventDefault();

      const formData = new FormData(form);

      fetch(form.action, {
        method: "POST",
        body: formData
      })
        .then(res => res.text())
        .then(html => {
          success.innerHTML = html;
          success.classList.add("visible");

          form.reset();

          setTimeout(() => {
            success.classList.remove("visible");
            setTimeout(() => {
              success.innerHTML = "";
            }, 800); // подождём пока исчезнет
          }, 5000);
        })
        .catch(() => {
          success.innerHTML = '<div class="message error">Ошибка сети. Попробуйте позже.</div>';
          success.classList.add("visible");

          setTimeout(() => {
            success.classList.remove("visible");
            setTimeout(() => {
              success.innerHTML = "";
            }, 800);
          }, 5000);
        });
    });
  }
});
</script>
<script>
  document.querySelectorAll('.main-nav a').forEach(link => {
    link.addEventListener('click', () => {
      const nav = document.getElementById("mainMenu");
      const burger = document.getElementById("burgerBtn");
      if (nav.classList.contains("show")) {
        nav.classList.remove("show");
        burger.setAttribute('aria-expanded', 'false');
      }
    });
  });
</script>
<script>
  document.addEventListener("DOMContentLoaded", () => {
    const btn = document.getElementById("showMoreVideos");
    const extraVideos = document.getElementById("extraVideos");
    let opened = false;

    btn.addEventListener("click", () => {
      opened = !opened;
      extraVideos.style.display = opened ? "flex" : "none";
      btn.textContent = opened ? "Скрыть видео" : "Смотреть ещё видео";
    });

    // Убираем авто-скрытие при скролле
    window.removeEventListener("scroll", toggleMobileVideos);
  });
</script>
<script>
document.addEventListener("DOMContentLoaded", () => {
  const portfolio = document.getElementById("portfolio");
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        document.body.classList.add("highlight-portfolio");
      } else {
        document.body.classList.remove("highlight-portfolio");
      }
    });
  }, {
    root: null,
    rootMargin: "-50% 0px -50% 0px",  // сработает, когда портфолио будет в центре экрана
    threshold: 0
  });
  observer.observe(portfolio);
});
</script>
<script>
  function onClick(e) {
    e.preventDefault();
    grecaptcha.enterprise.ready(async () => {
      const token = await grecaptcha.enterprise.execute('6LfPHywrAAAAAHUdw0nC1BGJB87nWqzVAICNt4Kh', {action: 'LOGIN'});
    });
  }
</script>
