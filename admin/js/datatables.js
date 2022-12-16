// Script čeká na načtení DOM
$(document).ready(function () {

  // Volání funkce DataTable na tabulku s identifikátorem #dataTable 
  $('#dataTable').DataTable({
    initComplete: function () {
      this.api()
        // Přidání filtrování do hlavičky tabulky
        .columns([0, 1, 2, 3])
        .every(function () {
          var column = this;          
          var select = $('<select class="form-control"><option value=""></option></select>')
            .appendTo($(column.header()))
            .on('change', function () {
              var val = $.fn.dataTable.util.escapeRegex($(this).val());
              column.search(val ? '^' + val + '$' : '', true, false).draw();
            });
          column.cells('', column[0]).render('display').sort().unique().each(function (d, j) {
            select.append('<option value="' + d + '">' + d + '</option>');
          });
        });
    },
    // Definování funkčnosti tabulky
    scrollY: '50vh',
    scrollX: true,
    paging: false,
    info: false,
    // Přeložení defaultních hlášek do češtiny
    language: {
      zeroRecords: 'Nenalezeny žádné záznamy',
      infoEmpty: 'Nenalezeny žádné záznamy',
      thousands: '.',
      "search": "Hledat:",
    },
  });

  $('#dataTable tbody').on('mouseenter', 'td', function () {
    var colIdx = table.cell(this).index().column;

    $(table.cells().nodes()).removeClass('highlight');
    $(table.column(colIdx).nodes()).addClass('highlight');
});

  $('#configureTable').DataTable({

    scrollY: '50vh',
    scrollX: true,
    scrollCollapse: true,
    paging: false,
    info: false,

    language: {
      zeroRecords: 'Nenalezeny žádné záznamy',
      infoEmpty: 'Nenalezeny žádné záznamy',
      thousands: '.',
      "search": "Hledat:",
    },


  });

});

