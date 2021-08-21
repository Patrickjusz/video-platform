const ADMIN_PATH = "admin";

$(function() {
    var table = $(".data-table-video").DataTable({
        processing: true,
        serverSide: true,
        ajax: ADMIN_PATH,
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
});