document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form[action='controllers/timetable-handler.php']");
    const errorContainer = document.querySelector(".errors");

    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent the default form submission

        const formData = new FormData(form);

        // Send the form data using AJAX
        fetch("controllers/timetable-handler.php", {
            method: "POST",
            body: formData,
        })
            .then((response) => response.json())
            .then((data) => {
                // Clear previous messages
                errorContainer.innerHTML = "";

                if (data.success || data.message.length > 0) {
                    // Display success messages
                    const successMessage = document.createElement("div");
                    successMessage.className = "alert alert-success";
                    successMessage.innerHTML = data.message.join("<br><br>");
                    errorContainer.appendChild(successMessage);
                }

                if (data.errors && data.errors.length > 0) {
                    // Display error messages
                    const errorList = document.createElement("div");
                    errorList.className = "alert alert-danger";
                    data.errors.forEach((error) => {
                        const errorItem = document.createElement("div");
                        errorItem.textContent = error;
                        errorList.appendChild(errorItem);

                        // Add spacing between errors
                        const spacer = document.createElement("br");
                        errorList.appendChild(spacer);
                    });
                    errorContainer.appendChild(errorList);
                }

                // Repopulate the form with submitted data
                if (data.submittedData) {
                    const submittedData = data.submittedData;

                    // Repopulate teacher, class, room, and subject
                    form.querySelector("select[name='teacher']").value = submittedData.teacher;
                    form.querySelector("select[name='class']").value = submittedData.class;
                    form.querySelector("input[name='room']").value = submittedData.room;
                    form.querySelector("select[name='subject']").value = submittedData.subject;

                    // Repopulate schedule checkboxes
                    const schedule = submittedData.schedule;
                    for (const timeSlot in schedule) {
                        for (const day in schedule[timeSlot]) {
                            const checkbox = form.querySelector(
                                `input[name="schedule[${timeSlot}][${day}]"][value="${schedule[timeSlot][day]}"]`
                            );
                            if (checkbox) {
                                checkbox.checked = true;
                            }
                        }
                    }
                }
            })
            // .catch((error) => {
            //     console.error("Error:", error);
            //     const errorMessage = document.createElement("div");
            //     errorMessage.className = "alert alert-danger";
            //     errorMessage.textContent = "An unexpected error occurred. Please try again.";
            //     errorContainer.appendChild(errorMessage);
            // });
    });
});
