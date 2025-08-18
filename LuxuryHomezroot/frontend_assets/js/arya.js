//  amenities carousel property detailed 
function setupCarousel(rowSelector, direction = 'left') {
  const row = document.querySelector(rowSelector);
  
  // Check if the element exists before proceeding
  if (!row) {
    console.warn(`Element with selector "${rowSelector}" not found. Carousel setup skipped.`);
    return;
  }
  
  const track = row.querySelector('.ar-carousel-track');
  
  // Check if track element exists
  if (!track) {
    console.warn(`Element with class "ar-carousel-track" not found within "${rowSelector}". Carousel setup skipped.`);
    return;
  }
  
  const cards = Array.from(track.children);

  // Check if there are cards to work with
  if (cards.length === 0) {
    console.warn(`No cards found within track for "${rowSelector}". Carousel setup skipped.`);
    return;
  }

  // Duplicate cards to simulate infinite scroll
  cards.forEach(card => {
    const clone = card.cloneNode(true);
    track.appendChild(clone);
  });

  let isHovered = false;
  let isDragging = false;
  let startX;
  let scrollLeft;
  let position = 0;
  const cardWidth = cards[0].offsetWidth + 20; // width + gap

  // Infinite scroll animation
  function scrollLoop() {
    if (!isHovered && !isDragging) {
      position += (direction === 'left' ? -1 : 1);
      track.style.transform = `translateX(${position}px)`;

      // Reset for infinite scroll
      if (Math.abs(position) >= track.scrollWidth / 2) {
        position = 0;
      }
    }
    requestAnimationFrame(scrollLoop);
  }
  scrollLoop();

  // Pause on hover
  row.addEventListener('mouseenter', () => isHovered = true);
  row.addEventListener('mouseleave', () => isHovered = false);

  // Draggable
  row.addEventListener('mousedown', (e) => {
    isDragging = true;
    startX = e.pageX;
    scrollLeft = position;
    row.classList.add('dragging');
  });

  window.addEventListener('mousemove', (e) => {
    if (!isDragging) return;
    const dx = e.pageX - startX;
    position = scrollLeft + dx;
    track.style.transform = `translateX(${position}px)`;
  });

  window.addEventListener('mouseup', () => {
    isDragging = false;
    row.classList.remove('dragging');
  });

  // Touch support
  row.addEventListener('touchstart', (e) => {
    isDragging = true;
    startX = e.touches[0].pageX;
    scrollLeft = position;
  });

  row.addEventListener('touchmove', (e) => {
    if (!isDragging) return;
    const dx = e.touches[0].pageX - startX;
    position = scrollLeft + dx;
    track.style.transform = `translateX(${position}px)`;
  });

  row.addEventListener('touchend', () => {
    isDragging = false;
  });
}

// Setup both rows - with error handling
document.addEventListener('DOMContentLoaded', function() {
  // Only initialize carousels if the elements exist
  if (document.querySelector('.ar-carousel-row-left')) {
    setupCarousel('.ar-carousel-row-left', 'left');
  }
  
  if (document.querySelector('.ar-carousel-row-right')) {
    setupCarousel('.ar-carousel-row-right', 'right');
  }
});

//  floor plan tab 
function showTab(id, event) {
  const tabs = document.querySelectorAll('.ar-flr-tab');
  const contents = document.querySelectorAll('.ar-flr-tab-content');

  tabs.forEach(tab => tab.classList.remove('ar-flr-active'));
  contents.forEach(c => c.classList.remove('ar-flr-active'));

  document.getElementById(id).classList.add('ar-flr-active');
  event.target.classList.add('ar-flr-active');
}

// gallery
const blocks = document.querySelectorAll('.ar-glry-block');
const lightbox = document.getElementById('arLightbox');
const lightboxImg = document.getElementById('arLightboxImg');

// Only set up gallery if elements exist
if (blocks.length > 0 && lightbox && lightboxImg) {
  blocks.forEach(block => {
    block.addEventListener('click', () => {
      const imgSrc = block.getAttribute('data-img');
      lightboxImg.src = imgSrc;
      lightbox.style.display = 'flex';
    });
  });

  function closeLightbox() {
    lightbox.style.display = 'none';
    lightboxImg.src = '';
  }
}

// location
function switchTab(tabId, element) {
  const allTabs = document.querySelectorAll('.ar-loc-tab');
  const allContents = document.querySelectorAll('.ar-loc-tab-content');

  allTabs.forEach(tab => tab.classList.remove('ar-loc-tab-active'));
  element.classList.add('ar-loc-tab-active');

  allContents.forEach(content => content.classList.remove('ar-loc-tab-content-active'));
  document.getElementById(tabId).classList.add('ar-loc-tab-content-active');
}

// faq 
document.addEventListener('DOMContentLoaded', function() {
  const faqButtons = document.querySelectorAll('.ar-faq-question');
  if (faqButtons.length > 0) {
    faqButtons.forEach(button => {
      button.addEventListener('click', () => {
        const faqItem = button.parentElement;
        const answer = faqItem.querySelector('.ar-faq-answer');
        const icon = button.querySelector('.ar-faq-icon');

        const isOpen = button.classList.contains('active');

        // Close all
        document.querySelectorAll('.ar-faq-answer').forEach(a => a.style.display = 'none');
        document.querySelectorAll('.ar-faq-question').forEach(b => b.classList.remove('active'));
        document.querySelectorAll('.ar-faq-icon').forEach(i => i.textContent = '+');

        // Open current if it was not already open
        if (!isOpen) {
          answer.style.display = 'block';
          button.classList.add('active');
          icon.textContent = '−';
        }
      });
    });
  }
});

// AR READ FUNC JS
function arReadFuncToggle(btn) {
  const moreText = document.getElementById("ar-read-func-more");
  if (!moreText) return;
  
  const isVisible = moreText.style.display === "inline";
  moreText.style.display = isVisible ? "none" : "inline";
  btn.textContent = isVisible ? "Read More" : "Read Less";
}

// Blog Sticky Form
const stickyForm = document.getElementById("stickyForm");
const belowSection = document.getElementById("belowSection");

// Only set up sticky form if elements exist
if (stickyForm && belowSection) {
  window.addEventListener("scroll", () => {
    const formRect = stickyForm.getBoundingClientRect();
    const belowRect = belowSection.getBoundingClientRect();

    if (formRect.bottom >= belowRect.top) {
      stickyForm.classList.add("stop-sticky");
    } else {
      stickyForm.classList.remove("stop-sticky");
    }
  });
}
