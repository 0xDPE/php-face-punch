<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Face Punch | Admin</title>
</head>

<body>
    <style>
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

        table tr:nth-child(odd) td {
            background: lightgrey;
        }

        table tr:nth-child(even) td {
            background: grey;
        }

    </style>
    <!---title-->
    <h1 style="padding-left: 12rem">Face Punch | admin</h1>

    <!---the left bar-->
    <div id="left" style="float: left; width: 12rem;">
        </>
    </div>

    <!---the posts-->
    <div id="posts" style="float: left; display: inline-block; width: 32rem;">
        <?php
            if (isset($_POST["pass"]) && sha1($_POST["pass"]) == "") // if the password is correct
            {
                // TODO: add stuff here so I can view posts and delete them
            }
            else
            {
                // redirect user back to index.php
                print("<script>alert(\"woops, wrong password!\"); window.loaction.href = \"index.php\";</script>");
            }
        ?>
        <table>
    </div>
</body>

</html>