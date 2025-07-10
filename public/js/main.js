document.getElementById("sidebarToggle").addEventListener("click", function () {
    let sidebar = document.getElementById("sidebar");

    if (sidebar.classList.contains("show")) {
        sidebar.classList.remove("show");
    } else {
        sidebar.classList.add("show");
    }
});
let currentDate = new Date(2025, 0); 
let events = {
    0: [{ date: 1, title: "New Year's Day" }, { date: 5, title: "Kashmir Day" }],
    2: [{ date: 23, title: "Pakistan Day" }],
    7: [{ date: 14, title: "Independence Day" }],
    10: [{ date: 9, title: "Iqbal Day" }],
    2: [{ date: 23, title: "Pakistan Day" }],
    11: [{ date: 25, title: "Quaide-Azam Day" }]
};

function renderCalendar() {
    const monthYear = document.getElementById("monthYear");
    const calendarBody = document.getElementById("calendarBody");
    calendarBody.innerHTML = "";

    let firstDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1).getDay();
    let daysInMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0).getDate();

    monthYear.innerText = currentDate.toLocaleString('default', { month: 'long', year: 'numeric' });
    document.getElementById("monthSelector").value = currentDate.getMonth();

    let date = 1;
    for (let i = 0; i < 6; i++) {
        let row = document.createElement("tr");
        for (let j = 0; j < 7; j++) {
            let cell = document.createElement("td");

            if (i === 0 && j < (firstDay === 0 ? 6 : firstDay - 1)) {
                cell.innerText = "";
            } else if (date > daysInMonth) {
                break;
            } else {
                cell.innerText = date;
                cell.classList.add("calendar-box");
                addEventToCell(cell, date);
                date++;
            }
            row.appendChild(cell);
        }
        calendarBody.appendChild(row);
    }
}

function addEvent() {
    let eventDate = parseInt(prompt("Enter the date for the event (1-31):"));
    let eventTitle = prompt("Enter the event title:");
    let month = currentDate.getMonth();

    if (eventDate && eventTitle) {
        if (!events[month]) {
            events[month] = [];
        }
        events[month].push({ date: eventDate, title: eventTitle });
        renderCalendar();
        console.log(`Event added on ${eventDate}: ${eventTitle}`);
    }
}

function addEventToCell(cell, date) {
    let month = currentDate.getMonth();
    let monthEvents = events[month] || [];
    let event = monthEvents.find(event => event.date === date);

    if (event) {
        let eventDiv = document.createElement("div");
        eventDiv.classList.add("event");
        eventDiv.innerText = event.title;
        cell.appendChild(eventDiv);
    }
}

function changeMonth() {
    let selectedMonth = document.getElementById("monthSelector").value;
    currentDate.setMonth(selectedMonth);
    renderCalendar();
}

document.addEventListener("DOMContentLoaded", renderCalendar);
