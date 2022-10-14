<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Face Punch | Homepage</title>
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

        td {
            vertical-align: top;
        }

        tbody {
            display: inline-block;
            width: 32rem;
        }
    </style>

    <!---title-->
    <img src="https://i.kym-cdn.com/entries/icons/original/000/000/091/TrollFace.jpg" style="width: 12rem; height: auto; position: absolute;">
    <h1 style="margin-left: 12rem">Face Punch</h1>

    <!---the left bar-->
    <div id="left" style="float: left; width: 12rem; padding-top: 4rem;">
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
        <table bgcolor="black" >
            <tr width="32rem">
                <th bgcolor="lightgrey" width="250" height="10" display="inline-block"><b>title</b></th>
                <th bgcolor="lightgrey" width="500" height="10" display="inline-block"><b>body</b></th>
            </tr>
        <?php
            // for any incoming stuff
            if (!empty($_GET["body"]))
            {
                $title = $_GET["title"];
                $body_ = str_replace("<", "[", str_replace("\n", "", $_GET["body"]));

                $file = fopen("messages.txt", "a");

                fwrite($file, "\"$title\" => \"$body_\"\n");
            }

            // displays posts
            foreach(file("messages.txt") as $line) {
                $line = explode(" => ", $line);
                $title = str_replace('"', "", $line[0]);
                $body = str_replace('"', "", $line[1]);

                print("
                    <tr width=\"10rem\" display=\"inline-block\">
                        <td height=\"100\" width=\"10rem\">".$title."</td>
                        <td height=\"100\" width=\"10rem\">".$body."</td>
                    </tr>
                ");
            }
        ?>
        <table>
    </div>
</body>

</html>