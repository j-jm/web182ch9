<?php
//set default values
$name = '';
$first_name = '';
$email = '';
$phone = '';
$phone_array = array();
$message = 'Enter some data and click on the Submit button.';
$thanku = "Thank you for entering this data:";

//process
$action = filter_input(INPUT_POST, 'action');

switch ($action) {
    case 'process_data':
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $phone = filter_input(INPUT_POST, 'phone');

        /*************************************************
         * validate and process the name
         ************************************************/
        // 1. make sure the user enters a name
        // 2. display the name with only the first letter capitalized        
        if ($name == '')
        {          
            $message = 'Please, enter your name.';       
        }
        else
        {
            $name = ucwords(strtolower($name));
            $first_name = substr($name, 0, strpos($name,' '));
            $message = 'Hello '.$first_name.',';
            $message .= "\n\n".$thanku;
            $message .= "\n\n Name: ".$name;
        }

        /*************************************************
         * validate and process the email address
         ************************************************/
        // 1. make sure the user enters an email or (strpos($email, '@') === false) or (strpos($email, '.') === false)
        // 2. make sure the email address has at least one @ sign and one dot character
         if ($email=='' or stripos($email, '@')===false or stripos($email, '.')===false )
        {          
            $message .= "\n please, enter a valid email address.";    
        }
        else
        {
            $message .= "\n Email: ".$email;
        }

        /*************************************************
         * validate and process the phone number
         ************************************************/
        // 1. make sure the user enters at least seven digits, not including formatting characters
        // 2. format the phone number like this 123-4567 or this 123-456-7890
        
        for ($i=0; $i < strlen($phone); $i++)
            {
                $char = substr($phone, $i, 1);
                $ascii_char = ord($char);
                 if (48 <= $ascii_char and  $ascii_char <= 57)
                {
                $phone_array[] = $char;
                }
            } 

        $phone = implode($phone_array);


        if (strlen($phone)!==7 and strlen($phone)!==10)
        {
            
            $message .= "\n Please, enter valid phone number.";
        }

        else
        {
            if ((strlen($phone)==7))
            {
            $phone =  substr($phone,0,3).'-'.substr($phone,3,4);  
            $message .= "\n Phone: ".$phone;
            }
            else
            {
            $phone =  substr($phone,0,3).'-'.substr($phone,3,3).'-'.substr($phone,6,4);    
            $message .= "\n Phone: ".$phone;
            }
            
        }

        /***************************************************
         * Reset the form and Display the validation message
         **************************************************/

}
$name = '';
$email = '';
$phone = '';
include 'string_tester.php';
?>