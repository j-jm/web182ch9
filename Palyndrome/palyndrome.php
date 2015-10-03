<?php
# initialize
$message = '';
$pal = strtolower(trim($_POST['pal']));
$pal_array = array();

# process string
for ($i=0; $i < strlen($pal); $i++)
    {
    $char = substr($pal, $i, 1);
    $ascii_char = ord((substr($pal, $i, 1)));
        if (97 <= $ascii_char and  $ascii_char <= 122)
        {
        $pal_array[] = $char;
        }
    }

# reassign var
$pal = implode($pal_array);
$pal_r = strrev($pal);

# process message
if (empty($pal))
    {
    $message = "Please, enter some text.";
    }
    else if ($pal == $pal_r)
    {
    $message = "Your palyndrome is correct.".'</br>'." It reads $pal forward and $pal_r backwards.";   
    }
    else
    {
    $message = "There is a mistake in your palyndrome; try again.";
    }

include 'palyndrome.html';

# message
echo 'You typed: '.$pal.'</br>';
echo $message;

# return: stop script at that point?
?>