document.addEventListener("DOMContentLoaded", function () {
    function setupSearchableDropdown(searchInputId, dropdownId) {
        const searchInput = document.getElementById(searchInputId);
        const dropdown = document.getElementById(dropdownId);
        const dropdownContainer = searchInput.closest(".dropdown-container");

        // Show the search bar and dropdown options when the dropdown is clicked
        dropdown.addEventListener("click", function () {
            searchInput.classList.remove("d-none");
            searchInput.focus(); // Focus on the search bar
        });

        // Hide the search bar when clicking outside the dropdown container
        document.addEventListener("click", function (event) {
            if (!dropdownContainer.contains(event.target)) {
                searchInput.classList.add("d-none");
                dropdown.selectedIndex = 0; // Reset dropdown selection
            }
        });

        // Filter dropdown options based on search input
        searchInput.addEventListener("input", function () {
            const filter = searchInput.value.toLowerCase();
            const options = dropdown.querySelectorAll("option");

            options.forEach(option => {
                const text = option.textContent.toLowerCase();
                if (text.includes(filter) || option.value === "") {
                    option.style.display = ""; // Show matching options
                } else {
                    option.style.display = "none"; // Hide non-matching options
                }
            });
        });
    }

    // Apply the searchable dropdown functionality
    setupSearchableDropdown("teacherSearch", "teacher");
    setupSearchableDropdown("classSearch", "class");
    setupSearchableDropdown("subjectSearch", "subject");
});