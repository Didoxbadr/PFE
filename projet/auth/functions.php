<?php
    function connect(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "usersdb";


        $conn = new mysqli($servername,$username,$password,$database);
        if($conn->connect_errno!=0) {
            return $conn->connect_error;
        }else{
            return $conn;
        }
    
    
    }
    function getAllOffres(){
        $conn=connect();
        $sql = "SELECT * FROM offredestage o JOIN entreprise e ON (o.entreprise_id = e.entreprise_id)";
        $res=$conn->query($sql);
        while($row=$res->fetch_assoc()){
            $offres[]=$row;
        }
        return $offres;
    }
?>