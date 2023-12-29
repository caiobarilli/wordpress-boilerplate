
let navIcon = document.querySelector("#nav-icon");

const changeIcon = (e) => {
    e.preventDefault();
    navIcon.classList.toggle('open');
};

if (navIcon) navIcon.addEventListener("click", changeIcon);

let myCollapsible = document.querySelector('#menu');

if (myCollapsible)
{

    myCollapsible.addEventListener('show.bs.collapse', event => {
        document.querySelector('body').classList.toggle('overflow-hidden');
    })
    // myCollapsible.addEventListener('shown.bs.collapse', event => { })

    myCollapsible.addEventListener('hide.bs.collapse', event => {
        document.querySelector('body').classList.toggle('overflow-hidden');
    })
    // myCollapsible.addEventListener('hidden.bs.collapse', event => { })

}