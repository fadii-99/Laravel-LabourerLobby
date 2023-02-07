<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Hirer Profile</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">

</head>

<body>

    <header>
        <div class="container">
            <div class="logo">
                <h1>LABOUR LOBBY</h1>
            </div>
            <nav>
                <ul>
                    <li><a class="effect" href="{{ URL::to('complain') }}">COMPLAIN</a></li>
                    <li><a class="effect" href="{{ URL::to('user-login') }}">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>






    <section class="showcase" style="background-image:url('images/bg2.jpg');opacity:1;">
        <div class="container container-profile  mar">
            <div class="left">
                <div class="user-dp">
                    <img src="{{ asset('images/user-dp.jpg') }}">
                    <br><br>
                    <form class="formsp" action="{{ route('uploadH') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="upload-btn-wrapper">
                            <button class="btn">Choose Photo</button>
                            <input type="file" name="file" />
                        </div>
                        <div class="upload-btn-wrapper">
                            <button
                                style="padding: 5px 10px;border:2px solid orangered;
                                    border-radius:8px;">Upload</button>
                        </div>
                        <input style="position:absolute; z-index:-1; display:hidden;" type="email" name="te"
                            value="{{ $hirer }}">
                        <br><br>
                    </form>

                    <br>
                    <br>
                </div>
            </div>

            <div class="right">

                <div class="box form">
                    <form action="{{ URL::to('addDetails/') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="section">
                            <div class="data" id="sec1">

                                <h2>PERSONAL INFORMATION</h2>

                                <input type="text" name="name" placeholder="Full Name">
                                <input type="text" name="cnic" placeholder="CNIC">

                                <input type="text" placeholder="Date of birth" onfocus="(this.type='date')"
                                    onfocusout="(this.type='text')" name="dob">

                                <select name="gender">
                                    <option>Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>

                                <select name="city">
                                    <option>Select City</option>
                                    @foreach ($city as $c)
                                        <option value="{{ $c->id }}">{{ $c->city_name }}</option>
                                    @endforeach
                                </select>

                                <input type="text" name="address" placeholder="Address">

                                <input type="number" name="phone" placeholder="Phone no">
                                <input type="email" name="email" placeholder="Email" value={{ $hirer }}>

                            </div>

                            <button id="btn2" class="signup-btn">
                                Add Details
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>








    <footer>
        <p>Muhammad Fawad &copy; SP20-BCS-122</p>
        <p>Haseeb Shah &copy; SP20-BCS-123</p>
    </footer>





</body>

</html>
