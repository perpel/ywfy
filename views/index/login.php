<h1>System Login...</h1>

<form action="index.php?r=index/login" method="post">
    
    <table>
        <tr>
            <td>number</td>
            <td><input type="text" name="LoginForm[username]"></td>
        </tr>
        <tr>
            <td>pw</td>
            <td><input type="password" name="LoginForm[password]"></td>
        </tr>
        <tr>
            <td></td>
            <td>
                
                <label for="loginform-rememberme">
                <input type="hidden" name="LoginForm[rememberMe]" value="0">
                <input type="checkbox" id="loginform-rememberme" name="LoginForm[rememberMe]" value="1">
                Remember Me
                </label>

            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="submit">
                    <input type="reset" value="reset"></td>
        </tr>
    </table>

</form>