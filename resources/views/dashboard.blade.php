<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/js/app.js') <!-- เรียกใช้ Vite -->
</head>
<body>
    <div id="app"></div> <!-- Vue app จะถูก mount ที่ div นี้ -->
</body>
</html>
