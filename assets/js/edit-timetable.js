function redirectToEditPage(button) {
    const id = button.dataset.id;
    const teacher = button.dataset.teacher;
    const classId = button.dataset.class;
    const room = button.dataset.room;
    const subject = button.dataset.subject;
    const day = button.dataset.day;
    const timeSlot = button.dataset.timeSlot;

    // Construct the query string
    const queryString = new URLSearchParams({
        id,
        teacher,
        class: classId,
        room,
        subject,
        day,
        timeSlot
    }).toString();

    // Redirect to edit-timetable.php
    window.location.href = `dashboard.php?editTimetable&${queryString}`;
}