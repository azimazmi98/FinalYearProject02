<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Document</title>

    
</head>

<style>

#mainDiv {
    height: 50px;
    width: 200px;
    position: relative;
    background: #33ccff;
    border-style: inset;
    border-width: 5px;
}

</style>

<body>

    <main class="my-5">
        <section class="py-5 text-center container bg-light">

            @if(\Session::has('success'))
            <div class="alert">
                <h4  class="text-center bg-success p-2"> {{\Session::get('success')}} </h4>
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
        
                <div class="collapse navbar-collapse" id="navbarsExample02">
                    <ul class="navbar-nav me-auto"  style="margin-left: auto;">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/patient2"><strong>HOME</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/tutorial2"><strong>TUTORIAL</strong></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="/queue"><strong>MY QUEUE</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/patientContact"><strong>CONTACT</strong></a>
                        </li>
                    </ul>
                </div>
                </div>
            </nav>
            <br>
            <br>
            <br>



            <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h3 class="text-info"><i>Please enter your queue number as shown below!</i></h3><br>
                    <div class="border border-light rounded">
                        <div  class="row justify-content-center align-self-center">
                            <div id="mainDiv">
                                <div class="align-text-bottom">
                                    <h2><strong> 1001 </strong></h2><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>                    

                <form action="/add_queue" method="GET">

                    <div class="form-group">
                        <label for="queueNum" class="text-dark">Enter Here: </label><br>
                        <input type="text" name="queueNum" placeholder="XXXX" class="text-center">
                    </div>

                    <input type="submit" name = "search" class="btn btn-primary my-2" value="Submit">

                </form>
            </p>
            </div>
        </div>
        </section>


</body>
</html>