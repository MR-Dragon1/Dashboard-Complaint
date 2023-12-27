/*!
=========================================================
* Dorang Landing page
=========================================================

* Copyright: 2019 DevCRUD (https://devcrud.com)
* Licensed: (https://devcrud.com/licenses)
* Coded by www.devcrud.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
*/

function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    let name = cname + "=";
    let ca = document.cookie.split(";");
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == " ") {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

// theme switcher
function applyTheme(theme) {
    // remove theme class
    $("body").removeClass("dark-theme light-theme");
    // add selected theme class
    $("body").addClass(theme);
    // toggle side switcher
    if ($(".theme-selector").hasClass("show")) {
        $(".theme-selector").removeClass("show");
    }
    // save theme
    setCookie("supportpng_theme", theme, 365);
}

$(document).ready(function () {
    // smooth scroll
    $(".navbar .nav-link").on("click", function (event) {
        if (this.hash !== "") {
            event.preventDefault();

            var hash = this.hash;

            $("html, body").animate(
                {
                    scrollTop: $(hash).offset().top,
                },
                700,
                function () {
                    window.location.hash = hash;
                }
            );
        }
    });

    // toggle
    $(".search-toggle").click(function () {
        $(".search-wrapper").toggleClass("show");
    });

    $(".modal-toggle").click(function () {
        $(".modalBox").toggleClass("show");
    });

    $(".modalBox").click(function () {
        $(this).removeClass("show");
    });

    $(".spinner").click(function () {
        $(".theme-selector").toggleClass("show");
    });

    // theme switcher listener
    $(".light").click(() => applyTheme("light-theme"));
    $(".dark").click(() => applyTheme("dark-theme"));
    applyTheme(getCookie("supportpng_theme") ?? "dark-theme");
});
