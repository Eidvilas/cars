<!doctype html>
<html lang="en">
<head>
	<title>AJAX user control (jQuery + PHP) v1.1</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        
	  
        
</head>



<body>
    
       <form method="post" name="form1" id="form-password" action="">
           `<div>
          <label>Password:</label>
          <input type="password" name="password" id="password" value="" size="32" />
          <label>Re-Enter Password:</label>
          <input type="password" name="password-check" id="password-check" value="" size="32" />
          <input type="submit" value="Submit" id="submit">
           </div>
      </form>

<script>

jQuery(function(){
        $("#submit").click(function(){
        $(".error").hide();
        var hasError = false;
        var passwordVal = $("#password").val();
        var checkVal = $("#password-check").val();
        if (passwordVal == '') {
            $("#password").after('<span class="error">Please enter a password.</span>');
            hasError = true;
        } else if (checkVal == '') {
            $("#password-check").after('<span class="error">Please re-enter your password.</span>');
            hasError = true;
        } else if (passwordVal != checkVal ) {
            $("#password-check").after('<span class="error">Passwords do not match.</span>');
            hasError = true;
        }
        if(hasError == true) {return false;}
    });
});


</script>
</body>
</html>