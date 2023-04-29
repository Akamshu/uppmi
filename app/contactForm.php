<?php
if(isset($_POST['submitForm']))
{
    $User_name = $_POST['name'];
    $Phone = $_POST['Phone'];
    $User_email = $_POST['email'];
    $User_message = $_POST['message'];

    $email_from = 'noreply@uppmi.com';
    $email_subject= "UPPMI CONTACT MESSAGE"
    $email_body ="Name: $User_name.\n".
                     "Phone No: $Phone.\n".
                     "Email Id: $User_email.\n".
                     "User message: $User_message.\n";

    $to_email ="akamshugabriel@gmail.com";
    $headers = "From: $email_from\r\n";
    $headers = "Reply-To: $User_email\r\n";


    $secretKey = "6LeXhsYlAAAAAK4DJ5zRv79En82zjeUuu4pQKYQO";
    $responseKey = $_POST['g-recaptcha-response'];
    $UserIP =$_SERVER['REMOTE_ADDR'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$UserIP";

    $response = file_get_contents($url);
    $response = json_decode($response);
    if ($response->success){
        mail($to_email, $email_subject, $email_body, $headers);
        echo "<span class='alert alert-success'>Message Sent Successfully!</span>";
    }else{
        echo "<span class='alert alert-danger'>Message Not Sent</span>";
    }
}
?>
<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
   <!-- <title> Responsive Contact Us Form  | CodingLab </title>-->
    <link rel="stylesheet" href="src/style.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://www.google.com/recaptcha/api.js" async defer></script>
   </head>
<body>
  <div class="container">
    <div class="content">
      <div class="left-side">
        <div class="address details">
          <i class="fas fa-map-marker-alt"></i>
          <div class="topic">Address</div>
          <div class="text-one">Surkhet, NP12</div>
          <div class="text-two">Birendranagar 06</div>
        </div>
        <div class="phone details">
          <i class="fas fa-phone-alt"></i>
          <div class="topic">Phone</div>
          <div class="text-one">+0098 9893 5647</div>
          <div class="text-two">+0096 3434 5678</div>
        </div>
        <div class="email details">
          <i class="fas fa-envelope"></i>
          <div class="topic">Email</div>
          <div class="text-one">codinglab@gmail.com</div>
          <div class="text-two">info.codinglab@gmail.com</div>
        </div>
      </div>
      <div class="right-side">
        <div class="topic-text text-uppercase">SEND US A MESSAGE</div>
        <!-- <p>Contact us by sending us a message.</p> -->
      <form method="post" action="contactForm.php">
        <div class="input-box">
          <input type="text" placeholder="Enter your name" name="name" required>
        </div>
        <div class="input-box">
            <input type="text" placeholder="Enter your email" name="email" required>
          </div>
          <div class="input-box">
            <input type="phone" name="phone" placeholder="Enter your Phone Number" required>
          </div>
          <!-- <div class="input-box">
            <input type="text" placeholder="Enter your email">
          </div> -->
        <div class="input-box message-box">
          <textarea name="message" id="" placeholder="Enter your message here!" cols="30" rows="10" required></textarea>
        </div>
        <!-- RECAPTCHA -->
        <div class="g-recaptcha" data-sitekey="6LeXhsYlAAAAAAhU18vcLGTwWwX_Rs3sGlFVkZeZ"></div>
        <div class="button">
          <input type="submit" value="Send Now" name="submitForm">
        </div>
      </form>
    </div>
    </div>
  </div>
</body>
</html>


