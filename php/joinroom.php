<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Facepunch | Chatroom</title>
</head>
<body>
    <?php
        $conn = new PDO("sqlite:db/chats.db");
        $stm = $conn->prepare("SELECT * FROM chats WHERE id = ".$_POST["chid"]);
        $stm->execute();
        $data = $stm->fetchAll()[0];
        $conn = null;
        if ($data["pword"] == $_POST["pword"])
        {
            $conn = new PDO("sqlite:db/chats.db");
            
            try
            {
                $stm = $conn->prepare("SELECT * FROM chat_".$data["id"]);
                $stm->execute();
                
                print("<h1>Face Punch</h1>");
                print("<h2>".$data["name"]."</h2>");
                
                print<<<LABLE
                <table id="messages">
                <tr>
                <th style="width: 25rem">mesage</th>
                <th style="width: 10rem">date</th>
                </tr>
                LABLE;
                
                // itterates over all messages in the chat
                foreach($stm->fetchAll() as $msg)
                {
                    print("<tr>");
                    print("<td>".$msg["msg"]."</td>");
                    print("<td>".$msg["date"]."</td>");
                    print("</tr>");
                }
                
                print("</table>");
                print <<< FORM
                <form id="new-message">
                    <input id="msg" type="text">
                    <input hidden type="submit">
                </form>
                FORM;
            }
            catch (PDOException)
            {
                print("woops... this chat does not exist!<br>Do you want to go <a href=\"/index.php\">back</a>?");
                $stm = $conn->prepare("DELETE FROM chats WHERE id=\"chat_".$data["id"]."\"");
                $stm->execute();
            }
            
        }
        else
        {
            // redirects user
            print("<script>window.location.href = window.location.href.replace(\"joinroom.php\", \"\")</script>");
        }
        ?>
    <script src="script.js"></script>
</body>
</html>
