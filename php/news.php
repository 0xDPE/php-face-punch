<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Face Punch</title>
</head>

<body>
    <style>
        table tr:nth-child(odd) td {
            background: lightgrey;
        }

        table tr:nth-child(even) td {
            background: grey;
        }

        h1 {
            font-size: 5rem;
            margin-top: 0;
            margin-bottom: 0;
        }

        h2 {
            font-size: 2.5rem;
            margin-top: 0;
            margin-bottom: 0;
        }

        td {
            vertical-align: top;
        }

        tbody {
            display: inline-block;
        }

        #paper {
            padding-left: 1rem;
        }
    </style>

    <!---title-->
    <h1 style="padding-left: 12rem">Face Punch</h1>

    <!---the left bar-->
    <div id="left" style="float: left; width: 12rem;">
        Do you want to make a <a href="/new-post.php">new post</a>?
        <br>
        Do you want to look at the
        <a href="/news.php">news</a>
        or the
        <a href="/index.php">forum</a>
        ?
    </div>

    <!---the posts-->
    <div id="posts" style="float: left; display: inline-block; width: 32rem;">
        <?php
            $conn = new PDO("sqlite:database\\news.db");

            // this file also renders news, if the id is passed hen it should show the respective news, else it will give a table of the news
            if (isset($_GET["id"]))
            {
                print("<div id=\"paper\">");

                $sth = $conn->prepare("SELECT * FROM news where id = ".$_GET["id"]);
                $sth->execute();
                $data = $sth->fetchAll()[$_GET["id"]];
                print("<h2>".$data["title"]."</h2>");
                print("<br>");
                print("<body>".$data["body"]."</body>");

                print("</div>");
            }

            else {

                $sth = $conn->prepare("SELECT * FROM news");
                $sth->execute();


                print("
                    <table bgcolor=\"black\">
                        <tr width=\"32rem\">
                            <th bgcolor=\"lightgrey\" width=\"250\" height=\"10\" display=\"inline-block\">
                            <b>title</b>
                        </th>
                    </tr>
                ");

                foreach ($sth->fetchAll() as $key) {
                    print("<tr>");

                    print("<td><a href=\"/news.php?id=".$key["id"]."\">".$key["title"]."</a></td>");

                    print("</tr>");
                }

                print("</table>");
            }
        ?>
    </div>
</body>

</html>