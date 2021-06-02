function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * delayInMilliseconds));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

var g_timer;

$(document).ready(function () {
    startTimer();
});

function startTimer() {
    g_timer = window.setTimeout(function () {
        $('#notification').removeClass('appear');
    }, 5000);
}

window.onclick = function (event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");

        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }

    }
    if (!$(event.target).closest('#like_container').length && !$(event.target).is('#like_container')) {
        modal_like.classList.remove("modal_light");
    }
    if (!$(event.target).closest('#dislike_container').length && !$(event.target).is('#dislike_container')) {
        modal_dislike.classList.remove("modal_light");
    }

}