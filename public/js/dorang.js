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

if (!localStorage.supportpng_theme) {
    localStorage.setItem("supportpng_theme", "dark-theme");
}

// theme switcher
function applyTheme() {
    let theme = localStorage.getItem("supportpng_theme");
    if (theme.includes("dark")) {
        $("body").addClass("light-theme");
        $("body").removeClass("dark-theme");
        theme = "light-theme";
    } else {
        $("body").addClass("dark-theme");
        $("body").removeClass("light-theme");
        theme = "dark-theme";
    }
    localStorage.setItem("supportpng_theme", theme);
}

// toggle
$(document).ready(function () {
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
    $(".light").click(function () {
        applyTheme("light-theme");
    });
    $(".dark").click(function () {
        applyTheme("dark-theme");
    });
});

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

    // anonymous fn default theme
    applyTheme();
});
