<?php
function hotel_reservtion ($pdo ,$roomId,$guestName,$guestEmail,$checkInDate, $checkOutDate,$userId,$totalPrice){
        // Insert reservation into the reservations table
        $stmt = $pdo->prepare('INSERT INTO htl_reservation (room_id, guest_name, guest_email, check_in_date, check_out_date, userId,total_price) VALUES (:roomId, :guestName, :guestEmail, :checkInDate, :checkOutDate, :userId,:totalPrice)');
        $stmt->bindParam(':roomId', $roomId, PDO::PARAM_INT);
        $stmt->bindParam(':guestName', $guestName, PDO::PARAM_STR);
        $stmt->bindParam(':guestEmail', $guestEmail, PDO::PARAM_STR);
        $stmt->bindParam(':checkInDate', $checkInDate, PDO::PARAM_STR);
        $stmt->bindParam(':checkOutDate', $checkOutDate, PDO::PARAM_STR);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':totalPrice', $totalPrice);
        $stmt->execute();

        // Update the room availability status
        $stmt = $pdo->prepare('UPDATE rooms SET availability_status = "booked" WHERE id = :roomId');
        $stmt->bindParam(':roomId', $roomId, PDO::PARAM_INT);
        $stmt->execute();
}


