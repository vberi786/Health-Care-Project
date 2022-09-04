<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ChatBot </title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* *{
    margin: 0;
    padding: 0;

}

.box{
    width: 400px;
    height: 250px;
    margin-left: 35%;
    margin-top: 11%;
    padding: 15px;
    border-radius: 6px;
    background-color: #0096ff;
} */

box{
    /* border-radius: 20px;
background: #e0e0e0;
box-shadow:  13px 13px 26px #bebebe,
             -13px -13px 26px #ffffff; */
             
}

body{
    margin: 0;
    padding: 0;
    width: 100%;
    height:100vh;
    overflow: hidden;
    position: relative;
    background-color: #0096ff;
   
/* background-image: url('https://i.pinimg.com/originals/53/85/92/538592bf136859c1686f377b749c88d8.jpg'); */
    background-repeat: no-repeat;
}
.box{
    width: 490px;
    height: 350px;
    box-shadow: 5px 5px 20px #000;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border-radius: 20px;
    background: rgba( 255, 255, 255, 0.25 );
box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
backdrop-filter: blur( 7px );
-webkit-backdrop-filter: blur( 7px );
border-radius: 10px;
border: 1px solid rgba( 255, 255, 255, 0.18 );
}
.top{
    width: 100%;
    height: 80px;
    background: transparent;
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
}
.top h1{
    margin: 0;
    font-size: 30px;
    color: black;
    text-align: center;
    padding-top: 10px;
    font-family: sans-serif;
}
.mid{
    width: 100%;
    height: 150px;
    background: transparent;
}
.mid .chat{
    width: 100%;
}
.mid .chat h2{
    margin: 0;
    font-size: 30px;
    color: #000;
    padding:30px 20px;
    text-align: center;
    font-family: sans-serif;
}
.mid .chat p{
    margin: 0;
    height: 30px;
    font-size: 28px;
    color: black;
    text-align: center;
    background-color: transparent;
    font-weight: 600;
    letter-spacing: 0.04em;
    font-family: sans-serif;
}
.input{
    height:100%;
    width: 489px;
    overflow: hidden;
}
.input input{
    width: 90%;
    height: 110px;
    outline: none;
    border: none;
    padding-left: 30px;
    padding-top:0;
    font-family: monospace;
    font-size: 50px;
    background: white;
    margin: 0 10px;
    border-radius: 20px;
}
    </style>
    <!-- <style>
box{
    /* border-radius: 20px;
background: #e0e0e0;
box-shadow:  13px 13px 26px #bebebe,
             -13px -13px 26px #ffffff; */
             
}

body{
    margin: 0;
    padding: 0;
    width: 100%;
    height:100vh;
    overflow: hidden;
    position: relative;
    /* background-color: #afeeee; */
   
background-image: url('https://i.pinimg.com/originals/53/85/92/538592bf136859c1686f377b749c88d8.jpg');
    background-repeat: no-repeat;
}
.box{
    width: 490px;
    height: 350px;
    box-shadow: 5px 5px 20px #000;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border-radius: 20px;
    background: rgba( 255, 255, 255, 0.25 );
box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
backdrop-filter: blur( 7px );
-webkit-backdrop-filter: blur( 7px );
border-radius: 10px;
border: 1px solid rgba( 255, 255, 255, 0.18 );
}
.top{
    width: 100%;
    height: 80px;
    background: transparent;
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
}
.top h1{
    margin: 0;
    font-size: 30px;
    color: black;
    text-align: center;
    padding-top: 10px;
    font-family: sans-serif;
}
.mid{
    width: 100%;
    height: 150px;
    background: transparent;
}
.mid .chat{
    width: 100%;
}
.mid .chat h2{
    margin: 0;
    font-size: 30px;
    color: #000;
    padding:30px 20px;
    text-align: center;
    font-family: sans-serif;
}
.mid .chat p{
    margin: 0;
    height: 30px;
    font-size: 28px;
    color: black;
    text-align: center;
    background-color: transparent;
    font-weight: 600;
    letter-spacing: 0.04em;
    font-family: sans-serif;
}
.input{
    height:100%;
    width: 489px;
    overflow: hidden;
}
.input input{
    width: 100%;
    height: 110px;
    outline: none;
    border: none;
    padding-left: 30px;
    padding-top:0;
    font-family: monospace;
    font-size: 50px;
    background: transparent;
}
    </style> -->
</head>
<body>

    <div class="box">
            <div style="text-align: center;" class="top">
                <h1>Send A Message !</h1>
            </div>
            <div class="mid">
                <div class="chat">
                    <h2>Answers:</h2>
                    <p id="chatLog">Let's Chat</p>
                </div>
            </div>
            <div class="input">
                <input type="text" id="userBox"onkeydown="if(event.keyCode == 13){ talk() }"placeholder="Type A Message">
            </div>
    </div>

    <script>
function talk(){
    var know ={
        "Hi":"Hello",


        
        "How Are You?":"Great !",
        "Bye":"Have A Nice Day !",
        "Hello":"Hi , Whats Up",
        
    };
    var user = document.getElementById('userBox').value;
    document.getElementById('chatLog').innerHTML = user + "<br>";
    if(user in know){
        document.getElementById('chatLog').innerHTML = know[user] + "<br>";
    }else{
        document.getElementById('chatLog').innerHTML = "I do not understand .";
    }
}
    </script>
</body>
</html>