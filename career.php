<?php require "header.php"; ?>
<section class="carBanrSec">
  <img src="images/career-banner.jpg" class="responsive-img" alt="Career Banner">
</section>
<section class="carRusumeSec">
  <div class="container">
    <div class="row">
      <div class="col l8 m6 s12">
        <h1 class="carOlH1">If You Cherish and Love Cows and have Expertise in Following Domains :</h1>
        <ol class="">
          <li>Animal Husbandry</li>
          <li>Dairy Technology</li>
          <li>Product Development</li>
          <li>Food Processing</li>
          <li>Agriculture</li>
          <li>Organic Farming</li>
          <li>Business Development</li>
          <li>Distribution</li>
          <li>Sales and Customer Care</li>
        </ol>
        <p class="">Then you are invited to join us. Kindly apply here to become a part of Moospring Family</p>
      </div>

      <div class="col l4 m6 s12 center">
        <h1 class="center aplyJobH1">Apply for Job</h1>
        <form action="#" method="post" enctype="multipart/form-data">
          <div class="row formCarRow">
            <div class="col s12" data-aos="fade-up" data-aos-duration="1000">
              <div class="row">
                <div class="col s12">
                  <input name="name" type="text" placeholder="Full Name" class="browser-default form-control"
                    class="validate" required aria-required="true">
                </div>
              </div>
              <div class="row">
                <div class="col s12">
                  <input name="email" type="email" placeholder="Email Address"
                    class="browser-default form-control validate" required aria-required="true">
                </div>
              </div>
              <div class="row">
                <div class="col s12">
                  <input name="phone" type="text" placeholder="Phone Number"
                    class="browser-default form-control validate" maxlength="10" required aria-required="true">
                </div>
              </div>
              <div class="row">
                <div class="col s12">
                  <select class="browser-default form-select" name="gender">
                    <option value="" disabled selected>Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col s12">
                  <select class="browser-default form-select" name="role">
                    <option value="" disabled selected>Job Role</option>
                    <option value="Ecommerce Executive">Ecommerce Executive</option>
                    <option value="Sales Executive">Sales Executive</option>
                    <option value="Other">Other</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col s12">
                  <div class="file-field input-field">
                    <div class="btn fileUplo">
                      <span>Upload File</span>
                      <input type="file" name="myfile" class="">
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" type="text" placeholder="Upload Your Resume">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col s12 center">
                <button class="btn carBtnSbt" type="submit" name="submit">Submit</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<?php
if(isset($_POST['submit'])){
    $name= $_POST['name'];
    $email= $_POST['email'];
    $mobile= $_POST['phone'];
    $gender= $_POST['gender'];
    $jobrole= $_POST['role'];
    $resume= $_FILES['myfile']['name'];
    $target_file2= "./resumes/".$resume;
    move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file2);
    $sql="INSERT INTO careers(name,gender,phone,email,jobrole,resume,created_at) values('$name','$gender','$mobile','$email','$jobrole','$resume',NOW())";
    if($pdo->query($sql)){
    $to = 'web@sociapa.com,moospring@gmail.com';
    $from = 'Moospring <no-reply@sociapainfluencer.com>';
    $fromName = 'Moospring Career';
    $subject = "$name has submited his resume";
    $file = "./resumes/". $resume;
    $htmlContent = "
        <table style='max-width:600px;width: 100%;'>\r\n\n
            <tr><td>Name</td><td>:</td><td>".$name."</td></tr>\r\n\n
            <tr><td>Gender</td><td>:</td><td>".$gender."</td></tr>\r\n\n
            <tr><td>Mobile</td><td>:</td><td>".$mobile."</td></tr>\r\n\n
            <tr><td>Email Address</td><td>:</td><td>".$email."</td></tr>\r\n\n
            <tr><td>Job Role</td><td>:</td><td>".$jobrole."</td></tr>\r\n\n
            <tr><td>Resume</td><td>:Attached</td></tr>\r\n\n
        </table>
    ";
    $headers = "From: $fromName"." <".$from.">";
    $semi_rand = md5(time());
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";
    $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
    "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";
    if(!empty($file) > 0){
        if(is_file($file)){
            $message .= "--{$mime_boundary}\n";
            $fp =    @fopen($file,"rb");
            $data =  @fread($fp,filesize($file));
            @fclose($fp);
            $data = chunk_split(base64_encode($data));
            $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" .
            "Content-Description: ".basename($file)."\n" .
            "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" .
            "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
        }
    }
    $message .= "--{$mime_boundary}--";
    $returnpath = "-f" . $from;
    @mail($to, $subject, $message, $headers, $returnpath);
    echo "<script type='text/javascript'>
    swal('Data Saved Successfully', 'I will connect you in soon', 'success');
    </script>";
    }
}
?>
<?php require "footer.php"; ?>