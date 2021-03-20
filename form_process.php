<?php
//recaptcha 
$nameErr = $emailErr = $lnameErr = $numberErr = "";
$name = $email = $comment = $lname = $number = "";
$message_body = "";
// to clear the form once it's submitted i simply removed the echo followed by the name of the variable being echode from the value tag
//proceed with processing your form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["first_name"])) {
        $nameErr = "FirstName is required";
    } else {
        $name = test_input($_POST["first_name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["second_name"])) {
        $lnameErr = "lastName is required";
    } else {
        $lname = test_input($_POST["second_name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $lname)) {
            $lnameErr = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["phone"])) {
        donothing();
    } else {
        $number = test_input($_POST["phone"]);
        // check if  only number
    }
    
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["prayer_request"])) {
        $comment = "";
    } else {
        $comment = test_input($_POST["prayer_request"]);
    }
    if(isset($_POST['g-recaptcha-response'])) {
        $secretKey = '6LezX1AUAAAAADwiu5Mu8RW3tVlufkzQ7PIRMZPk';
        $response = $_POST['g-recaptcha-response'];     
        $remoteIp = $_SERVER['REMOTE_ADDR'];
    
        $reCaptchaValidationUrl = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$remoteIp");
        $result = json_decode($reCaptchaValidationUrl, TRUE);
    
        if($result['success'] == 1 and $nameErr == '' and $emailErr == '' and $numberErr == '' and $lnameErr == '') {
        //True - What happens when user is verified
        //if all the error are empty basically if the form is filled in right
        //reset everything
        // this method is uing the post-redirect-get method of dealing with forms (N:b i'm only using post and redirect cuase i don't need get)
        //https://www.codexworld.com/how-to-send-email-from-localhost-in-php/
        //https://www.youtube.com/watch?v=1CkBsGhux9U
        //loop through each post
        foreach ($_POST as $key => $value) {
            $message_body .= "$key: $value\n";
        }
        $to = 'email of person you went to send data too';
        $subject = 'Prayer request\questions form submit';
        $var_str = var_export($message_body, true);
        $var = "<?php\n\n\$text = $var_str;\n\n?>";
        file_put_contents('output.txt', $var);
        $name = $email = $number = $message = $url = '';     
        header("Location:thank_you.html",true,303); //acts as the redirect  for post redirect and get
        exit;
        // mail($to,$subject,$message); //send mail
        //clear form details helps form to not be resubmkitted after refresh
        //To prevent refresh data insertion, do a page redirection to same page or different page after record insert  (the unset and header work together  https://stackoverflow.com/questions/6320113/how-to-prevent-form-resubmission-when-page-is-refreshed-f5-ctrlr/47247434#47247434)
        } else {
            
            //False - What happens when user is not verified
            //$userMessage = '<div>Fail: please try again :(</div>';
           // header("Location:oops.html",true,303); //acts as the redirect  for post redirect and get
            //exit;
        }
    }
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function donothing()
{
    ; //do nothing
}

?>