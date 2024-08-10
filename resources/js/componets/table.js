// resources/js/table.js

document.addEventListener('DOMContentLoaded', function() {
    const rowsPerPage = 5;
    let currentPage = 1;

    const table = document.querySelector('table');
    const rows = Array.from(table.querySelectorAll('tbody tr'));
    const totalRows = rows.length;
    const totalPages = Math.ceil(totalRows / rowsPerPage);

    const prevButton = document.querySelector('#prevButton');
    const nextButton = document.querySelector('#nextButton');
    const pageNumbers = document.querySelector('#pageNumbers');

    function renderTable() {
        rows.forEach((row, index) => {
            row.style.display = (index >= (currentPage - 1) * rowsPerPage && index < currentPage * rowsPerPage) ? 'table-row' : 'none';
        });

        pageNumbers.textContent = `${currentPage} / ${totalPages}`;

        prevButton.disabled = currentPage === 1;
        nextButton.disabled = currentPage === totalPages;
    }

    function prevPage() {
        if (currentPage > 1) {
            currentPage--;
            renderTable();
        }
    }

    function nextPage() {
        if (currentPage < totalPages) {
            currentPage++;
            renderTable();
        }
    }

    prevButton.addEventListener('click', prevPage);
    nextButton.addEventListener('click', nextPage);

    renderTable();
});
