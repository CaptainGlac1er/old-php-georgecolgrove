<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <form action="#" method="post">
            Username:<br/>
            <input type="text" name="username"><br />
            email:<br />
            <input type="text" name="email"><br />
            password<br />
            <input type="password" name="password1"><br />
            retype<br />
            <input type="password" name="password2"><br />
            <input type="submit" name="Submit" value="Submit">
        </form>
    </body>
</html>
<?php
if(isset($_POST['Submit'])){
    var_dump($_POST);
}

?>
