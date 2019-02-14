<!DOCTYPE html>
<html>
    <head>
        <title>
            Form Pendaftaran
        </title>
    </head>
    <body>
        <form method="post">
            <table width="600" align="center" border="1" cellspacing="5" cellpadding="5">
                <tr>
                    <td colspan="2"><?= $error; ?></td>
                </tr>
                <tr>
                    <td width="230">Enter Your Name</td>
                    <td width="329"><input type="text" name="name"/></td>
                </tr>
                
                <tr>
                    <td>Enter Your Email</td>
                    <td><input type="text" name="email"/></td>
                </tr>
                
                <tr>
                    <td>Enter Your Password</td>
                    <td><input type="password" name="password"/></td>
                </tr>
                
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="register" value="daftar"/></td>
                </tr>
            </table>
        </form>
    </body>
</html>

