//  amenities carousel property detailed 
function setupCarousel(rowSelector, direction = 'left') {
  const row = document.querySelector(rowSelector);
  const track = row.querySelector('.ar-carousel-track');
  const cards = Array.from(track.children);

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

// Setup both rows
setupCarousel('.ar-carousel-row-left', 'left');
setupCarousel('.ar-carousel-row-right', 'right');
 


 //  amenities carousel property detailed



//  floor plan tab 
 
  function showTab(id, event) {
    const tabs = document.querySelectorAll('.ar-flr-tab');
    const contents = document.querySelectorAll('.ar-flr-tab-content');

    tabs.forEach(tab => tab.classList.remove('ar-flr-active'));
    contents.forEach(c => c.classList.remove('ar-flr-active'));

    document.getElementById(id).classList.add('ar-flr-active');
    event.target.classList.add('ar-flr-active');
  }
 

// floor plan tab


// gallery
 
  
    const blocks = document.querySelectorAll('.ar-glry-block');
    const lightbox = document.getElementById('arLightbox');
    const lightboxImg = document.getElementById('arLightboxImg');

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
// gallery

// location
 
  function switchTab(tabId, element) {
      const allTabs = document.querySelectorAll('.ar-loc-tab');
      const allContents = document.querySelectorAll('.ar-loc-tab-content');

      allTabs.forEach(tab => tab.classList.remove('ar-loc-tab-active'));
      element.classList.add('ar-loc-tab-active');

      allContents.forEach(content => content.classList.remove('ar-loc-tab-content-active'));
      document.getElementById(tabId).classList.add('ar-loc-tab-content-active');
    }
// location

// faq 
 
  document.querySelectorAll('.ar-faq-question').forEach(button => {
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
  
// faq 


// AR READ FUNC JS
  function arReadFuncToggle(btn) {
    const moreText = document.getElementById("ar-read-func-more");
    const isVisible = moreText.style.display === "inline";
    moreText.style.display = isVisible ? "none" : "inline";
    btn.textContent = isVisible ? "Read More" : "Read Less";
  }
// AR READ FUNC JS

// Blog Sticky Form
  //   const formWrapper = document.querySelector('.ar-blogs-sticky');
  // const recentPosts = document.querySelector('#recentPosts');

  // const observer = new IntersectionObserver(
  //   ([entry]) => {
  //     if (entry.isIntersecting) {
  //       formWrapper.classList.add('stopped');
  //     } else {
  //       formWrapper.classList.remove('stopped');
  //     }
  //   },
  //   {
  //     root: null,
  //     threshold: 0,
  //     rootMargin: "0px"
  //   }
  // );

  // observer.observe(recentPosts);

// Blog Sticky Form


   const stickyForm = document.getElementById("stickyForm");
  const belowSection = document.getElementById("belowSection");

  window.addEventListener("scroll", () => {
    const formRect = stickyForm.getBoundingClientRect();
    const belowRect = belowSection.getBoundingClientRect();

    if (formRect.bottom >= belowRect.top) {
      stickyForm.classList.add("stop-sticky");
    } else {
      stickyForm.classList.remove("stop-sticky");
    }
  });