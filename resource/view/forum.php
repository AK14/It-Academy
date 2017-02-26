<?php
// если было отправка методом POST
    if(isset($_POST) ){
       $name = $_POST['author'];
       $text = $_POST['text'];
       echo $name."<br>" . $text."<br>";
    }

?>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>
        Hello friend.
    </title>

    <!-- Styles -->
    <link href="../../vendor/twbs/bootstrap/dist/css/bootstrap.css" rel="stylesheet">


</head>
<body>


<section class="container">
<!--    форма добавления нового комментария -->
    <form class="form-horizontal col-md-6 col-md-offset-3" method="post" action="forum.php">
        <label for="author"> Автор </label>
        <input type="text" class="form-control" name="author">
        <label for="text"> Сообщение </label>
        <textarea class="form-control" name="text"></textarea>
        <br>
        <input type="submit" class="btn bg-info" value="submit">
    </form>
</section>

</body>
<!-- Scripts -->
<script type="text/javascript" href="../../vendor/twbs/bootstrap/dist/js/bootstrap.js">
</script>
</html>

