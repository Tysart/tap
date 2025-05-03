document.addEventListener("DOMContentLoaded", () => {
  const videos = document.querySelectorAll('#videoGrid .video');
  const toggleBtn = document.getElementById('toggleVideos');
  const filterBtns = document.querySelectorAll('.filter-btn');
  let expanded = false;

  // Изначально показываем только первые 4
  function updateVisibleVideos(limit = 4) {
    let count = 0;
    videos.forEach(v => {
      if (v.style.display !== 'none') {
        v.style.display = count < limit || expanded ? 'block' : 'none';
        count++;
      }
    });
    toggleBtn.style.display = count > limit ? 'inline-block' : 'none';
    toggleBtn.textContent = expanded ? 'Свернуть' : 'Показать всё портфолио';
  }
  document.addEventListener("DOMContentLoaded", () => {
  const portfolio = document.getElementById("portfolio");
  portfolio.classList.add("hover-active");
});

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


  updateVisibleVideos();

  toggleBtn.addEventListener('click', () => {
    expanded = !expanded;
    updateVisibleVideos();
  });

  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const filter = btn.dataset.filter;
      videos.forEach(v => {
        const cat = v.dataset.category;
        v.style.display = (filter === 'all' || cat === filter) ? 'block' : 'none';
      });
      expanded = false;
      updateVisibleVideos();
    });
  });
});