<?php
//set default values
$number1 = 78;
$number2 = -105.33;
$number3 = 0.0049;
$number_array = array();
$valid = true;

$message = 'Enter some numbers and click on the Submit button.';

//process
$action = filter_input(INPUT_POST, 'action');
switch ($action) {
    case 'process_data':
        $number1 = filter_input(INPUT_POST, 'number1');
        $number2 = filter_input(INPUT_POST, 'number2');
        $number3 = filter_input(INPUT_POST, 'number3');


// make sure the user enters three numbers
        if (empty($number1) or empty($number2) or empty($number3))
        {
        $message = "Please, enter all 3 numbers. \n";
        }

// make sure the numbers are valid
        else
        {
            $number_array = array($number1, $number2, $number3);    
            foreach ($number_array as $number)
            {
            for ($i=0; $i < strlen($number); $i++)
                {
                    $char = substr($number, $i, 1);
                    $ascii_char = ord($char);
                    if (!((48 <= $ascii_char and  $ascii_char <= 57) or
                    ($ascii_char == 44)  or ($ascii_char == 45) or ($ascii_char == 46)))
                    {
                    $message = "'$number' is not valid; please re-enter a number.";
                    $valid = false; 
                    }
                }
            }
        }

if ($valid === true)
        {
        // remove any coma
        $number1 = str_replace(',','',$number1);
        $number2 = str_replace(',','',$number2);
        $number3 = str_replace(',','',$number3);

         // get the ceiling and floor for $number2
        $number2_ceil = ceil($number2);
        $number2_floor = floor($number2);

        // round $number3 to 3 decimal places
        $number3_rounded = round($number3,3);

        // get the max and min values of all three numbers
        $min = min($number1,$number2,$number3);
        $max = max($number1,$number2,$number3);

        // generate a random integer between 1 and 100
        $random = rand(1, 100);

        // format the message
        $message =
        "Number 1: $number1\n".
        "Number 2: $number2\n" .
        "Number 3: $number3\n".
        "\n" .
        "Number 2 ceiling: $number2_ceil\n".
        "Number 2 floor: $number2_floor\n".
        "Number 3 rounded: $number3_rounded\n".
        "\n".
        "Min: $min\n".
        "Max: $max\n".
        "\n".
        "Random: $random\n";
        }
break;
}
include 'number_tester.php';       
?>