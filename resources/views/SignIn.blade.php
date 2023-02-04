<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignIn</title>
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/all.min-new.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row login_container">
            <div class="col-12">
               
                <form action="SignIn" method="post">
                    @csrf 
                    <h2>SignIn</h2>
                    @if(!empty(Session::get("Error")))
                    <div class="error alert alert-danger">{{Session::get("Error")}}</div>
                    @endif
                    <input type="email" name="Email" placeholder="Email Address" required>
                    <input type="password" name="Password" placeholder="Password" required>
                    <button>Login</button>
                </form>
            </div>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</body>
</html>