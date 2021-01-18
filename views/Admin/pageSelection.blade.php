<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Select Page</title>
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
    
        <nav class="navbar navbar-expand navbar-dark bg-info" aria-label="Second navbar example">
            <div class="container-fluid">
            <a class="navbar-brand" href="#"> <img src="Flex.png" alt="logo" width="100%" height="70%"> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarsExample02">
                <ul class="navbar-nav me-auto"  style="margin-left: auto;">
                <li class="nav-item active">
                    <a class="nav-link" aria-current="page" href="/selectPage"><strong>HOME</strong></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="/admin"><strong>LOGOUT</strong></a>
              </li>
                </ul>
            </div>
            </div>
        </nav><br><br>

        <h2 class="text-center text-info">TASK SELECTION</h2>
        <hr><br>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <div class="col">
            <div class="card shadow-sm">

                <img src="UserIcon.png" alt="patientView" width="100%" height="225">  

              <div class="card-body bg-light">
                <h4 class="card-text text-center"> <i><a href="patientView" class="text-info">Manage Patient</a></i> </h4>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card shadow-sm">

                <img src="counterdisplay.png" alt="patientQueue" width="100%" height="225">  

              <div class="card-body bg-light">
                <h4 class="card-text text-center"> <i><a href="manageQueue" class="text-info">Manage Queue</i></a> </h4>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card shadow-sm">

                <img src="staff.png" alt="userLogin" width="100%" height="225">  

              <div class="card-body bg-light">
                <h4 class="card-text text-center"> <i><a href="adminView" class="text-info">Manage Staff</i></a> </h4>
              </div>
            </div>
          </div>
        </div>
    </section>

</body>
</html>