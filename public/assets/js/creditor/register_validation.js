function register_validation(step) 
{
    if(step == 1){

        var counter = 0;
        $("#creditor_name,#address,#division_or_branch,#suite,#city_state_zip").each(function() { 
            if ($(this).val() === "") { 
                if ($(this).parent().parent().next(".validation").length == 0) // only add if not added
                { 
                    $(this).parent().parent().after("<div class='validation' style='position:absolute; margin-top: -2%;color:red;'>This field is required</div>");
                }
                counter++;
            }else{ 
                $(this).parent().parent().next(".validation").remove();
            }
        });

        if(counter>0)
            return false;

        $('#creditor_information').hide();
        $('#user_information').show();
        $('#customization').hide();
        $('#welcome_screen').hide();
       
        return false;
    }

     if(step == 2){
    
            var counter = 0;
            $("#users_name,#user_title,#user_phone_number,#user_email_add,#user_type").each(function() { 
                if ($(this).val() === "") { 
                    if ($(this).parent().parent().next(".validation").length == 0) // only add if not added
                    { 
                        $(this).parent().parent().after("<div class='validation' style='position:absolute; margin-top: -2%;color:red;'>This field is required</div>");
                    }
                    counter++;
                }else{ 
                    $(this).parent().parent().next(".validation").remove();
                }
            });
    
            if(counter>0)
                return false;
    
            
            $('#creditor_information').hide();
            $('#user_information').hide();
            $('#customization').show();
            $('#welcome_screen').hide();
           
            return false;
     }

      if(step == 4)
      {
        $('#creditor_information').show();
        $('#user_information').hide();
        $('#customization').hide();
        $('#welcome_screen').hide();

      }

      if(step == 5)
      {
        $('#creditor_information').hide();
        $('#user_information').show();
        $('#customization').hide();
        $('#welcome_screen').hide();
     
      }

    }

   

    function showDiv(divId, element)
    {
        if(element.value == 2){
            document.getElementById(divId).style.display = element.value == 2 ? 'block' : 'none';
        }
        else if(element.value == 1){
            document.getElementById(divId).style.display = element.value == 1 ? 'none' : 'block';
        }
        
    }

