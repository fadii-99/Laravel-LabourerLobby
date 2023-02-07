<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complain</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">

    <style>
        .complain_box {
            display: flex;
            flex-direction: column;
            align-items: flex-start;

        }

        input {
            width: 500px;
            height: 25px;
            border-radius: 6px;
            /* margin-left: 10%; */
        }
        
        textarea {
            border-radius: 6px;
            /* margin-left: 10%; */
            width: 500px;
            
        }
        
        .complain_body {
            /* width: 80%; */
            /* margin: 3% auto; */
            box-shadow: 0 5px 10px 2px rgb(167, 164, 164);
            background: rgba(255, 255, 255, 0.856);
            /* padding: 30px 10px; */
            height: 700px;
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
                    <li><a class="effect" href="{{ URL::to('index') }}">HOME</a></li>
                    <li><a class="effect" href="{{ URL::to('lobby') }}">LOBBY</a></li>
                    <li><a class="effect" href="{{ URL::to('login') }}">Login</a></li>
                    <li><a class="effect" href="{{ URL::to('signup') }}">Signup</a></li>
                </ul>
            </nav>
        </div>
    </header>


    <section class="showcase" style="background-image:url('images/bg2.jpg');opacity:1;">
        <div class="complain_body container-reg mar">
            <div class="top "id="tct">
                <h2 class="h1">COMPLAIN BOX</h2>
                <p>CONTACT US FOR YOUR QUERIES</p>
            {{-- </div>

            <div class="complain_box"> --}}

                <form action="{{URL::to('/complainsout')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <br>
                    <br>
                    <br>
            
                    <input  type="email" name="email" placeholder="Enter Your Email"
                        width="200px"><br><br>
                    <input id="tct" type="text" name="complainSubject" placeholder="Enter The Subject of Complain"
                        width="200px"><br><br>

                    <textarea id="tct" name="complainBody" id="" cols="100" rows="10"></textarea>
                    
                    <div class="action-btn">
                        <button class="form-btn">SUBMIT</button>
                    </div>

                </form>



            </div>

        </div>
    </section>








    <footer>
        <p>Muhammad Fawad &copy; SP20-BCS-122</p>
        <p>Haseeb Shah &copy; SP20-BCS-123</p>
    </footer>






</body>

</html>