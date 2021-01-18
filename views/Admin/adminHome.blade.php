
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Admin Homepage</title>
    <style>
        .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;
        }
  
        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
        }
      </style>
</head>

<body>
    <main class="my-5">
        <section class="py-5 text-center container bg-light">

            @if(\Session::has('success'))
            <div class="alert">
                <h5  class="text-center bg-success p-2"> {{\Session::get('success')}} </h5>
            @endif

            @if($errors->any())
            <div class="alert">
                <h5 class="text-center bg-danger p-2">{{$errors->first()}}</h5>
            @endif

            <nav class="navbar navbar-expand navbar-dark bg-info" aria-label="Second navbar example">
                <div class="container-fluid">
                <a class="navbar-brand" href="#"> <img src="Flex.png" alt="logo" width="100%" height="70%"> </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                </div>
            </nav>
            <br>
            <br>

            <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h2 class="text-info">ADMIN LOGIN</h2><br>
                <h5 class="text-info"><img src="admin.png" alt="userLogin" width="30%" height="20%"></h5><br>

                <form action="/adminAuthentication">

                    <div class="form-group">
                        <label for="staffID" class="text-info">Staff ID:</label><br>
                        <input type="text" name="staffID" class="text-center">
                    </div>

                    <div class="form-group">
                        <label for="password" class="text-info">Password: </label><br>
                        <input type="password" name="password" class="text-center">
                    </div>

                    <input type="submit" name = "search" class="btn btn-primary my-2" value="Sign In">
                    <a href="adminForm" class="btn btn-secondary my-2">Register</a>

                </form>
            </p>
            </div>
        </div>
        </section>
</body>
</html>