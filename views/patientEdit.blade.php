<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
            
    <div class="container">
        <div class="jumbotron">

            <form action="/update/{{ $patient[0]->patient_icNum}}" method="post">

                {{ csrf_field() }}

                <div class="container">
                <div class="jumbotron" style="margin-top: 5%;">
                    <h1 class='text-center'> Patient Registration </h1>
                    <hr>
                <div class="form-group">
                    <label><strong> Name </strong></label>
                    <input type="text" class="form-control" name="patient_name" value="{{ $patient[0]->patient_name }}"placeholder="Enter your name here">
                </div>
        
                <div class="form-group">
                    <label><strong> IC. Number </strong></label>
                    <input type="text" class="form-control" name="patient_icNum" value="{{ $patient[0]->patient_icNum }}" placeholder="Enter your IC. number here">
                </div>
        
                <div class="form-group">
                    <label><strong> Phone Number </strong></label>
                    <input type="text" class="form-control" name="patient_phoneNum" value="{{ $patient[0]->patient_phoneNum }}" placeholder="Enter your phone number here">
                </div>
        
                <div class="form-group">
                    <label><strong> Gender </strong></label><br>
                    <input type="radio" id="male" name="patient_gender" value="Male">
                    <label for="male">Male</label><br>
                    <input type="radio" id="female" name="patient_gender" value="Female">
                    <label for="female">Female</label><br>
                </div>
        
                <div class="form-group">
                    <label><strong> Race </strong></label>
                    <input type="text" class="form-control" name="patient_race" value="{{ $patient[0]->patient_race }}" placeholder="Enter your race here">
                </div>
        
                <div class="form-group">
                    <label><strong> Marital Status </strong></label><br>
                    <input type="radio" id="single" name="patient_maritalStatus" value="Single">
                    <label for="single">Single </label>
                    <input type="radio" id="married" name="patient_maritalStatus" value="Married">
                    <label for="married">Married </label>
                    <input type="radio" id="divorcee" name="patient_maritalStatus" value="Divorced">
                    <label for="divorcee">Divorcee </label>
                </div>
        
                <div class="form-group">
                    <label><strong> Address </strong></label>
                    <input type="text" class="form-control" name="patient_address" value="{{ $patient[0]->patient_address }}" placeholder="Enter your full address here">
                </div>
        
                <input type="submit" name="submit" class="btn btn-success" value="SUBMIT">
                </div>
                </div>
            </form>

        </div>
    </div>

</body>
</html>