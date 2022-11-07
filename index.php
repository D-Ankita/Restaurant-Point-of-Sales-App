<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cafe Management System</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing: border-box;

        }

        .container{
            position: relative;
            text-align: center;
            height: 100%;
        }

        .background-image{
            width: 100%;
            background-image: url('background.jpg'); 
            background-size: cover;
            background-repeat: no-repeat;
            height: 100%;
            z-index: -1;
            filter: blur(8px);
           
        }

        .content{
            position: absolute;
            top: 30%;
            left: 22%;
            align-items: center;
            .content {
            text-align: center;     
        }
            
        }

        body{
            height: 100vh;
            width: 100vw;
            background-color: #fff;
            color: white;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
        }

        .links>a {
            color: white;
            padding: 0 25px;
            font-size: 18px;
            font-weight: 800;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .links{
            display: flex;
            align-items: center;
            justify-content: center;
            
        }

        .title {
            font-size: 84px;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

    </style>
</head>

<body>
    <div class="container">
    <div class="background-image"></div>
        
        <div class="content">
            
            <div class="title m-b-md">
               <h1> Food Town</h1>
            </div>

            <div class="links">
			
                <a href="./php/waiter/WaiterLogin.php"><h3>Waiter Log In</h3></a>
                <a href="./php/cashier-admin/cashierAdminLogin.php"><h3>Cashier Log In</h3></a>
                <a href="./php/customer/login_form.php"><h3>Customer Log In</h3></a>
            </div>
        </div>
    </div>
    
</body>

</html>