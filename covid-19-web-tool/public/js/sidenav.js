const menuBtn = document.querySelector('#menu-btn');
const sideMenu = document.querySelector('.sidenav-menu');

menuBtn.addEventListener('click', () => {
    if (menuBtn.className == 'lni lni-chevron-right') {
        sideMenu.classList.add('show');
        menuBtn.className = 'lni lni-chevron-left';
    } else {
        sideMenu.classList.remove('show');
        menuBtn.className = 'lni lni-chevron-right';
    }
});