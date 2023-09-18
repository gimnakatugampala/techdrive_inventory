document.addEventListener("DOMContentLoaded", function () {
    const categorySelect = document.getElementById("selectCat");

    // Function to load categories using AJAX
    function loadCategories() {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "../pages/alllist/cat.php", true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const categories = JSON.parse(xhr.responseText);
                populateCategorySelect(categories);
            }
        };
        xhr.send();
    }

    // Function to populate the select tab
    function populateCategorySelect(categories) {

        categories.forEach(function (category) {
            const option = document.createElement("option");
            option.value = category.id;
            option.textContent = category.catname;
            categorySelect.appendChild(option);
        });
    }

    loadCategories();
});