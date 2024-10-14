// menu ẩn hiện
let navbar = document.getElementById('navbar');
let prevScrollPos = window.pageYOffset;

window.onscroll = function() {
    let currentScrollPos = window.pageYOffset;

    if (prevScrollPos > currentScrollPos) {
        navbar.classList.remove('scroll-down');
        navbar.classList.add('scroll-up');
    } else {
        navbar.classList.remove('scroll-up');
        navbar.classList.add('scroll-down');
    }

    // Thêm hoặc xóa lớp 'fixed' tùy thuộc vào vị trí cuộn
    if (currentScrollPos > 50) {
        navbar.classList.add('fixed');
    } else {
        navbar.classList.remove('fixed');
    }

    prevScrollPos = currentScrollPos;
};
