<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
            <h1 style="text-align: center;">Patient Details</h1><br>
            <form>
                <table class="table tble-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th> Full Name </th>
                            <th> Patient IC. Number </th>
                            <th> Phone Number </th>
                            <th> Gender </th>
                            <th> Race </th>
                            <th> Marital Status </th>
                            <th> Address </th>
                            <th> EDIT </th>
                            <th> DELETE </th>
                        </tr>
                    <tbody>
                    </thead>
                        @foreach ($patient as $row)
                        <tr style="background: white;">

                            <td>{{ $row->patient_name }}</td>
                            <td>{{ $row->patient_icNum }}</td>
                            <td>{{ $row->patient_phoneNum }}</td>
                            <td>{{ $row->patient_gender }}</td>
                            <td>{{ $row->patient_race }}</td>
                            <td>{{ $row->patient_maritalStatus }}</td>
                            <td>{{ $row->patient_address }}</td>

                            <td> <a href="click_edit/{{ $row->patient_icNum }}" class="btn btn-success">Edit</a> </td>

                            <td> <a href="/click_delete/{{ $row->patient_icNum }}" class="btn btn-danger">Delete</a> </td>

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