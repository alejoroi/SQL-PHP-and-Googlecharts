<?php

class User {


    static function create($firstname,$lastname, $email,$phone,$message) {
        $pdo = DbConn::getPDO();
        $q = $pdo->prepare(
            "INSERT INTO `users` (`firstname`,`lastname`, `email`,`phone`,`message`) VALUES (?, ?, ?, ?, ?); ");
        $q->execute([$firstname,$lastname,$email,$phone,$message]);
        if(!empty($q->rowCount())) {
            return ["msg" => "User <em>$firstname $lastname</em> created",
                    "status"=>true];
        }
    
        return ["msg" => "Could not create User <em>$firstname,$lastname</em>",
            "status"=>false];
    }


}