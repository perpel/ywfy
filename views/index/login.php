<style>
/*登录*/
ul li{ list-style:none;}
.bigbox{ width:100%;margin:10px auto;}
.logintable{ margin:10px auto; width:990px; text-align:center;}
.logintable table{ line-height:45px; width:100%;}
.bigbox h1{ border-bottom:2px solid #accbeb; text-align:center; height:50px; font-size:30px;}
.logintable table td{font-size:14px;}

.logintable table input[type=text]{ width:250px; height:28px; line-height:28px; background:#fff; border:1px solid #cacaca; border:none; text-indent:1em;}
.logintable table input[type=password]{ width:250px; height:28px; line-height:28px; background:#fff; border:1px solid #cacaca; border:none;text-indent:1em;}
.logintable table td label{font-size:14px;}
.logintable table select{ width:250px; height:28px; line-height:28px; border:1px solid #cacaca;}
.logintable table input.remenber{ width:18px; height:15px;}
.logintable table td.resetinput input{ background:#0d71d7; border:none; color:#fff; width:80px; height:30px; margin-right:55px; cursor:pointer;}
</style>

<div class="bigbox">
<h1>委托案件电子管理系统</h1>
<div class="logintable">


<form action="index.php?r=index/login" method="post">
       <table cellspacing="0">
            <tr>
                <td align="right" width="40%">法院名称：</td>
                <td><select><option>义乌市人民法院</option></select></td>
            </tr>
            <tr>
            <td align="right" width="40%">账号：</td>
                <td><input type="text" name="LoginForm[username]"></td>
            </tr>
            <tr>
            <td align="right" width="40%">密码：</td>
                <td><input type="password" name="LoginForm[password]"></td>
            </tr>
            <tr>
            <td></td>
                <td>
                    <input type="hidden" value="0" name="LoginForm[rememberMe]">
                    <input type="checkbox" name="LoginForm[rememberMe]" id="login_form_remember_me" class="remenber">
                    <label for="login_form_remember_me">记住我</label>
                </td>
            </tr>
            <tr>
               <td></td>
                <td class="resetinput"><input type="submit" value="登陆">
                    <input type="reset" value="重置">
                </td>
            </tr>
        </table>
    </div>
</div>