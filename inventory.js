let images = [];
let currentImageIndex = 0;

function openSlideshow(link) {
  images = link.getAttribute("data-images").split(",");
  currentImageIndex = 0;
  updateImage();
  modal.style.display = "block";
}

function closeSlideshow() {
  modal.style.display = "none";
}

function changeImage(direction) {
  currentImageIndex += direction;

  if (currentImageIndex < 0) {
    currentImageIndex = images.length - 1;
  } else if (currentImageIndex >= images.length) {
    currentImageIndex = 0;
  }

  updateImage();
}

function updateImage() {
  document.getElementById("modalImage").src = images[currentImageIndex];
}

const modal = document.getElementById("myModal");
const closeModal = document.getElementsByClassName("close")[0];

closeModal.addEventListener("click", closeSlideshow);

modal.addEventListener("click", function (event) {
  if (event.target === modal) {
    closeSlideshow();
  }
});


const searchInput = document.getElementById("search");
const rows = document.querySelectorAll("tbody tr");

searchInput.addEventListener("keyup", function (event) {
  const searchTerm = event.target.value.toLowerCase();
  rows.forEach(row => {
    const make = row.childNodes[1].textContent.toLowerCase();
    const model = row.childNodes[3].textContent.toLowerCase();
    const year = row.childNodes[5].textContent.toLowerCase();
    const price = row.childNodes[7].textContent.toLowerCase();
    if (make.includes(searchTerm) || model.includes(searchTerm) || year.includes(searchTerm) || price.includes(searchTerm)) {
      row.style.display = "";
    } else {
      row.style.display = "none";
    }
  });
});

window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};
