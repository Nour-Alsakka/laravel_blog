<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">

    <title>Document</title>
    <style>
        form {
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            flex-direction: column;
        }

        .col-6 {
            height: 100%;
            padding: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        h3 {
            margin-bottom: 20px;
        }

        .div-flex {
            padding: 30px;
        }

        input {
            width: 100%;
        }

        .grad {
            background: linear-gradient(to right, #e78123, #e76, #d23);
        }

        body {
            background: #ccc;
            border-radius: 10px;

        }
    </style>
</head>

<body>
    <div class="container h-100 py-5">
        <div class="row">
            <div class="col-6" style="border-radius: 10px 0 0 10px;background-color: white; height:80vh">
                <div class="div-flex">
                    <div>
                        <img src="{{asset('images/tcpc.jpg')}}" style="text-align:center;width: 80px; margin-bottom:30px" alt="">
                        <h3 style="text-align:center">We are The Laravel Team</h3>
                        <p style="margin-bottom:20px">Please login to your accuont</p>
                    </div>
                    <form action="" class="align-center d-flex ">
                        <label for="">username</label>
                        <input style="margin-bottom:20px" type="text" placeholder="Phone number or email address">
                        <label for="">password</label>
                        <input style="margin-bottom:40px" type="text">
                        <button class="grad" style="margin:auto; padding: 10px 40px;border-radius:6px;border:none">Login</button>
                    </form>
                </div>
            </div>
            <div class="col-6 grad" style="border-radius: 0px 10px 10px 0;background-color: green; height:80vh">
                <div class="div-flex">
                    <h3>We are more than just a company</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis quidem aspernatur doloribus pariatur ea facere sapiente laudantium magni animi, error quaerat maiores commodi iusto similique adipisci exercitationem, incidunt minus nostrum?</p>

                </div>
            </div>
        </div>
    </div>
</body>

</html> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">

    <title>Document</title>

    <style>
        body {
            background: #eee;
            height: 100vh;
        }

        .grad {
            background: linear-gradient(to right, #e78123, #e76, #d23);
        }

        .flex-center {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .row {
            height: 80vh;
            border-radius: 12px;
            /* overflow: hidden; */
            /* box-shadow: 0 0 10px 2px #ccc; */
        }

        @media (max-width:990px) {
            .row {
                height: auto;
                padding: 20px;
            }
        }

        .col-lg-6:first-child {
            background-color: white;
            font-size: 16px;
            border-radius: 8px 0 0 8px;
        }

        .col-lg-6:last-child {
            color: white;
        }

        button {
            padding: 10px 40px;
            width: fit-content;
            border: none;
            border-radius: 6px;
            margin: 30px auto 0;
            color: white;
        }

        h3 {
            margin-bottom: 30px;
        }

        .col-lg-6:first-child h3 {
            text-align: center;
            margin-bottom: 50px;
        }

        img {
            width: 80px;
            display: block;
            margin: 0 auto 20px;
        }

        form {
            display: flex;
            justify-content: center;
            flex-direction: column;
            gap: 14px
        }

        input {
            padding: 2px 6px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: -8px
        }

        @media (max-width:990px) {

            .card2 {
                display: none;
            }
        }
    </style>
</head>

<body class="flex-center">
    <div class="container ">
        <div class="row">
            <div class="col-lg-6 col-sm-12 p-5 flex-center">
                <div style="width:100%">
                    <div>
                        <img src="{{asset('images/rose.png')}}" alt="">
                        <h3>We are The Laravel Team</h3>
                    </div>
                    <div class="text-start my-4 d-lg-none">
                        <h4 class="text-start">We are more than just a company</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis quidem aspernatur doloribus pariatur ea facere sapiente laudantium magni animi, error quaerat maiores commodi iusto similique adipisci exercitationem, incidunt minus nostrum?</p>

                    </div>
                    <!-- <form action="{{route('login_check')}}" method="post"> -->
                    <form action="" method="post">
                        @csrf

                        <p class="m-0">Please login to your account</p>

                        <label for="username">Email</label>
                        <input id="email" type="text" name="email" value="{{old('email','')}}" placeholder="email address">
                        @error('email')
                        <div class="error text-danger">{{$errors->first('email')}}</div>
                        @enderror

                        <label for="password">Password</label>
                        <input id="password" name="password" value="{{old('password','')}}" type="password">
                        @error('password')
                        <div class="error text-danger">{{$errors->first('password')}}</div>
                        @enderror

                        <button type="submit" class="grad">Login</button>
                    </form>
                </div>
            </div>
            <div class="card2 col-lg-6 col-sm-12 p-5 grad flex-center ">
                <div class="">
                    <h3>We are more than just a company</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis quidem aspernatur doloribus pariatur ea facere sapiente laudantium magni animi, error quaerat maiores commodi iusto similique adipisci exercitationem, incidunt minus nostrum?</p>

                </div>
            </div>
        </div>
    </div>
</body>

</html>