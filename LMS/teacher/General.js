  
    
            function validate() {
            var Password = document.forms["change_password_form"]["New_Password"].value;       
            var Confirm_password = document.forms["change_password_form"]["Confirm_New_password"].value;
  
       
                
                
                    if(!(Password==Confirm_password))
                        {
                          alert(" Entered Password and Confirm Password  are mismatched . Please enter both the fields correctly");
                            return false;      
                        }
                
                   alert(" Entered Password and Confirm Password  are mismatched . Please enter both the fields correctly");
                            return false; 
                    
                
   
                
            }
            
      