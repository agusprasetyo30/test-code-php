<?php
    $title = "Soal 3 - Modul 4";
    
    include_once(__DIR__ . '/../../../app/data/Karyawan.php');    

    include_once('../../layouts/header.php'); 
    
    $karyawan = new Karyawan();

?>
<link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>

<style>
    a {
        color: inherit;
        text-decoration: none;
        background-color: transparent;
    }
</style>

<div class="container">
    <div class="row justify-content-center" style="margin-top: 90px;">
        <div class="col-12">
            <div style="display: flex;justify-content: space-between;align-items: center;">

                <h1 class="fs-4 ">Soal 3 - Modul 3</h1>
                
                <a href="../"  class="btn btn-sm btn-warning mb-2 float-end">Kembali</a>
            </div>
            <div class="card">
                <div class="card-body">

                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    // include_once('../../layouts/footer.php');
?>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
            navLinks: true,
            businessHours: true,
            dayMaxEvents: true,
            eventColor: 'green',
            events: 'get-event.php',
            dateClick: function(info) {
                var get_name = info.dayEl.textContent.replace(/^\d+/, '')
                var parts = info.dateStr.split('-')
                var month = parts[1]; // Month (0-based, i.e., January is '01')
                var day = parts[2];   // Day

                var clickedDate = info.dateStr; // Get the clicked date in YYYY-MM-DD format
                    
                if (get_name != '') {
                    // Fetch birthday data for the clicked date from API
                    fetch(`./get-event-details.php?name=${get_name}&month=${month}&day=${day}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.length > 0) {
                                // digunakan untuk menampilkan alert yang berisi data karyawan yang ulang tahun
                                let details = "Employees with birthdays on " + day + ' ' + changeMonth(month) + ":\n\n";
                                data.forEach(item => {
                                    details += `Nama : ${item.title}\nDepartment : ${item.department}\nTelp : ${item.telp}`;
                                });

                                alert(details); // menampilkan data nama, department, telp  
                            } else {
                                alert('No birthdays on this date.');
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching birthday details:', error);
                        });
                }
            },
            datesSet: function(info) {
                    var currentStart = info.view.currentStart;
                    var currentEnd = info.view.currentEnd;

                    // Fetch birthday data
                    fetch('./get-event.php')
                        .then(response => response.json())
                        .then(birthdays => {
                            birthdays.forEach(function(birthday) {
                                // Get data
                                var birthdayDate = new Date(birthday.start);
                                var birthdayMonth = birthdayDate.getMonth();
                                var birthdayDay = birthdayDate.getDate();

                                var cells = document.querySelectorAll('.fc-daygrid-day'); // Get all day cells in the calendar

                                cells.forEach(function(cell) {
                                    var cellDate = new Date(cell.getAttribute('data-date'));
                                    if (cellDate.getMonth() === birthdayMonth && cellDate.getDate() === birthdayDay) {
                                        cell.style.backgroundColor = 'lightgreen'; // Merubah background sesuai ulang tahun
                                        
                                        // Menambahkan nama karyawan ke class .fc-daygrid-day-events
                                        var eventContainer = cell.querySelector('.fc-daygrid-day-events');
                                        if (eventContainer) {
                                            // menghapus label nama sebelum ditambahkan, hal ini untuk mengantisipasi penumpukan data 
                                            var existingNames = eventContainer.querySelectorAll('.birthday-name');
                                            existingNames.forEach(function(existingName) {
                                                existingName.remove();
                                            });

                                            // digunakan untuk menampilkan nama didalam kalendar
                                            var nameDiv = document.createElement('div');
                                            nameDiv.className = 'birthday-name';
                                            nameDiv.style.textAlign = 'center';
                                            nameDiv.style.fontSize = 'small';
                                            nameDiv.innerText = birthday.title;
                                            eventContainer.appendChild(nameDiv);
                                        }
                                    }
                                });
                            });
                        });
                }
        });
        calendar.render();
    });

    function changeMonth(month) {
        switch (month) {
            case '01':
                return 'January' 
                break;
            case '02':
                return 'February' 
                break;
            case '03':
                return 'March' 
                break;
            case '04':
                return 'April' 
                break;
            case '05':
                return 'May' 
                break;
            case '06':
                return 'June' 
                break;
            case '07':
                return 'July' 
                break;
            case '08':
                return 'August' 
                break;
            case '09':
                return 'September' 
                break;
            case '10':
                return 'October' 
                break;
            case '11':
                return 'November' 
                break;
            case '12':
                return 'December' 
                break;
        }
    }
</script>