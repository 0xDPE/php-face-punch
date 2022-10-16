<?php
if (isset($_GET["chid"]))
{
    $conn = new PDO("sqlite:db/chats.db");
    $stm = $conn->prepare("SELECT * FROM chat_".$_GET["chid"]);
    $stm->execute();
    print(json_encode($stm->fetchAll()));
}
// date("h:i:s")
else if(isset($_POST["msg"]) and isset($_POST["db"]))
{
    $conn = new PDO("sqlite:db/chats.db");
    $stm = $conn->prepare("INSERT INTO ".$_POST["db"]." VALUES(\"".$_POST["msg"]."\", ".date("H:i:s").");");
    $stm->execute();
    print("{\"status\": \"success\"}");
}
else
{
    print("{\"status\": \"error\"}");
}
?>
