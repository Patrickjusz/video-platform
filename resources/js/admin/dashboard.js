const ADMIN_PATH = "api/datatable";

$(function() {
    var table = $(".data-table-video").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: ADMIN_PATH,
            type: "GET",
            beforeSend: function(request) {
                request.setRequestHeader("X-Authorization", API_KEY);
            }
        },
        oLanguage: {
            sUrl: "lang/datatable-polish.json"
        },
        columns: [
            { data: "thumb_html", name: "thumb_html" },
            { data: "name", name: "name" },
            { data: "description_short", name: "description_short" },
            { data: "slug", name: "slug" },
            { data: "created_at_format", name: "created_at_format" },
            { data: "state", name: "state" },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false
            }
        ]
    });

    if ($(".hide-3s").length) {
        setTimeout(function() {
            $(".hide-3s").hide(500);
        }, 3000);
    }
});
