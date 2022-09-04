<?php require 'header.php';

if(isset($_POST['register'])){
    $name= $_REQUEST['name'];
    $EmailID= $_REQUEST['EmailID'];
    $time = $_REQUEST['time'];
    $service =  $_REQUEST['service'];
    $gender =  $_REQUEST['gender'];

    $qry = "INSERT INTO patapoint (name, EmailID, time,service,gender) VALUES(:name, :EmailID, :time, :service, :gender)";
    $run_qry = $conn->prepare($qry);

    $data = [
        ':name'=>$name,
        ':EmailID'=>$EmailID,
        ':time'=>$time,
        ':service'=>$service,
        ':gender'=>$gender,
    ];

    $run_qry->execute($data);
    if($run_qry){
        $_SESSION['patients'] = $EmailID;
        header('Location: checkout.php');
    } else{
        echo '<script>alert("Your Appointment is not Confirmed !")</script>';
    }
}
?>


<script>(function () {
'use strict'
const forms = document.querySelectorAll('.requires-validation')
Array.from(forms)
  .forEach(function (form) {
    form.addEventListener('submit', function (event) {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
</script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap');

*, body {
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
    -webkit-font-smoothing: antialiased;
    text-rendering: optimizeLegibility;
    -moz-osx-font-smoothing: grayscale;
}

html, body {
    height: 100%;
    background-color: #fbfbfb;
    overflow: hidden;
}


.form-holder {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      min-height: 100vh;
}

.form-holder .form-content {
    position: relative;
    text-align: center;
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-justify-content: center;
    justify-content: center;
    -webkit-align-items: center;
    align-items: center;
    padding: 60px;
}

.form-content .form-items {
    border: 3px solid #fff;
    padding: 40px;
    display: inline-block;
    width: 100%;
    min-width: 540px;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
    text-align: left;
    -webkit-transition: all 0.4s ease;
    transition: all 0.4s ease;
}

.form-content h3 {
    color: #0096FF;
    text-align: left;
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 5px;
}

.form-content h3.form-title {
    margin-bottom: 30px;
}

.form-content p {
    color: #0096FF;
    text-align: left;
    font-size: 17px;
    font-weight: 300;
    line-height: 20px;
    margin-bottom: 30px;
}


.form-content label, .was-validated .form-check-input:invalid~.form-check-label, .was-validated .form-check-input:valid~.form-check-label{
    color: #0096FF;
}

.form-content input[type=text], .form-content input[type=email], .form-content select {
    width: 100%;
    padding: 9px 20px;
    text-align: left;
    border: 0;
    outline: 0;
    border-radius: 6px;
    background-color: #fff;
    font-size: 15px;
    font-weight: 300;
    color: #8D8D8D;
    -webkit-transition: all 0.3s ease;
    transition: all 0.3s ease;
    margin-top: 16px;
}


.btn-primary{
    background-color: #0096FF;
    outline: none;
    border: 0px;
     box-shadow: none;
}

.btn-primary:hover, .btn-primary:focus, .btn-primary:active{
    background-color: #0096FF;
    outline: none !important;
    border: none !important;
     box-shadow: none;
}

.form-content textarea {
    position: static !important;
    width: 100%;
    padding: 8px 20px;
    border-radius: 6px;
    text-align: left;
    background-color: #fff;
    border: 0;
    font-size: 15px;
    font-weight: 300;
    color: #0096FF;
    outline: none;
    resize: none;
    height: 120px;
    -webkit-transition: none;
    transition: none;
    margin-bottom: 14px;
}

.form-content textarea:hover, .form-content textarea:focus {
    border: 0;
    background-color: #0096FF;
    color: #0096FF;
}

.mv-up{
    margin-top: -9px !important;
    margin-bottom: 8px !important;
}

.invalid-feedback{
    color: #ff606e;
}

.valid-feedback{
   color: #2acc80;
}
</style>
<body>
<div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Register Here</h3>
                        <p>Fill in the data below to get an appointment</p>
                        <form class="appointment" method="post" action="form.php">

                            <div class="col-md-12">
                               <input class="form-control" type="text" name="name" placeholder="Full Name" required>
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="email" name="EmailID" placeholder="E-mail Address" required>
                            </div>

                            <div class="col-md-12">
                                <select class="form-select mt-3" name="time" required>
                                      <option selected disabled value="">Select a time bracket</option>
                                      <option value="7-9">7am-9am</option>
                                      <option value="9-1">9am-1pm</option>
                                      <option value="4-5">4pm-5pm</option>
                               </select>
                           </div>

                           <div class="col-md-12">
                                <select class="form-select mt-3" name="service" required>
                                      <option selected disabled value="">Select kind of service required</option>
                                      <option value="neuro">Neurosurgeon</option>
                                      <option value="radio">Radiologist</option>
                                      <option value="nephro">Nephrologist</option>
                                      <option value="cardio">Cardiologist</option>
                                      <option value="derma">Dermatologist</option>
                                      <option value="psy">Psychiatrists</option>
                               </select>
                           </div>

                           <div class="col-md-12" style= "color: #0096FF">
                            <h5>Fees to be paid at the counter: <i class="fa fa-inr">750</i><h5>
                           </div>


                           <div class="col-md-12 mt-3">
                            <label class="mb-3 mr-1" for="gender">Gender: </label>

                            <input type="radio" class="btn-check" name="gender" id="male" autocomplete="off" required>
                            <label class="btn btn-sm btn-outline-secondary" for="male">Male</label>

                            <input type="radio" class="btn-check" name="gender" id="female" autocomplete="off" required>
                            <label class="btn btn-sm btn-outline-secondary" for="female">Female</label>

                            <input type="radio" class="btn-check" name="gender" id="other" autocomplete="off" required>
                            <label class="btn btn-sm btn-outline-secondary" for="other">Other</label>
                           </div>

                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                          <label class="form-check-label">I confirm that all data are correct</label>
                        </div>
                  

                            <div class="form-button mt-3">
                                <a href= "checkout.php">
                                <button id="submit" type="submit" class="btn btn-primary" name="register">Register</button>
                            </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>