<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css.css">
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 
</head>
<body>
<?php
if (isset($_SESSION['login'])) {
	echo "
        Hello {$_SESSION['login']}
	<a href='logout.php' class='logout'>Logout</a>";
} else {
	if ($_GET['register'] != "1") {
		echo('            
                    <div class="col-12" align="center">
                        <form action="login.php" class="form-two" method="post">
                                <div class="form-p"><h4>Log in</h4></div>
                                <div class="form-p">
                                        <input type="text" name="login" placeholder="Login" class="form-text">
                                </div>
                                <div class="form-p">
                                        <input type="text" name="password" placeholder="Password" class="form-text">
                                </div>
                                <br>
                                <div class="form-p text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                <br>
                                <div><a href="index.php?register=1"><button type="button" class="btn btn-outline-primary">Register</button></a></div>
                        </form>
                    </div>
                ');
	} else {
		echo('
                    <div class="col-12" align="center">
                        <form action="register.php" class="form-two" method = "post" >
                                <div class="form-p"><h4>Register</h4></div>
                                <div class="form-p" >
                                        <input type = "text" name = "login" placeholder = "Login" class="form-text" >
                                </div >
                                <div class="form-p" >
                                        <input type = "text" name = "password" placeholder = "Password" class="form-text" >
                                </div >
                                <br>
                                <div class="form-p text-center" >
                                        <button type = "submit" class="btn btn-primary"> Submit</button >
                                </div >
                                <br>
                                <div><a href="index.php?"><button type="button" class="btn btn-outline-primary">Log in</button></a></div>
                        </form>
                     </div>
                ');
	}
}
?>
<script>

        $(function() {
                $('form').submit(function(e) {
                        var $form = $(this);
                        $.ajax({
                                type: $form.attr('method'),
                                url: $form.attr('action'),
                                data: $form.serialize()
                        }).done(function(data) {
                                console.log(data);
                                if(data == 'true') {
                                        location.reload();
                                } else {
                                        alert('Wrong login or password');
                                }
                        }).fail(function() {
                                alert('Wrong login or password');
                        });

                        e.preventDefault();
                });
        });



</script>
</body>
</html>