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
        h1 {
            font-size: 5rem;
            margin-top: 0;
            margin-bottom: 0;
        }
        #title {
            font-size: 2rem;
            margin-top: 0;
            margin-bottom: 0;
        }
        #body {
            font-size: 1rem;
            margin-top: 0;
            margin-bottom: 0;
        }
        input {
            font-size: 1rem;
            width: 33.7rem;
            margin-bottom: 0;
            margin-top: 0;
        }
</style>
    <img src="https://i.kym-cdn.com/entries/icons/original/000/000/091/TrollFace.jpg" style="width: 12rem; height: auto; position: absolute;">
    <!---title-->
    <h1 style="padding-left: 12rem; padding-top: 1rem">Face Punch</h1>

    <!---the left bar-->
    <div id="left" style="float: left; width: 12rem;">ok then</div>

    <div id="about" style="float: left;">
        <?php
            if (str_ends_with($_GET["file"], ".txt"))
            {
                $content = readfile($_GET["file"]);
                if ($content == "0")
                {
                    print("hmm... this file is empty");
                    die;
                }
                print($content);
            }
            else
            {
                print("woops... file not found");
            }
        ?>
    </div>
</body>
</html>
