document.addEventListener("DOMContentLoaded", function() {
    // Inicializa la tabla con DataTables
    const table = new DataTable('#myTable', {
        responsive: true,
        fixedHeader: true,
        columnDefs: [
            { responsivePriority: 1, targets: 4 },
            { responsivePriority: 2, targets: 0 },
            { responsivePriority: 3, targets: 7 },
            { className: "dt-center", targets: "_all" },
            {targets: [0,1,2,3,4,5,6,7], orderable: false}
        ],
        layout: {
            topStart: {
                pageLength: {
                    menu: [10, 20, 30, 40, 50]
                }
            },
            bottomStart: {
                paging: {
                    numbers: 10
                }
            },
            topEnd: {},
            bottomEnd: {}
        },
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json",
            entries: {
                _: 'Actas',
                1: 'Acta'
            }
        }
    });

    // --- Creación de una fila extra en el thead para filtros individuales ---
    const thead = document.querySelector('#myTable thead');
    const filterRow = document.createElement('tr');
    thead.appendChild(filterRow);

    // Especifica los índices de las columnas donde deseas agregar inputs de búsqueda
    const columnasConFiltro = [1,2,3,4,5,6];

    // Por cada columna en el encabezado original, crea una celda en la fila de filtros
    thead.querySelectorAll('tr:first-child th').forEach((th, i) => {
        const filterCell = document.createElement('th');
        if (columnasConFiltro.includes(i)) {
            const input = document.createElement('input');
            input.type = 'text';
            input.className = 'form-control d-none d-md-inline'; // Ocultar en dispositivos pequeños
            input.placeholder = 'Buscar...';
            input.addEventListener('input', function() {
                table.column(i).search(this.value).draw();
            });
            filterCell.appendChild(input);
        }
        filterRow.appendChild(filterCell);
    });
});