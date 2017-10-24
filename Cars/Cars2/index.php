
<!doctype html>
<html lang="en">
<head>
    <title>AJAX!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <h1>Users</h1>
    </div>
    <div class="row">
        <div class="col">
            <h3>List</h3>
            <table class="table">
                <thead>
                    <th>ID</th>
                    <th>Owner</th>
                    <th>Licence</th>
                    <th>Model</th>
                    <th>Make</th>
                    <th>Date</th>
                </thead>
                <tbody id="cars_table_body">
                </tbody>
            </table>
        </div>
        <div class="col">
            <h1>Register</h1>
            <div id="alert"></div>
            <form method="POST">
                <div class="input-group">
                    <input id="owner" class="form-control" type="text" name="name" placeholder="Owner">
                </div></br>
                <div class="input-group">
                    <input id="licence" class="form-control" type="text" name="surname" placeholder="Licence">
                </div></br>
                <div class="input-group">
                    <input id="model" class="form-control" type="email" name="email" placeholder="Model">
                </div></br>
                <div class="input-group">
                    <input id="make" class="form-control" type="text" name="number" placeholder="Make">
                </div></br>
                <div class="input-group">
                    <input id="ajax_post" class="btn btn-darken" type="button" value="Prideti">&nbsp
                    <input id="paskutiniai" class="btn btn-darken" type="button" value="10 paskutiniu">
                </div></br>
                <input id="filter" class="form-control" id="myInput" type="text" placeholder="Search..">
                </div></br>
            </form>
        </div>
    </div>
</div>
<script src="script.js"> </script>
</body>
</html>