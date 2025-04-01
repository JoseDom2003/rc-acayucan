let table = new DataTable('#myTable', {
    columnDefs: [
        { className: "dt-center", targets: "_all" }
    ],
    responsive: true,
    layout:{

        topStart: {
            pageLength: {
                menu: [10,20,30,40,50]
            }
        },
        
        bottomStart: {
            paging: {
                numbers: 10
            }
        },

        topEnd: {
            search: {
                placeholder: 'Inserta un campo'
            }
        },

        bottomEnd: {
            
        }
    },
    language: {
        url: "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json",
        entries: {
            _: 'Actas',
            1: 'Acta'
        }
    }
});
