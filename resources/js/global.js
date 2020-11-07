$sidebar = $("#sidebar");
$sidebarCollapse = $("#sidebarCollapse");
windowWidth = $(window).width();

$(function() {
    $($sidebarCollapse).on("click", function() {
        if ($($sidebar).toggleClass("active").hasClass("active")) {
            $($sidebarCollapse).addClass("rotate180");
        } else {
            $($sidebarCollapse).removeClass("rotate180");
        }
    });

    if (windowWidth <= 768) {
        $($sidebar).removeClass("active");
    }

    AOS.init();
});
