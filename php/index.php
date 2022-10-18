<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Face Punch | Homepage</title>
</head>

<body>
    <!---title-->
    <h1>Face Punch</h1>
    <!---the posts-->
    <div id="posts" style="float: left; display: inline-block; width: 32rem;">
        <table bgcolor="black" >
            <tr width="32rem">
                <th bgcolor="lightgrey" width="250" height="10" display="inline-block"><b>name</b></th>
                <th bgcolor="lightgrey" width="500" height="10" display="inline-block"><b>password</b></th>
            </tr>
            <?php
                $conn = new PDO("sqlite:db/chats.db");
                $stm = $conn->prepare("SELECT * FROM chats");
                $stm->execute();

                foreach($stm->fetchAll() as $key)
                {
                    print("
                        <tr>
                            <td>".$key["name"]."</td>
                            <td>
                                <form action=\"/joinroom.php\" method=\"post\">
                                    <input type=\"text\" name=\"chid\" value=\"".$key["id"]."\" hidden>
                                    <input type=\"text\" name=\"name\" value=\"".$key["name"]."\" hidden>
                                    <input type=\"password\" name=\"pword\">
                                    <input type=\"submit\" value=\"join\">
                                </form>
                            </td>
                        </tr>
                    ");
                }
            ?>
        <table>
    </div>
</body>

</html>