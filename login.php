<?php require_once('head2.php'); ?>
<body style="background-image: 'images/logo2.jpg' !important ">
    <div id="container">
        <div id="logo" style="font-size: 40px;color: white;padding-left: 75px;">
            SOFTWARE

        </div>
        <div id="loginbox">

            <form action="gestion.php" name="frm" method="post" 
                  onsubmit="return checkForm(document.frm);" >

                <input type="hidden" name="act" value="conexion"/>

                <input type="hidden" name="table" value="users"/>
                <input type="hidden" name="page" value="login.php" />
                <p>Entrer login et password pour continuer.</p>
                <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input class="form-control" type="text" placeholder="Login" name="login" id="login_required">
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span><input class="form-control" type="password" placeholder="Password" id="password_required" name="password">
                </div>
                <hr />
                <div class="form-actions">
                    <div class="pull-right"><input type="submit" class="btn btn-default" value="<?php echo _CONNEXION ?>" /></div>
                </div>

            </form>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>  
    <script src="js/unicorn.login.js"></script> 
</body>
</html>