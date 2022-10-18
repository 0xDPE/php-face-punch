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
        function redirect()
        {
            print("
                <script>
                alert(\"wrong password.\");
                window.location.href = window.location.href.replace(\"joinroom.php\", \"\")
                </script>
            ");
        }
        // renders posts
        function renderPosts($conn)
        {
            try
            {
                $stm = $conn->prepare("SELECT * FROM chat_".(int)$_POST["chid"]);
                $stm->execute();

                print("<script>var chid = \"".$_POST["chid"]."\"</script>");
                print("<h1>Face Punch</h1>");
                print("<h2>".$_POST["name"]."</h2>");

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
                print ("
                <form id=\"new-message\" method=\"POST\">
                    <input name=\"msg\" type=\"text\" style=\"width: 505px;\">
                    <input hidden type=\"submit\">
                    <input hidden name=\"chid\" value=\"".$_POST["chid"]."\">
                </form>
                ");
            }
            catch (PDOException)
            {
                print(
                    "woops... this chat does not exist!<br>Do you want to go <a href=\"/index.php\">back</a>?"
                );
                // will delete the chat
                $stm = $conn->prepare("DELETE FROM chats WHERE id=\"chat_".$_POST["chid"]."\"");
                $stm->execute();
            }
        }



        $conn = new PDO("sqlite:db/chats.db");

        // if the user sent a message then we will add them to the db
        if (isset($_POST["msg"]) and isset($_POST["chid"]) and !isset($_POST["pword"]))
        {
            try
            {
                $stm = $conn->prepare(
                    "INSERT INTO chat_".$_POST["chid"]." VALUES(\"".$_POST["msg"]."\", \"".date("H:i:s")."\")"
                );
                $stm->execute();
                $stm = null;
            }
            catch (PDOException)
            {
                print(
                    "<script>
                    alert(\"sorry but your mesage contains letters that can not be sent.\");
                    </script>"
                );
            }

            renderPosts($conn);
        }

        else if (isset($_POST["pword"]))
        {

            $stm = $conn->prepare("SELECT * FROM chats WHERE id = ".$_POST["chid"]);
            $stm->execute();
            $data = $stm->fetchAll()[0];
            $conn = null;

            if (@($data["pword"] == $_POST["pword"]))
            {
                $conn = new PDO("sqlite:db/chats.db");
                renderPosts($conn);
            }

            else
            {
                redirect();
            }
            
        }

        else
        {
            // redirects user
            redirect();
        }
    ?>
    <script src="script.js"></script>
</body>
</html>
