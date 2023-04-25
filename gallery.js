const container = document.querySelector('.containerphoto');
document.querySelector('.slider').addEventListener('input', (e) => {
  container.style.setProperty('--position', `${e.target.value}%`);
})

const sidebar = document.querySelector('.header .nav-bar .nav-list .sidebar');
const mobile_menu = document.querySelector('.header .nav-bar .nav-list ul');
const menu_item = document.querySelectorAll('.header .nav-bar .nav-list ul li a');
const header = document.querySelector('.header.container');

sidebar.addEventListener('click', () => {
	sidebar.classList.toggle('active');
	mobile_menu.classList.toggle('active');
});

menu_item.forEach((item) => {
	item.addEventListener('click', () => {
		sidebar.classList.toggle('active');
		mobile_menu.classList.toggle('active');
	});
});