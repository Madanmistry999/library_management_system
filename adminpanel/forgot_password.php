<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="forgotpassword.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    <div class="head">
        <h1 class="font-style">Library Management System(Admin Panel)</h1>
        <label class="font-style">Forgot Password</label>
    </div>

    <div class="form">
            
            <form method="post">

                <table class="tables">

                    <tr>
                        <td>Old Password</td>
                        <td>:</td>
                        <td><input type="password" name="oldpass" id="oldpass" placeholder="Enter Old Password"></td>
                    </tr>

                    <tr>
                        <td>New Password</td>
                        <td>:</td>
                        <td><input type="password" name="newpass" id="newpass" placeholder="Enter New Password"></td>
                    </tr>

                    <tr>
                        <td>Confirm New Password</td>
                        <td>:</td>
                        <td><input type="password" name="confirmnewpass" id="confirmnewpass" placeholder="Confirm New Password"></td>
                    </tr>

                </table>
                
                <div class="btn-container">
                    <button class="button-style" value="submit">Change Password</button>
                </div>
                
            </form>

        </div>
    </div>  
</body>
</html>