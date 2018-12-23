var DatatablesExtensionButtons = {
    init: function() {
        $("#m_table_1").DataTable({
            dom: "<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>\n\t\t\t<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>",
            buttons: ["print", "copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],

        })
    }
};
jQuery(document).ready(function() {
  var table = $("#m_table_1").DataTable({
      dom: "<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>\n\t\t\t<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>",
      buttons: ["print", "copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],
  })

  $(".search-field input").on('keyup change', function() {
        var index = $(this).attr('index');
        // table.column( index).visible( false );

        table.column(index).search(this.value).draw();
  });

  var page_name = $(".admin-page").attr("id");
});
