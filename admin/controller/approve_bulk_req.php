<?php
    include "connections.php";
    session_start();

    $_SESSION['success'] = "";
    $_SESSION['error'] = "";

    if(isset($_GET['request'])){

        $user_id = $_GET['request'];
        $update_payment = $connectdb->prepare("UPDATE request_hotel SET request_status = 1, bulk = 0 WHERE request_by = :request_by");

        $update_payment->bindvalue("request_by", $user_id);
        $update_payment->execute();

        if($update_payment){
            /* reduce room */
            $get_room = $connectdb->prepare("SELECT room, hotel FROM request_hotel WHERE request_by = :request_by AND request_by != pcn_number");
            $get_room->bindvalue("request_by", $user_id);
            $get_room->execute();
            $roomss = $get_room->fetchAll();
            foreach($roomss as $rooms){
                $room = $rooms->room;
                $hotel = $rooms->hotel;
                $update_room = $connectdb->prepare("UPDATE rooms SET room_quantity = room_quantity - 1 WHERE hotel = :hotel AND room = :room");
                $update_room->bindvalue("hotel", $hotel);
                $update_room->bindvalue("room", $room);
                
                $update_room->execute();
            }
            /* update room quantity */
            
            $_SESSION['success'] = "Accomodation request confirmed for delegates!";
            header("Location: ../views/admin.php");
        }else{
            $_SESSION['error'] = "Failed to confirm payment!";
            header("Location: ../views/admin.php");
        }
        
        
    }
?>