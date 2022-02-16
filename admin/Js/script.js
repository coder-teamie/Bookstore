const navbar = document.querySelector('#nav');
const navBtn = document.querySelector('#nav-btn');
const closeBtn = document.querySelector('#close-btn');
const sidebar = document.querySelector('#sidebar');
const date = document.querySelector('#date');
// add fixed class to navbar
window.addEventListener('scroll', function () {
  if (window.pageYOffset > 100) {
    navbar.classList.add('navbar-fixed');
  } else {
    navbar.classList.remove('navbar-fixed');
  }
});
// show sidebar
navBtn.addEventListener('click', function () {
  sidebar.classList.add('show-sidebar');
});
closeBtn.addEventListener('click', function () {
  sidebar.classList.remove('show-sidebar');
});
// set year
date.innerHTML = new Date().getFullYear();

const dropBtn = document.getElementById('dropBtn');
const dropdown = document.getElementById('dropdown');

const postDropBtn = document.getElementById('postDropBtn');
const postDropdown = document.getElementById('postDropdown');

dropBtn.addEventListener('click', function () {
  dropdown.classList.toggle('show-dropdown');
});

postDropBtn.addEventListener('click', function () {
  postDropdown.classList.toggle('show-dropdown');
});
