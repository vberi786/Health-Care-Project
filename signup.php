<?php require 'header.php';
if(isset($_POST['submit'])){
    $EmailID= $_POST['EmailID'];
    $password = $_POST['password'];

    $qry = "INSERT INTO patlogin (EmailID, password) VALUES(:EmailID, :password)";
    $run_qry = $conn->prepare($qry);

    $data = [
        ':EmailID'=>$EmailID,
        ':password'=>$password,
    ];
    $run_qry->execute($data);
    if($run_qry){
        $_SESSION['patients'] = $EmailID;
        header('Location: login.php');
    } else{
        echo "User Not Inserted";
    }
}
?>

<style>

a {
  text-decoration: none;
}
body {
  background:#6c757d;
  /* background-repeat: no-repeat; */
}
label {
  font-family: "Raleway", sans-serif;
  font-size: 11pt;
}
#forgot-pass {
  color: #0096FF;
  font-family: "Raleway", sans-serif;
  font-size: 10pt;
  margin-top: 3px;
  text-align: right;
}
#card {
  background: #fbfbfb;
  border-radius: 8px;
  box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);
  height: 410px;
  margin: 6rem auto 8.1rem auto;
  width: 329px;
}
#card-content {
  padding: 12px 44px;
}
#card-title {
  font-family: "Raleway Thin", sans-serif;
  padding-bottom: 23px;
  padding-top: 13px;
  text-align: center;
}
#signup {
  color: #0096FF;
  font-family: "Raleway", sans-serif;
  font-size: 10pt;
  margin-top: 16px;
  text-align: center;
}
#submit-btn {
  background: -webkit-linear-gradient(right, #6495ED, #0096FF);
  border: none;
  border-radius: 21px;
  box-shadow: 0px 1px 8px #0096FF;
  cursor: pointer;
  color: white;
  font-family: "Raleway SemiBold", sans-serif;
  height: 42.3px;
  margin: 0 auto;
  margin-top: 50px;
  transition: 0.25s;
  width: 200px;
}
#submit-btn:hover {
  box-shadow: 0px 1px 18px #0096FF;
}
.form {
  align-items: left;
  display: flex;
  flex-direction: column;
}
.form-border {
  background: #6c757d;
  height: 1px;
  width: 100%;
}
.form-content {
  background: #fbfbfb;
  border: none;
  outline: none;
  padding-top: 14px;
}
.underline-title {
  background: #0096FF;
  height: 2px;
  margin: -0.3rem auto 0 auto;
  width: 200px;
}

</style>

<body>
    <div id="card">
        <div id="card-content">
            <div id="card-title">
                <h2><center>Sign Up</center></h2>
                <div class="underline-title"></div>
            </div>
            <form action="signup.php" method= "POST" class="form">
            <label for="email" style="padding-top:13px">
            &nbsp;Email
          </label>
        <input id="email" class="form-content" type="email" name="EmailID" autocomplete="on" required />
        <div class="form-border"></div>
        <label for="password" style="padding-top:22px">&nbsp;Password
          </label>
        <input id="password" class="form-content" type="password" name="password" required />
        <div class="form-border"></div>
        <input id="submit-btn" type="submit" name="submit" value="Create Account" />
            </form>
        </div>
    </div>
</body>
</html>