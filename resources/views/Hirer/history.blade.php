<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- <link rel="stylesheet" href="{{ url('css/style.css') }}"> --}}
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

    <style>
        body {
    padding: 0;
    margin: 0;
    background-color: #f4f4f4;
    height: 100vh;
    /* min-width: 400px; */
    font-family: Verdana, Geneva, Tahoma, sans-serif;
}

.container {
    width: 80%;
    margin: auto;
    overflow: hidden;
    z-index: 999;
    padding: 20px 0;
}
.mar {
    margin: 4% auto;
    /* height: 70vh; */
    border-radius: 20px;
}

ul {
    margin: 0;
    padding: 0;
}

a {
    color: black;
    text-decoration: none;
}

.effect::after {
    content: '';
    display: block;
    width: 0;
    height: 2px;
    background: black;
    transition: width .5s;
}

.effect:hover::after {
    width: 100%;
    transition: width .5s;
}

/* HEADER  */
header {
    background: #efff5d;
    /* background:#35424a; */
    color: #ffffff;
    padding-top: 20px;
    min-height: 70px;
    border-bottom: #e8491d 3px solid;
    box-shadow: 0 5px 10px 2px gray;
}

header a {
    /* color:#ffffff; */
    text-transform: uppercase;
    font-size: 14px;
    text-decoration: none;
    color: black;
}

header li {
    float: left;
    display: inline;
    padding: 0 20px 0 20px;
}

header .logo {
    float: left;
}

header .logo h1 {
    margin: 0;
    letter-spacing: 3px;
    font-size: 20px;
    color: black;
}

header nav {
    float: right;
    margin-top: 10px;
}
.showcase {
    padding: 45px 15px;
    /* min-height: 400px; */
    background-image: no-repeat right center;
    background-size: cover;
    background-blend-mode: hard-light;
    text-align: center;
    color: rgb(170, 31, 31);
    padding-bottom: 10px;
}
.showcase h1 {
    /* margin-top:120px; */
    font-weight: bolder;
    font-size: 55px;
    margin-bottom: 10px;
    letter-spacing: 5px;
    word-spacing: 10px;
    color: #e8491d;
}
.showcase p {
    font-size: 19px;
    color: white;
}

.history {
    width: 80%;
    box-shadow: 0 5px 10px 2px rgb(167, 164, 164);
    background: rgba(255, 255, 255, 0.856);
    padding: 30px 10px;
    border-radius: 20px;
}

a{
    
}



/* FOOTER  */
footer {
    padding: 20px;
    /* height: 10vh; */
    color: #ffffff;
    background: #35424a;
    /* background-color:#e8491d; */
    text-align: center;
}
    </style>




</head>

<body>

    <header>
        <div class="container">
            <div class="logo">
                <h1>LABOUR LOBBY</h1>
            </div>
            <nav>
                <ul>
                    <li><a style="text-decoration:none; color:black;" class="effect" href="/profileh">{{ session('hirer')['name'] }}</a></li>
                    <li><a style="text-decoration:none; color:black; class="effect" href="{{ URL::to('lobby') }}">LOBBY</a></li>
                    <li><a style="color: black; text-decoration:none;" class="effect" href="{{ URL::to('complain') }}">COMPLAIN</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="showcase" style="background-image:url('images/bg2.jpg');opacity:1;">
        <div class="container mar history" style="opacity:1;">
            <div class="top">
                <h1 class="h1">History</h1>
                <p style="color:black;">List of Workers You Hired</p>
            </div>
            <hr style="width: 80%">
            <br>
            <fieldset>
                @php
                    $i = 1;
                @endphp
                <table id="EmpTable" class="table table-striped table-responsive table-bordered">
                    <thead style="background-color:#e8491d; color:white;">
                        <tr >
                            <th>No.</th>
                            <th>Worker Name</th>
                            <th>Profession</th>
                            <th>Date</th>
                            <th>Hired Time</th>
                            <th>completed Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody style="color:black;">
                        @foreach ($HH as $el)
                            <tr>
                                <td>{{ $i++ }}.</td>
                                <td>{{ $el->worker->name }}</td>
                                <td>{{ $el->worker->prof->profession_name }}</td>
                                <td>{{ $el->date }} </td>
                                <td>{{ $el->hired_time }} </td>
                                <td>{{ $el->completed_time }} </td>
                                <td>
                                    @if ($el->status == 1)
                                        
                                    @endif
                                    @if ($el->status == 0)
                                    <a href="{{ URL::to('hire/' .$el->email ) }}" 
                                        class="btn btn-outline btn-primary btn-sm"><i class="fa fa-hire-a-helper">H</a>
                                    @endif
                                    &nbsp;
                                    <a href="{{URL::to('deletehistory/'.$el->id)}}" class="btn btn-outline btn-danger btn-sm"
                                        onclick="return confirm ('Are you sure to delete this record')"
                                        title="Delete"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </fieldset>
            <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-
                            pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
            <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#EmpTable').DataTable({
                        "pagingType": "full_numbers",
                        "lengthMenu": [
                            [2, 4, 10, 25, 50, -1],
                            [2, 4, 10, 25, 50, "All"]
                        ],
                        responsive: true,
                        language: {
                            search: "_INPUT_",
                            searchPlaceholder: "Search",
                        }
                    });
                });
            </script>
        </div>
    </section>











    <footer>
        <p>Muhammad Fawad &copy; SP20-BCS-122</p>
        <p>Haseeb Shah &copy; SP20-BCS-123</p>
    </footer>






</body>

</html>
