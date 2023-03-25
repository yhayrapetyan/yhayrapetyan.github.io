function updateAction() {

    let form = document.getElementById("my-form");
    let select = document.getElementById("tables");
    form.action = select.options[select.selectedIndex].value;
}
function confirmDelete(selector) {
    document.querySelector(selector).addEventListener('submit', function(event) {
        if (!confirm("Are you sure you want to delete this item?")) {
            event.preventDefault();
        }
    });
}

