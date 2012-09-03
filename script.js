$(document).ready(function() {
     
     
    //if submit button is clicked
    $('#submit').click(function () { 
       
         
        //Get the data from all the fields
        var email = $('input[name=email]');
        var zip = $('input[name=zip]');
 
        //Simple validation to make sure user entered something
        //If error found, add hightlight class to the text field
        if (email.val()=='' || email.val()=='your email address') {
            alert("Please enter your email address");
            return false;
        }
        if (zip.val()=='zip code') {
			zip.val('');
		}
        
         // change the div
        $('#join_form').fadeOut();
        $('#thanks').delay(500).fadeIn();   
         
        //organize the data properly
        var data = 'Email=' + email.val() + '&Zip=' + zip.val() + '&organization_KEY=' + "1625" + '&object=' + "supporter" + '&Receive_Email=' + "3";
        //disabled all the text fields
        $('.text').attr('disabled','true');
         
        //show the loading sign
        $('.loading').show();
         
        //start the ajax
        $.ajax({
            //this is the php file that processes the data and send mail
            url: "http://salsa.wiredforchange.com/save?xml",
             
            //GET method is used
            type: "GET",
 
            //pass the data        
            data: data,    
             
        });
         
        //cancel the submit button default behaviours
        return false;
        
    });
   
   
   // Facts
   $('.fadein').cycle({
   	timeout: 10000,
    speed:  1000
   });
}); 
