<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css" rel="stylesheet">

</head>

<body>

    <section class="calendar section">
        <div class="calendar-title-box">
            Kalender Peminjaman
        </div>
        <div id="calendar"></div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>

    <style>
        #calendar {
            max-width: 85%;
            /* Resize calendar to smaller width */
            margin: 20px auto;
            margin-top: 50px;
        }

        .calendar-title-box {
            border: 2px solid #0d6efd;
            /* Outline biru */
            border-radius: 8px;
            padding: 10px 16px;
            display: inline-block;
            /* Agar kotaknya hanya selebar teks */
            font-weight: bold;
            font-size: 1.2rem;
            background-color: #ffffff;
            color: #0d6efd;
            margin-bottom: 1rem;
        }
    </style>

</body>

</html>