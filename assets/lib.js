const icon = document.getElementById('menu-icon');
const menu = document.getElementById('menu');
console.log('javascript actived');

icon.addEventListener('click', toggleMenu);

function toggleMenu(){
    icon.classList.toggle('trasforma');
    menu.classList.toggle('chiuso')
    menu.classList.toggle('aperto')

}