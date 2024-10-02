document.getElementById('search').addEventListener('input', function() {
    var searchValue = this.value.toLowerCase();
    var rows = document.querySelectorAll('#submissionsTable tbody tr');
    rows.forEach(function(row) {
        var columns = row.querySelectorAll('td');
        var showRow = false;
        columns.forEach(function(column) {
            if (column.textContent.toLowerCase().includes(searchValue)) {
                showRow = true;
            }
        });
        row.style.display = showRow ? '' : 'none';
    });
});

