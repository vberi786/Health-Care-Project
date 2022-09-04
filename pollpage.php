<?php require 'header.php';
if(isset($_POST['Opted'])){
    if(isset($_POST['opt'])){
        $option = $_POST['opt'];
        $QuesID = $_POST['QuesID'];
        $EmailID = $_SESSION['patients'];
        $qry = "SELECT * FROM answers WHERE EmailID=? AND QuesID=?";
        $run = $conn->prepare($qry);
        $run->execute([$EmailID, $QuesID]);
        if($run->rowCount()==0){
            // INSERT
            $insQry = "INSERT INTO answers(EmailID, QuesID, Vaccinated) VALUES (?, ?, ?)";
            $runIns = $conn->prepare($insQry);
            $runIns->execute([$EmailID, $QuesID, $option]);
            if($runIns) echo '<script>alert("Your Response is Inserted !")</script>';
        }else{
            // UPDATE
            $AnsData = $run->fetch(PDO::FETCH_OBJ);
            $updQry = "UPDATE answers SET Vaccinated=? WHERE AnsID=?";
            $runUpd = $conn->prepare($updQry);
            $runUpd->execute([$option, $AnsData->AnsID]);
            if($runUpd) echo '<script>alert("Your Response is Updated !")</script>';
        }

    }else echo '<script>alert("Select One Option !")</script>';
}
?>

<body>

<div class="container p-3">
    <form action="pollpage.php" method="post">
        <div class="col w-75 m-auto">
            <div class="bg-light p-3 text-info"><input type="hidden" name="QuesID" value=QuesID>Are you Vaccinated? </div>
            <div class="row bg-light text-danger m-0 p-2">
            <div class="col"><input type="radio" value="yes" name="opt" id="opt">YES</div>
            <div class="col"><input type="radio" value="no" name="opt" id="opt">NO</div>
        </div>
        <div class="text-center m-3">
            <input class="btn btn-info w-50" type="submit" value="Submit" name="Vaccinated">
        </div>
    </form>
    </div> 
</body>
</html>