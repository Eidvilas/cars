$( document ).ready(function() {
    
    $('#registerForm').on( "submit", function() {
        var pass1 = $('#pass');
        var pass2 = $('#pass2');
        
        if (pass1.val() != pass2.val()) {
            alert('Slaptazodziai neatitinka!!!!');
            return false;
        }
        
        return true;
    });
    
});


