// Menu déroulant

const menuToggle = document.getElementById('menu_toggle');
const mainMenu = document.getElementById('main_menu');
const main = document.querySelector('main');

menuToggle.addEventListener('click', () => {

  mainMenu.classList.toggle('open');
  
  main.classList.toggle('shift');
});

// Options du profil

const profileToggle = document.getElementById('profile_toggle');
const profileOptions = document.getElementById('profile_options');

profileToggle.addEventListener('click', () => {

  profileOptions.classList.toggle('open');
});