document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("feedback-form");
    const success = document.getElementById("form-success");

    form.addEventListener("submit", function (e) {
        e.preventDefault(); // отключаем стандартную отправку

        const formData = new FormData(form);

        fetch("/send-mail.php", {
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
            success.innerHTML = '<div class="message error">Ошибка сети. Попробуйте позже.</div>';
            success.style.display = "block";
        });
    });
});

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
            success.innerHTML = '<div class="message error">Ошибка отправки. Попробуйте позже.</div>';
            success.style.display = "block";
        });
    });
});
