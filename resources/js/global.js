$sidebar = $("#sidebar");
$sidebarCollapse = $("#sidebarCollapse");
$mobileHeader = $("#mobile-header");
$hamburgerMenu = $("#hamburgerMenu");
$exitMobileNav = $("#mobile-nav-exit");
$searchInput = $("#search-input");
windowWidth = $(window).width();

$(function() {
    $($sidebarCollapse).on("click", function() {
        if (
            $($sidebar)
                .toggleClass("active")
                .hasClass("active")
        ) {
            $($sidebarCollapse).addClass("rotate180");
            $($mobileHeader).fadeOut(250);
        } else {
            $($mobileHeader).fadeIn(250);
            $($sidebarCollapse).removeClass("rotate180");
        }
    });

    if (typeof AOS !== "undefined") {
        AOS.init();
    }

    $(window).on("load resize", function() {
        if ($(this).width() >= 768) {
            $($mobileHeader).hide();
            $($sidebar).addClass("active");
        } else {
            // $($mobileHeader).show();
            // $($sidebar).removeClass("active");
            // $($sidebarCollapse).removeClass("rotate180");
        }
    });

    $($searchInput).autocomplete({
        source: "/search",
        minlength: 1,
        autoFocus: true,
        select: function(e, ui) {
            if (ui.item.id > 0) {
                window.location.href = "/" + ui.item.slug;
            }
        },
        response: function(event, ui) {
            if (!ui.content.length) {
                var noResult = { value: "", label: "Nie znaleziono filmu" };
                ui.content.push(noResult);
            }
        }
    });
});

if (typeof videojs !== "undefined") {
    var player = videojs("main-video", {
        fluid: true
    });

    // player.on("ended", function() {
    //     alert(12);
    // });

    // player.on("play", function() {
    //     alert(12);
    // });
}

$($hamburgerMenu).on("click", function() {
    $("#mobile-nav").fadeIn(300);
});

$($exitMobileNav).on("click", function() {
    $("#mobile-nav").fadeOut(300);
});
