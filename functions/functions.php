<?php
//include ("classes/Connection.php");
include ("PHPMailer/src/PHPMailer.php");
include ("PHPMailer/src/SMTP.php");
include ("PHPMailer/src/Exception.php");

function UID(){
    $uid = uniqid(rand(1,100000));
    $uid = str_shuffle($uid);

    if (Connection::selectData("users", "uid", $uid)){
        $uid = UID();
    }

    if (strlen($uid) < 10){
        return UID();
    }
    else{
        return $uid;
    }
}

function generatePassword(){
    $str = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*()";
    $str = str_shuffle(str_shuffle($str));
    $str = substr($str, 0, 15);

    if (Connection::selectData("users", "password", $str)){
        $str = generatePassword();
    }

    if (strlen($str) < 15){
        return generatePassword();
    }
    else{
        return $str;
    }
}


function getWorkingDays($startDate,$endDate) {
    $holidays=array("2018-01-01", "2018-01-02", "2018-04-08", "2018-04-09", "2018-05-01", "2018-08-15","2018-11-30","2018-12-01", "2018-12-25", "2018-12-26");

    // do strtotime calculations just once
    $endDate = strtotime($endDate);
    $startDate = strtotime($startDate);


    //The total number of days between the two dates. We compute the no. of seconds and divide it to 60*60*24
    //We add one to inlude both dates in the interval.
    $days = ($endDate - $startDate) / 86400 + 1;

    $no_full_weeks = floor($days / 7);
    $no_remaining_days = fmod($days, 7);

    //It will return 1 if it's Monday,.. ,7 for Sunday
    $the_first_day_of_week = date("N", $startDate);
    $the_last_day_of_week = date("N", $endDate);

    //---->The two can be equal in leap years when february has 29 days, the equal sign is added here
    //In the first case the whole interval is within a week, in the second case the interval falls in two weeks.
    if ($the_first_day_of_week <= $the_last_day_of_week) {
        if ($the_first_day_of_week <= 6 && 6 <= $the_last_day_of_week) $no_remaining_days--;
        if ($the_first_day_of_week <= 7 && 7 <= $the_last_day_of_week) $no_remaining_days--;
    }
    else {
        // (edit by Tokes to fix an edge case where the start day was a Sunday
        // and the end day was NOT a Saturday)

        // the day of the week for start is later than the day of the week for end
        if ($the_first_day_of_week == 7) {
            // if the start date is a Sunday, then we definitely subtract 1 day
            $no_remaining_days--;

            if ($the_last_day_of_week == 6) {
                // if the end date is a Saturday, then we subtract another day
                $no_remaining_days--;
            }
        }
        else {
            // the start date was a Saturday (or earlier), and the end date was (Mon..Fri)
            // so we skip an entire weekend and subtract 2 days
            $no_remaining_days -= 2;
        }
    }

    //The no. of business days is: (number of weeks between the two dates) * (5 working days) + the remainder
//---->february in none leap years gave a remainder of 0 but still calculated weekends between first and last day, this is one way to fix it
    $workingDays = $no_full_weeks * 5;
    if ($no_remaining_days > 0 )
    {
        $workingDays += $no_remaining_days;
    }

    //We subtract the holidays
    foreach($holidays as $holiday){
        $time_stamp=strtotime($holiday);
        //If the holiday doesn't fall in weekend
        if ($startDate <= $time_stamp && $time_stamp <= $endDate && date("N",$time_stamp) != 6 && date("N",$time_stamp) != 7)
            $workingDays--;
    }

    return $workingDays;
}



function generateEmail($email, $reason, $temp_pass){

    $mail = new \PHPMailer\PHPMailer\PHPMailer();

    //Enable SMTP debugging.
    $mail->SMTPDebug = 0;
//Set PHPMailer to use SMTP.
    $mail->isSMTP();
//Set SMTP host name
    $mail->CharSet = 'UTF-8';
    $mail->Host = "softlead.ro";

    $mail->SMTPAuth = true;                               // Enable SMTP authentication

    $mail->Username = "no-reply@softlead.ro";
    $mail->Password = "dkajq483$#@$#@$";

    $mail->Port = 25;

    $mail->From = "no-reply@softlead.ro";
    $mail->FromName = "Softlead Marketplace";

    $mail->addAddress($email, "Recepient Name");

//    $mail->AddReplyTo("Support - Softlead", "mail.softlead.ro");

    $mail->WordWrap = 50;

    $mail->isHTML(true);

    if ($reason == "recover") {
        $mail->Subject = "Recover password";
        $mail->Body = "<b>Your temporary password is: ". $temp_pass ."</b>";
        $mail->AltBody = "This is the plain text version of the email content";
    }
    elseif ($reason == "pending") {
        $mail->Subject = "New request";
        $mail->Body = "<b>O noua cerere este in asteptare.</b>";
        $mail->AltBody = "This is the plain text version of the email content";
    }
    elseif($reason == "new_user"){
        $mail->Subject = "Account details";
        $mail->Body = "<b>Your email is: ". $email .
            "
            Your temporary password is: ". $temp_pass ."</b>";
        $mail->AltBody = "This is the plain text version of the email content";
    }
    else{
        $mail->Subject = "Response";
        $mail->Body = "<b>Ai primit raspuns cererii tale. Verifica in aplicatie.</b>";
        $mail->AltBody = "This is the plain text version of the email content";
    }

    $mail->send();

}

?>