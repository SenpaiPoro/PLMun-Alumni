document.addEventListener('DOMContentLoaded', function() {
    const prevMonthBtn = document.getElementById('prevMonth');
    const nextMonthBtn = document.getElementById('nextMonth');
    const monthYearDisplay = document.getElementById('monthYear');
    const daysContainer = document.getElementById('days');

    let currentDate = new Date();
    let currentMonth = currentDate.getMonth();
    let currentYear = currentDate.getFullYear();

    renderCalendar(currentMonth, currentYear);

    prevMonthBtn.addEventListener('click', function() {
        currentYear = currentMonth === 0 ? currentYear - 1 : currentYear;
        currentMonth = currentMonth === 0 ? 11 : currentMonth - 1;
        renderCalendar(currentMonth, currentYear);
    });

    nextMonthBtn.addEventListener('click', function() {
        currentYear = currentMonth === 11 ? currentYear + 1 : currentYear;
        currentMonth = currentMonth === 11 ? 0 : currentMonth + 1;
        renderCalendar(currentMonth, currentYear);
    });

    function renderCalendar(month, year) {
        const firstDayOfMonth = new Date(year, month, 1);
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        monthYearDisplay.textContent = `${new Intl.DateTimeFormat('en-US', { month: 'long' }).format(firstDayOfMonth)} ${year}`;

        daysContainer.innerHTML = '';

        for (let i = 0; i < firstDayOfMonth.getDay(); i++) {
            const emptyDay = document.createElement('div');
            emptyDay.classList.add('empty');
            daysContainer.appendChild(emptyDay);
        }

        for (let i = 1; i <= daysInMonth; i++) {
            const day = document.createElement('div');
            day.textContent = i;
            daysContainer.appendChild(day);
        }
    }
});
