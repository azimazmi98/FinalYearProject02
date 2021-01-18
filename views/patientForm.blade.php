<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Registration</title>
</head>
<body>

    <main class="my-5">
        <section class="py-5 container bg-light">

            <nav class="navbar navbar-expand navbar-dark bg-info" aria-label="Second navbar example">
                <div class="container-fluid">
                <a class="navbar-brand" href="#"> <img src="Flex.png" alt="logo" width="100%" height="70%"> </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <div class="collapse navbar-collapse" id="navbarsExample02">
                    <ul class="navbar-nav me-auto"  style="margin-left: auto;">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/patient"><strong>HOME</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/tutorial"><strong>TUTORIAL</strong></a>
                        </li>
                    </ul>
                </div>
                </div>
            </nav>
            <br>
            <br>

    @if(\Session::has('success'))
    <div class="alert">
        <h4> {{\Session::get('success')}} </h4>
    @endif

    @if($errors->any())
            <div class="alert">
            <h5 class="text-center bg-danger p-2">{{$errors->first()}}</h5>
    @endif
    
    <form action="/add_patient" method="post">
        {{ csrf_field() }}
        <div class="container">
        <div class="jumbotron" style="margin-top: 5%;">
            <h1 class="text-center"> Patient Registration </h1>
            <hr>
        <div class="form-group">
            <label><strong> Name </strong></label>
            <input type="text" class="form-control" name="patient_name" placeholder="Enter your name here">
        </div>

        <div class="form-group">
            <label><strong> IC. Number </strong></label>
            <input type="text" class="form-control" name="patient_icNum" placeholder="Enter your IC. number here">
        </div>

        <div class="form-group">
            <label><strong> Phone Number </strong></label>
            <input type="text" class="form-control" name="patient_phoneNum" placeholder="Enter your phone number here">
        </div>

        <div class="form-group">
            <label><strong> Gender </strong></label><br>
            <input type="radio" id="male" name="patient_gender" value="male">
            <label for="male">Male</label><br>
            <input type="radio" id="female" name="patient_gender" value="female">
            <label for="female">Female</label><br>
        </div>

        <div class="form-group">
            <label><strong> Race </strong></label>
            <input type="text" class="form-control" name="patient_race" placeholder="Enter your race here">
        </div>

        <div class="form-group">
            <label><strong> Marital Status </strong></label><br>
            <input type="radio" id="single" name="patient_maritalStatus" value="single">
            <label for="single">Single </label>
            <input type="radio" id="married" name="patient_maritalStatus" value="married">
            <label for="married">Married </label>
            <input type="radio" id="divorcee" name="patient_maritalStatus" value="married">
            <label for="divorcee">Divorcee </label>
        </div>

        <div class="form-group">
            <label><strong> Address </strong></label>
            <input type="text" class="form-control" name="patient_address" placeholder="Enter your full address here">
        </div>

        <input type="submit" name="submit" class="btn btn-success" value="SUBMIT">
        <a href="patient" class="btn btn-secondary my-2">CANCEL</a>
        
        </div>
        </div>
    </form>
    </section>

</body>
</html>