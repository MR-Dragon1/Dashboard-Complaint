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

// theme switcher
function applyTheme(theme) {
    $("body").removeClass("dark-theme light-theme");
    $("body").addClass(theme);
    if ($(".theme-selector").hasClass("show")) {
        $(".theme-selector").toggleClass("show");
    }
    localStorage.setItem("supportpng_theme", theme);
}

$(document).ready(function () {});

// smooth scroll
$(document).ready(function () {
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

    $(".light").click(() => applyTheme("light-theme"));
    $(".dark").click(() => applyTheme("dark-theme"));
    applyTheme(localStorage.getItem("supportpng_theme") || "dark-theme");
});
