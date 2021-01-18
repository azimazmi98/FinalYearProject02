<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Patient Record</title>

</head>
<body>
    <main class="my-5">
    <section class="py-5 text-center container bg-light">
    <div class="container">

        @if(\Session::has('success'))
            <div class="alert" style="text-align: center;">
            <h4  class="text-center bg-success p-2"> {{\Session::get('success')}} </h4>
        @endif
        
        <nav class="navbar navbar-expand navbar-dark bg-info" aria-label="Second navbar example">
            <div class="container-fluid">
            <a class="navbar-brand" href="#"> <img src="Flex.png" alt="logo" width="100%" height="70%"> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarsExample02">
                <ul class="navbar-nav me-auto"  style="margin-left: auto;">
                    <li class="nav-item ">
                        <a class="nav-link" aria-current="page" href="/selectPage"><strong>HOME</strong></a>
                    </li>
                </ul>
            </div>
            </div>
        </nav>

        <div class="jumbotron">
            <h1 style="text-align: center;">MANAGE QUEUE</h1><br>
            
            <button onclick="reset()" class="btn btn-danger">RESET</button>

            <script>
            function reset(){
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover these queue numbers!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                  swal("Poof! Your imaginary file has been deleted!", {
                    icon: "success",
                  });
                  window.location = "/removeAll";
                } else {
                  swal("Your queue numbers are safe!");
                }
              });
            }
            </script>
          
            
            <br>
            <br>
            
            <form>
                <table class="table tble-bordered">
                    <thead class="thead-dark">
                        <tr>
                            
                            <th> QUEUE</th>
                            <th> GENERAL </th>
                            <th> X-RAY </th>
                            <th> PHARMACIES </th>
                        </tr>
                    <tbody>
                    </thead>
                        @foreach ($queue as $row)
                        <tr style="background: white;">

                            
                            <td>{{ $row->queueNum }}</td>
                            
                            <?php if(substr($row->queueNum ,0,1) == 1){
                                   
                            ?>
                                <td> <a href="/remove_queue/{{ $row->queueNum }}" class="btn btn-success btn-lg btn-block">Call</a> </td>
                                <td> <a href="#" class="btn btn-warning btn-lg btn-block">Invalid</a> </td>
                                <td> <a href="#" class="btn btn-warning btn-lg btn-block">Invalid</a> </td>
                            <?php } ?>
                            
                            <?php if(substr($row->queueNum ,0,1) == 2){
                                   
                            ?>
                                <td> <a href="#" class="btn btn-warning btn-lg btn-block">Invalid</a> </td>
                                <td> <a href="/remove_queue/{{ $row->queueNum }}" class="btn btn-success btn-lg btn-block">Call</a> </td>
                                <td> <a href="#" class="btn btn-warning btn-lg btn-block">Invalid</a> </td>
                            <?php } ?>

                            <?php if(substr($row->queueNum ,0,1) == 3){
                                   
                            ?>
                                <td> <a href="#" class="btn btn-warning btn-lg btn-block">Invalid</a> </td>
                                <td> <a href="#" class="btn btn-warning btn-lg btn-block">Invalid</a> </td>
                                <td> <a href="/remove_queue/{{ $row->queueNum }}" class="btn btn-success btn-lg btn-block">Call</a> </td>
                            <?php } ?>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>              
    </section>
</body>
</html>