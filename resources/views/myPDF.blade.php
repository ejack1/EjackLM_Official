<!DOCTYPE html>
<html>
<head>
    <title>Hi</title>
</head>
<body>
    <h1 style="margin: auto; margin-left:25%;">RPO DETAILS:</h1>
    <hr>
    <div class="" style="margin: auto; margin-left:25%;">
        <h2>Unique ID : {{ $title }}</h2>
        <h2>Date : {{ $date }}</h2>
        <h2>City : {{ $city }}</h2>
        <h2>Route Code : {{ $route }}</h2>
        <h2>Driver : {{ $driver }}</h2>
        <h2>Supplier : {{ $supplier }}</h2>
        <h2>Status : ( {{ $status_done }} / {{$status_total}} )</h2>
    </div>


    {{-- <h2>UNIQUE ID IMAGE:</h2> --}}
    {{-- <img src="images/{{$unique_id_pic}}" width="150px" alt="IMG"> --}}



    {{-- <h2>Date : {{ $date }}</h2> --}}
    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> --}}
</body>
</html>