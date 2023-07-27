export default function mobileNav() {

  const menu = document.getElementById('hamburger-menu')
  const mainMenu = document.querySelector(".fdry-header-nav");
	const htmlElement = document.querySelector("html");

  menu.addEventListener('click', toggleNav);

  function toggleNav(e){
    e.preventDefault();

    // prevent content scrolling
		htmlElement.classList.toggle("noscroll");
    mainMenu.classList.toggle("is-active");

    if(menu.classList.contains('closed')){
      menu.classList.remove('closed')
      menu.classList.add('opened')
    }else{
      menu.classList.remove('opened')
      menu.classList.add('closed')
    }
  }
}

