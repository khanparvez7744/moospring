<?php require "header.php"; ?>
<section>
  <div class="row">
    <img src="images/contact-banner.jpg" class="responsive-img" alt="Contact Banner">
  </div>
  </section>
<section class="getInTouch">
  <div class="container">
    <div class="row">
      <div class="col l6 m5 s12 g-0">
        <div class="card">
          <form class="z-depth-5 p-5" method="post">
            <h1 class="center">Send a Message</h1>
                <div class="row">
                  <div class="input-field col s12 mb-0">
                    <input type="text" name="name" required placeholder="Enter your name" class="browser-default form-control">
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12 mb-0">
                    <input type="text" name="phone" maxlength="10" required placeholder="Enter your phone number" class="browser-default form-control">
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12 mb-0">
                    <input type="email" name="email" required placeholder="Enter your email address" class="browser-default form-control">
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                  <textarea data-length="400" required name="message" placeholder="Enter your query" class="browser-default form-control" ></textarea>
                  </div>
                </div>
                <div class="row center">
                 <button class="btn " name="submit" type="submit">Submit</button>
                </div>
              </form>
          </div>
      </div>
      <div class="col l6 m7 s12 g-0">
        <div class="card bg-dark-blue p-5 contMap">
          <div class="row">
            <div class="col s12">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3508.3160911083987!2d77.66995801549244!3d28.439886399523722!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cbd6e435fe2cd%3A0x300f0ff543962fc2!2sMoospring%20Dairy%20Farm%20Private%20Limited!5e0!3m2!1sen!2sin!4v1632290239446!5m2!1sen!2sin" width="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
          </div>
          <div class="col s12">
            <ul class="white-text phoneWebMail">
              <li><i class="material-icons me-3">phone</i> <span><a href="tel:+91 9811501150" class="white-text">+91 9811501150</a></span></li>
              <li><i class="material-icons me-3">send</i> <span><a href="mailto:moospring@gmail.com" class="white-text">moospring@gmail.com</a></span></li>
              <li><i class="material-icons me-3">home</i> <span>Moospring, Pari Chowk, Greater Noida - 201310</span></li>
            </ul>
          </div>
          <div class="col s12 center">
            <ul class="white-text  fs-20 socIconContUl">
              <li class="d-inline-block"><a target="_blank" href="https://www.facebook.com/moospring.farm" class="white-text fa-2x"><i class="fab fa-facebook"></i></a></li>
              <li class="d-inline-block"><a target="_blank" href="https://www.instagram.com/accounts/login/" class="white-text fa-2x"><i class="fab fa-instagram"></i></a></li>
              <li class="d-inline-block"><a target="_blank" href="https://www.linkedin.com/authwall?trk=bf&trkInfo=AQGOaOesFuytMAAAAXwm17vI7V3zCB26GtoDzjKGO-qwO-7h-yX68NIUQtvRnwxYTrGsaMUvpt0G4ykGn0XEbnqI6uQOffY9DZv-L5IPmFt9LpNOdXrKsEIngUELg5TA_hJAQz8=&originalReferer=&sessionRedirect=https%3A%2F%2Fwww.linkedin.com%2Fcompany%2Fmoospring-dairy-farm-private-limited" class="white-text fa-2x"><i class="fab fa-linkedin"></i></a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
<?php
if(isset($_POST['submit'])){
    $name= $_POST['name'];
    $email= $_POST['email'];
    $mobile= $_POST['phone'];
    $msg = $_POST['message'];
    $sql="INSERT INTO contact(name,email,phone,message,created_at) values('$name','$email','$mobile','$msg',NOW())";
    if($pdo->query($sql)){
    $to = 'web@sociapa.com,moospring@gmail.com';
    $from = 'Moospring <no-reply@sociapainfluencer.com>';
    $fromName = 'Moospring Contact';
    $subject = "New Query From $name";
    $message = "
        <table style='max-width:600px;width: 100%;'>\r\n\n
            <tr><td>Name</td><td>:</td><td>".$name."</td></tr>\r\n\n
            <tr><td>Email Address</td><td>:</td><td>".$email."</td></tr>\r\n\n
            <tr><td>Phone</td><td>:</td><td>".$mobile."</td></tr>\r\n\n
            <tr><td>Message</td><td>:</td><td>".$msg."</td></tr>\r\n\n
            </table>
    ";
    $headers = "From: $fromName"." <".$from.">";
    $headers   .= "MIME-Version: 1.0\r\n";
    $headers   .= "Content-type: text/html; charset=utf-8\r\n";
    $mail = mail($to, $subject, $message, $headers);
    echo "<script type='text/javascript'>
    swal('Data Saved Successfully', 'I will connect you in soon', 'success');
    </script>";
  }
}
?>
<?php require "footer.php"; ?>