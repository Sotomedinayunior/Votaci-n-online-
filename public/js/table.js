function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    var noResultsRow = document.getElementById("noResults");

    var resultsFound = false;

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1]; // Columna de Nombre

        if (td) {
            txtValue = td.textContent || td.innerText;

            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
                resultsFound = true;
            } else {
                tr[i].style.display = "none";
            }
        }
    }

    if (!resultsFound) {
        noResultsRow.style.display = "";
    } else {
        noResultsRow.style.display = "none";
    }
}
