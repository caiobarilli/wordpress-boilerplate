
let modal = document.querySelector("#modal-privacy-policy"),
privacy = document.querySelector(".accept-button");

if(modal)
{
    if(getCookie("privacy-policy")){
        modal.classList.add("d-none");
    }
}

const setPrivacyCookie = (e) => {
    e.preventDefault();
    modal.classList.add("d-none");
    setCookie("privacy-policy", true, 15);
};

if (privacy) privacy.addEventListener("click", setPrivacyCookie);

// Set cookie
function setCookie(cname, cvalue, exdays) {
    let d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

// Get cookie
function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');

    for (let i = 0; i < ca.length; i++){
        let c = ca[i];
        while (c.charAt(0) === ' '){
            c = c.substring(1);
        }
        if(c.indexOf(name) === 0){
            return c.substring(name.length, c.length);
        }
    }

    return "";
}