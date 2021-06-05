// parse translateX value to number
function parseValue(value) {
    return Number(value.replace(/[^-?\d.]/g, ''));
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
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

function btnAffect() {
    let btns = document.querySelectorAll('.btn-active'); // get element of active buttons

    for (let btn of btns) {
        btn.addEventListener('mousedown', () => {
            btn.classList.add('btn-down');
            btn.classList.remove('btn-up');
        })

        btn.addEventListener('mouseup', () => {
            btn.classList.remove('btn-down');
            btn.classList.add('btn-up');
        })
    }
}

btnAffect();

// create dark mode button
function darkMode() {
    const toggleSwitch = document.querySelector('.toggle input[type="checkbox"]');
    const currentTheme = localStorage.getItem('theme');

    if (currentTheme) {
        document.documentElement.setAttribute('data-theme', currentTheme);
        if (currentTheme === 'dark') {
            toggleSwitch.checked = true;
        }
    }

    toggleSwitch.addEventListener('change', (e) => {
        if (e.target.checked) {

            document.documentElement.setAttribute('data-theme', 'dark');
            localStorage.setItem('theme', 'dark');
        } else {

            document.documentElement.setAttribute('data-theme', 'light');
            localStorage.setItem('theme', 'light');
        }
    });
}

darkMode();

// show animated button
function showAnimatedBtn() {
    let btn = document.querySelector('.toggle'); // get element of toggle button
    let isShow = false;
    screenWidth = window.screen.width; // get screen width

    document.addEventListener('mousemove', (e) => {
        if (e.pageX >= screenWidth - 5) {
            btn.style.opacity = 1;
            btn.style.transform = `translateX(0)`;
        }

        if (e.pageX <= screenWidth - 400) {
            btn.style.opacity = 1;
            btn.style.transform = `translateX(calc(100% + 10px))`;
        }
    })

}

showAnimatedBtn();


// Close the dropdown if the user clicks outside of it

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

    if (!event.target.matches('.fa-ellipsis-v')) {
        var fea_dropdown = document.getElementsByClassName("fea-dropdown");
        var j;
        for (j = 0; j < fea_dropdown.length; j++) {
            var openDropdown2 = fea_dropdown[j];
            if (openDropdown2.classList.contains('visible')) {
                openDropdown2.classList.remove('visible');
                openDropdown2.classList.add('hidden');
            }
        }
        var x = document.getElementsByClassName('fea-video-options');
        var i;
        for (i = 0; i < x.length; i++) {
            var removeDot = x[i];
            if (removeDot.classList.contains('noHover')) {
                removeDot.classList.remove('noHover');
            }
        }
        var y = document.getElementsByClassName('vid-video-options');
        var k;
        for (k = 0; k < y.length; k++) {
            var removeDot = y[k];
            if (removeDot.classList.contains('noHover')) {
                removeDot.classList.remove('noHover');
            }
        }

        var z = document.getElementsByClassName("main-video-options ");
        var v = document.getElementsByClassName("main-video_dropdown");
        var l;
        for (l = 0; l < z.length; l++) {
            var removeDot = z[l];
            var removeContent =v[l];
            if (removeDot.classList.contains('noHoverFlex')) {
                removeDot.classList.remove('noHoverFlex');
            }
            if (removeContent.classList.contains('visible')) {
                removeContent.classList.remove('visible');
                removeContent.classList.add('hidden');
            }
        }
    }

    var upload_video_modal = document.getElementById("upload-video_modal");
    if (event.target == upload_video_modal) {
        upload_video_modal.style.display = "none";
    }
    var advancedmodal = document.getElementById("advancedModal");
    if (event.target == advancedmodal) {
        advancedmodal.style.display = "none";
        $('#action option').prop('selected', function() {
            return this.defaultSelected;
        });
    }


}
$("div .crip_animate").click(function (e) {

    // Remove any old one
    $(".ripple").remove();

    // Setup
    var posX = $(this).offset().left,
        posY = $(this).offset().top,
        buttonWidth = $(this).width(),
        buttonHeight = $(this).height();

    // Add the element
    $(this).prepend("<span class='ripple'></span>");


    // Make it round!
    if (buttonWidth >= buttonHeight) {
        buttonHeight = buttonWidth;
    } else {
        buttonWidth = buttonHeight;
    }

    // Get the center of the element
    var x = e.pageX - posX - buttonWidth / 2;
    var y = e.pageY - posY - buttonHeight / 2;

    // Add the ripples CSS and start the animation
    $(".ripple").css({
        width: buttonWidth,
        height: buttonHeight,
        top: y + 'px',
        left: x + 'px'
    }).addClass("rippleEffect");

});

function slider() {

    function moveSidebar() {
        let menuBtn = document.querySelector('.header-menu-btn'), // get element of menu button
            largeSidebar = document.querySelector('.sidebar-large'), // get element of large sidebar
            smallSidebar = document.querySelector('.sidebar-small'), // get element of small sidebar
            cardsCtn = document.querySelector('.cards'); // get element of cards container


        menuBtn.addEventListener('click', () => {
            largeSidebar.classList.toggle('closed');
            smallSidebar.classList.toggle('closed');
            cardsCtn.classList.toggle('cards-small');
        })
    }

    moveSidebar();
}

slider();
