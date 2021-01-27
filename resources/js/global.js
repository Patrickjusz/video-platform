$sidebar = $("#sidebar");
$sidebarCollapse = $("#sidebarCollapse");
$mobileHeader = $("#mobile-header");
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
            $($mobileHeader).show();
            $($sidebar).removeClass("active");
            $($sidebarCollapse).removeClass("rotate180");
        }
    });
});

if (typeof videojs !== "undefined") {
    videojs("main-video", {
        fluid: true,
        controlBar: {
            children: [
                "playToggle",
                "volumeMenuButton",
                "durationDisplay",
                "timeDivider",
                "currentTimeDisplay",
                "progressControl",
                "remainingTimeDisplay",
                "fullscreenToggle"
            ]
        }
    });
}
