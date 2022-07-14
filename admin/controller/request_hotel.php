<?php
    include "connections.php";
    session_start();

    $_SESSION['success'] = "";
    $_SESSION['error'] = "";

    if(isset($_POST['request'])){
        $pcn = htmlspecialchars(stripslashes($_POST['pcn_id']));
        $hotel = htmlspecialchars(stripslashes($_POST['user_hotel']));
        $room = htmlspecialchars(stripslashes($_POST['user_room']));
        $date = htmlspecialchars(stripslashes($_POST['check_in_date']));
        $requester = htmlspecialchars(stripslashes($_POST['requester']));
        $start_date = date("2022-07-24");
        $end_date = date("2022-07-25");
        if($date == $start_date || $date == $end_date){
            
            $check_status = $connectdb->prepare("SELECT * FROM request_hotel WHERE pcn_number = :pcn_number AND request_status = 0");
            $check_status->bindvalue("pcn_number", $pcn);
            $check_status->execute();
            
            if($check_status->rowCount() > 0){
                $_SESSION['error'] = "You already have submitted a request! \r\n Kindly await approval";
                header("Location: ../views/user.php");
            }else{
                /* check again */
                $check_confirmed = $connectdb->prepare("SELECT * FROM request_hotel WHERE pcn_number = :pcn_number AND request_status = 1");
                $check_confirmed->bindvalue("pcn_number", $pcn);
                $check_confirmed->execute();
                if($check_confirmed->rowCount() > 0){
                    $_SESSION['error'] = "You already have aaccomodation!";
                    header("Location: ../views/user.php");
                }else{
                    $update_status = $connectdb->prepare("INSERT INTO request_hotel (pcn_number, hotel, room, request_by, check_in_date) VALUES (:pcn_number, :hotel, :room, :request_by, :check_in_date)");
                    $update_status->bindvalue("hotel", $hotel);
                    $update_status->bindvalue("room", $room);
                    $update_status->bindvalue("pcn_number", $pcn);
                    $update_status->bindvalue("request_by", $requester);
                    $update_status->bindvalue("check_in_date", $date);
                    $update_status->execute();
                    if($update_status){
                        $_SESSION['success'] = "Request submitted Successfully!";
                        header("Location: ../views/user.php");
                    }else{
                        $_SESSION['error'] = "Request failed";
                    }
                }
            }
            
        }else{
            $_SESSION['error_note'] = "Error! Check in date cannot be farther than ".date("jS, M, Y", strtotime($end_date)). " nor before ".date("jS, M, Y", strtotime($start_date));
            header("Location: ../views/user.php");
        }

    }

?>