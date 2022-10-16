<?php
$conn = new PDO("sqlite:db/chats.db");
$stm = $conn->prepare("SELECT * FROM chat_".$_GET["chid"]);
$stm->execute();
print(json_encode($stm->fetchAll()));
?>