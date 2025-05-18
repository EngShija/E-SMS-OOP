document.addEventListener("DOMContentLoaded", function () {
  // Handle Delete Button Click
  document.querySelectorAll(".delete-entry").forEach((button) => {
    button.addEventListener("click", function () {
      const id = this.dataset.id;
      console.log("Delete button clicked. ID:", id); // Debugging

      if (confirm("Are you sure you want to delete this entry?")) {
        fetch("controllers/delete-timetable.php", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({ id }),
        })
          .then((response) => response.json())
          .then((data) => {
            console.log("Response from server:", data); // Debugging
            if (data.success) {
              alert(data.message);
              const cell = this.closest("td");
              cell.innerHTML = "<em>---</em>"; // Update the table dynamically
            } else {
              alert(data.message);
            }
          })
          .catch((error) => {
            console.error("Error:", error); // Debugging
            alert("An error occurred while deleting the entry.");
          });
      }
    });
  });
});

document
  .getElementById("print-timetable")
  .addEventListener("click", function () {
    // Hide action buttons
    const actionButtons = document.querySelectorAll(
      ".edit-entry, .delete-entry, .print-button, .header-main, .profile-header, .footer"
    );
    actionButtons.forEach((button) => (button.style.display = "none"));

    // Print the timetable
    window.print();

    // Restore action buttons after printing
    actionButtons.forEach((button) => (button.style.display = "inline-block"));
  });
