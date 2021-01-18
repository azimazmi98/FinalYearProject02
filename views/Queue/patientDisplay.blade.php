<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
        <section class="py-5 text-center container bg-light">

            @if(\Session::has('success'))
            <div class="alert">
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
                        <a class="nav-link" aria-current="page" href="patient2"><strong>HOME</strong></a>
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
            <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h3 class="text-info"><i>Please wait, we will be attending to you shortly!</i></h3><br>
                    <h4 class="text-info"><i>Your number is shown below: </i></h4><br>
                    <div class="border border-light rounded">
                        <div  class="row justify-content-center align-self-center">
                            <div id="mainDiv">
                                <div class="align-text-bottom">
                                    <h2><strong> <?php echo $queueNum; ?> </strong></h2><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>

                    <?php

                        $current = DB::select("SELECT * FROM queue LIMIT 1");
                        foreach ($current as $row) {
                            $currentId = $row->id;
                            $currentNum = $row->queueNum;
                        }

                        $pQueueNum = DB::select("SELECT * FROM queue WHERE queueNum = ?", [$queueNum]);
                        foreach ($pQueueNum as $row) {
                            $pQueueNumId = $row->id;
                            $pQueueNumber = $row->queueNum;
                        }

                        if($pQueueNumber != $currentNum){
                            $gap = $pQueueNumId - $currentId;
                            $timeGap = $gap * 10;
                            $hours = $timeGap / 60;
                            $mins = $timeGap % 60;

                            if($gap <= 3 && $gap > 0){
                                ?> 
                            <script>
                                swal({
                                    title: "Be Ready!",
                                    text: "Your turn is almost up. Please be alert!",
                                    icon: "warning",
                                });
                            </script>
                            <?php
                            }
                        }

                        if($pQueueNumber == $currentNum && substr($pQueueNumber,0,1) == 1){
                            $gap = 0;
                            $timeGap = $gap * 10;
                            $hours = $timeGap / 60;
                            $mins = $timeGap % 60;
                            ?> 
                            <script>
                                swal({
                                    title: "Your Turn!",
                                    text: "Please proceed to Room 1!",
                                    icon: "success",
                                });
                            </script>
                            <?php
                        }

                        if($pQueueNumber == $currentNum && substr($pQueueNumber,0,1) == 2){
                            $gap = 0;
                            $timeGap = $gap * 10;
                            $hours = $timeGap / 60;
                            $mins = $timeGap % 60;
                            ?> 
                            <script>
                                swal({
                                    title: "Your Turn!",
                                    text: "Please proceed to X-Ray room!",
                                    icon: "success",
                                });
                            </script>
                            <?php
                        }

                        if($pQueueNumber == $currentNum && substr($pQueueNumber,0,1) == 3){
                            $gap = 0;
                            $timeGap = $gap * 10;
                            $hours = $timeGap / 60;
                            $mins = $timeGap % 60;
                            ?> 
                            <script>
                                swal({
                                    title: "Your Turn!",
                                    text: "Please take your medicines at pharmacies!",
                                    icon: "success",
                                });
                            </script>
                            <?php
                        }

                    ?>

                    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                        <div class="col">
                          <div class="card mb-4 shadow-sm">
                          <div class="card-header">
                            <h5 class="my-0 fw-normal text-info"><i>Currently Attending</i></h5>
                          </div>
                          <div class="card-body">
                            <h2 class="card-title pricing-card-title text-info"><?php echo $currentNum ?></h2>
                            </div>
                        </div>
                        </div>
                        <div class="col">
                          <div class="card mb-4 shadow-sm">
                          <div class="card-header">
                            <h5 class="my-0 fw-normal text-info"><i> Waiting Position </i></h5>
                          </div>
                          <div class="card-body">
                            <h2 class="card-title pricing-card-title text-info"><?php echo $gap ?></h2>
                          </div>
                        </div>
                        </div>
                        <div class="col">
                          <div class="card mb-4 shadow-sm">
                          <div class="card-header">
                            <h5 class="my-0 fw-normal text-info"><i>Estimated Call Time</i></h5>
                          </div>
                          <div class="card-body">
                            <h2 class="card-title pricing-card-title text-info"><?php echo round($hours) ?>h <?php echo $mins ?>m </h2>
                          </div>
                        </div>
                        </div>
                      </div>
            </p>
            <button onclick="reset()" class="btn btn-info">Done</button>

            <script>
            function reset(){
            swal({
                title: "Are you sure?",
                text: "Once you click OK, you will logged out from the system!",
                icon: "warning",
                buttons: true,
                dangerMode: false,
              })
              .then((willDelete) => {
                if (willDelete) {
                  swal("Thank you for using the system!", {
                    icon: "success",
                  });
                  window.location = "/patient";
                }
              });
            }
            </script>
            </div>
        </div>
        </section>


</body>
</html>