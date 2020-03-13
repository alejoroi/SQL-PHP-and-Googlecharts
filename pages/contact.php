<?php
require_once('inc/init.php');
?>
<div id="imagecontact">
        <h1 id="myTitlesC">Contact Us</h1>
        <h2>Please fill out the form below.</h2>
        <?php
        if(isset($res)) {
            echo $res['msg'];
        }
    if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['message'])
        
    ){

        $result = User::create($_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['phone'],$_POST['message']);

        echo $result['msg'];
    } else {

?>
    <div id="container">
        <form action="?p=contact" method="post">
            <div>
                <div>
                    <label for="fname">First Name</label>
                    <input type="text" id="fname" name="firstname"  placeholder="Your name..">
                </div>
                <div>
                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="lastname"   placeholder="Your last name..">
                </div>
                <div >
                    <label  for="email">Email </label>&nbsp
                    <input type="text" id="email" name="email" placeholder="Your email is..">
                </div>
                <div>
                    <label for="phone">Phone Call</label>
                    <input type="text" id="email" name="phone" placeholder="Your phone is..">
                </div>
            </div>
           
            
            <div>Message </div>
            <div>
                <textarea name="message" rows="10" cols="40" placeholder="Write something.."></textarea><br />
            </div>
            <br />

            <input type="submit" value="Send" name="submit"  />

            <br><br>
        </form>
    </div>
    </div>
        
        <?php } ?>
  