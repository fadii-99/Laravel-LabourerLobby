<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Home</title>
    <link rel="stylesheet" href="{{url('css/style.css')}}">

</head>
<body>

    <header>
        <div class="container">
            <div class="logo">
                <h1>LABOUR LOBBY</h1>
            </div>
            <nav>
                <ul>
                </ul>
            </nav>
        </div>
    </header>



    <section class="showcase" style="opacity:1; background-image: url('{{ asset('images/bg2.jpg')}}');">
        <div class="container confirmtab mar">
                <h1>Hire Confirmation Tab</h1>
            <hr>
            <br>
            <br>
            <br>
            
            <div class="labour-deail">
                <table align="center">
                    <tr>
                        <td>Worker Name : </td>
                        <td>{{$worker->name}}</td>
                    </tr>
                    <tr>
                        <td>Address : </td>
                        <td>{{$worker->address}}</td>
                    </tr>
                    <tr>
                        <td>Work Detail : </td>
                        <td>{{$worker->prof->profession_name}}</td>
                    </tr>                  
                    <tr>
                        <td>Experience : </td>
                        <td>{{$worker->work_exp}} Years</td>
                    </tr>                  
                    <tr>
                        <td>Timings : </td>
                        <td>{{$worker->work_time}}</td>
                    </tr>                  
                </table>
                <div class="action-btn">
                    <a class="form-btn" href="{{URL::to('requesthire/'.$worker->email)}}">CONFIRM</a>
                </div>
            </div>

    </section>












    <footer>
        <p>Muhammad Fawad &copy; SP20-BCS-122</p>
        <p>Haseeb Shah &copy; SP20-BCS-123</p>
    </footer>





    
</body>
</html>