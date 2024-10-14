// chuyển ảnh
let currentImageIndex = 1;
const totalImages = 3; // Tổng số ảnh
const intervalTime = 3000; // 3 giây

function changeImage() {
  const currentImage = document.getElementById(`image${currentImageIndex}`);
  const prevImageIndex = currentImageIndex === 1 ? totalImages : currentImageIndex - 1;
  const prevImage = document.getElementById(`image${prevImageIndex}`);

  currentImage.style.opacity = '1';
  prevImage.style.opacity = '0';

  currentImageIndex = currentImageIndex === totalImages ? 1 : currentImageIndex + 1;
}

setInterval(changeImage, intervalTime);

let currentIndex = 1;

function showImage(index) {
    const currentImage = document.getElementById(`image${index}`);
    currentImage.style.opacity = '1';
}

function hideAllImages() {
    for (let i = 1; i <= totalImages; i++) {
        const otherImage = document.getElementById(`image${i}`);
        otherImage.style.opacity = '0';
    }
}

function prevImage() {
    currentIndex = (currentIndex - 1 + totalImages) % totalImages + 1;
    hideAllImages();
    showImage(currentIndex);
}

function nextImage() {
    currentIndex = (currentIndex % totalImages) + 1;
    hideAllImages();
    showImage(currentIndex);
}