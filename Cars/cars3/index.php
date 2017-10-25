<!doctype html>
<html lang="en">
<head>
    <title>AJAX!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <h1>Cars</h1>
    </div>
    <div class="row">
        <div class="col">
            <div class="row">
                <input id="filt" class="btn btn-darken " type="button" value="Newest 3 entries">
                <input id="filtras" class="form-control search" type="text" placeholder="Search..">
                <select class="form-control form-control search2" id="">
                    <option>Nebaigta</option>
                </select>
            </div>
            <table class="table table-striped">
                <thead>
                <th>#</th>
                <th>Owner</th>
                <th>License</th>
                <th>Model</th>
                <th>Make</th>
                <th>Date</th>
                </thead>
                <tbody id="user_table_body">
                </tbody>
            </table>
        </div>
        <div class="col">
            <h1>Add Car</h1>
            <div id="alert"></div>
            <form method="POST">
                <div class="input-group">
                    <input id="form_owner" class="form-control" type="text" name="owner" placeholder="Owner">
                </div></br>
                <div class="input-group">
                    <input id="form_license" class="form-control" type="text" name="license" placeholder="License">
                </div></br>
                <div class="input-group">
                    <input id="form_model" class="form-control" type="email" name="model" placeholder="Model">
                </div></br>
                <div class="input-group">
                    <input id="form_make" class="form-control" type="text" name="make" placeholder="Make">
                </div></br>
                <div class="input-group">
                    <input id="enter" class="btn btn-darken" type="button" value="Enter">
                </div></br>
            </form>
        </div>
    </div>
</div>
<script src="script.js"> </script>
</body>
</html>