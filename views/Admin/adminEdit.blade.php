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

<body>
    <main class="my-5">
    <section class="py-5 container bg-light">
            
        <div class="container">
            <div class="jumbotron">

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

  
            <form action="/update_admin/{{ $admin[0]->staffID}}">

                {{ csrf_field() }}

                <div class="container">
                <div class="jumbotron" style="margin-top: 5%;">
                    <h1 class='text-center'> EDIT STAFFS DETAILS </h1>
                    <hr>

                <div class="form-group">
                    <label><strong> Name </strong></label>
                    <input type="text" class="form-control" name="name" value="{{ $admin[0]->name}}"placeholder="Enter your name here">
                </div>
        
                <div class="form-group">
                    <label><strong> IC. Number </strong></label>
                    <input type="text" class="form-control" name="icNum" value="{{ $admin[0]->icNum}}" placeholder="Enter your IC. number here">
                </div>
        
                <div class="form-group">
                    <label><strong> Phone Number </strong></label>
                    <input type="text" class="form-control" name="phoneNum" value="{{ $admin[0]->phoneNum }}" placeholder="Enter your phone number here">
                </div>
        
                <div class="form-group">
                    <label><strong> Gender </strong></label><br>
                    <input type="radio" id="male" name="gender" value="Male">
                    <label for="male">Male</label><br>
                    <input type="radio" id="female" name="gender" value="Female">
                    <label for="female">Female</label><br>
                </div>
        
                <div class="form-group">
                    <label><strong> Race </strong></label>
                    <input type="text" class="form-control" name="race" value="{{ $admin[0]->race }}" placeholder="Enter your race here">
                </div>
        
                <div class="form-group">
                    <label><strong> Marital Status </strong></label><br>
                    <input type="radio" id="single" name="maritalStatus" value="Single">
                    <label for="single">Single </label>
                    <input type="radio" id="married" name="maritalStatus" value="Married">
                    <label for="married">Married </label>
                    <input type="radio" id="divorcee" name="maritalStatus" value="Divorced">
                    <label for="divorcee">Divorcee </label>
                </div>
        
                <div class="form-group">
                    <label><strong> Address </strong></label>
                    <input type="text" class="form-control" name="address" value="{{ $admin[0]->address }}" placeholder="Enter your full address here">
                </div>

                <div class="form-group">
                    <label><strong> Password (Numbers only!) </strong></label>
                    <input type="text" class="form-control" name="password" value = "{{ $admin[0]->password }}" placeholder="Enter your new password here">
                </div><br>
                
                <input type="submit" name="submit" class="btn btn-success" value="SUBMIT">
                </div>
                </div>
            </form>

        </div>
    </div>
</section>
</body>
</html>