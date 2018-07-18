
<body>
<div id="register" style="overflow:auto;background:#FDFDF6;padding:20px;width:1000px;max-width:100%;border-radius:6px"">
<form method="post" target="_parent">
    <fieldset style="border:0;">
        <ul style="list-style:none">
            <h1>Register</h1>
            <hr class="my-">

            <div class="row">
                <div class="col-md-3">
                    <div class="form-check">
                        <img src="assets/images/01.svg"><br>
                        <p class="text-center" style="padding-top: 10px;">
                            <input class="form-check-input" type="radio" name="pic" value="assets/images/01.svg" required>
                            <label class="form-check-label" for="inlineRadio1">Profile 1</label>
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check">
                        <img src="assets/images/02.svg"><br>
                        <p class="text-center" style="padding-top: 10px;">
                            <input class="form-check-input" type="radio" name="pic" value="assets/images/02.svg" required>
                            <label class="form-check-label" for="inlineRadio1">Profile 2</label>
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check">
                        <img src="assets/images/03.svg"><br>
                        <p class="text-center" style="padding-top: 10px;">
                            <input class="form-check-input" type="radio" name="pic" value="assets/images/03.svg" required>
                            <label class="form-check-label" for="inlineRadio1">Profile 3</label>
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check">
                        <img src="assets/images/04.svg"><br>
                        <p class="text-center" style="padding-top: 10px;">
                            <input class="form-check-input" type="radio" name="pic" value="assets/images/04.svg" required>
                            <label class="form-check-label" for="inlineRadio1">Profile 4</label>
                        </p>
                    </div>
                </div>
            </div>

            <label for="number">Username</label>
            <input class="form-control" type='text' name='username' placeholder='Username' value="<?php echo $username?>" require><br>
            <label for="number">Password</label>
            <input class="form-control" type='password' name='password' placeholder='Password'  require><br>
            <label for="number">Confirm password</label>
            <input class="form-control" type='password' name='con_password' placeholder='Confirm password' require><br>
            <label for="number">Email</label>
            <input class="form-control" type='email' name='Email' placeholder='Email' value="<?php echo $Email?>" require><br>
            <input class="btn btn-primary" type='submit' name='submit' value='register'>
        </ul>
</form>
</div>

</body>