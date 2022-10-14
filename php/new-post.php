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
        #post-title {
            font-size: 2.5rem;
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
    <!---title-->
    <h1 style="padding-left: 12rem">Face Punch</h1>

    <!---the left bar-->
    <div id="left" style="float: left; width: 12rem;">ok then</div>

    <!---the posts-->
    <div id="new-post" style="float: left;">
        <form action="POST" action="./index.php">
            <label for="title" id="post-title">post title</label>
            <br>
            <input type="text" name="title" id="title" maxlength="32">
            <br>
            <textarea name="body" id="body" cols="58" rows="10" maxlength="350" resize="none"></textarea>
            <br>
            <input type="submit" value="done!" style="width: 34.2rem;">
        </form>
    </div>
</body>
</html>
