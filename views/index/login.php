<style>
/*登录*/
body{ background:#cce8f4; margin:0;}
ul li{ list-style:none;}
.bigbox{ width:100%;margin:0px auto; background:url(../web/images/fybg.jpg); height:100%;}
.fixedvox{ width:990px; margin:0 auto; height:100%;}
.fixedvox h1{ text-align:center; height:30px; font-size:30px;}

.logininput{ width:787px; height:323px; background-color:rgb(250,250,250); border-radius:8px; margin:40px auto;  background:url(../web/images/img-fy.png) no-repeat; position:relative;}
.password{ width:470px; height:300px; margin:0 auto; padding-top:5px;}
.password ul{ width:470px; margin:20px 0 0 0;}
.password ul li {height:50px;}
.password ul li.titlename{ text-align:center; font-size:22px; font-family:"微软雅黑"; padding-right:50px; color:#ea9100; height:60px;}
.password ul li label{ font-size:14px; width:100px; text-align:right; display:block; float:left; line-height:36px; margin-right:15px;}
.password ul li select{ width:226px; height:36px; border-radius:4px; border:1px solid #cacaca;float:left;}
.password ul li input{ width:226px; height:36px; border-radius:4px; border:1px solid #cacaca; float:left;}
.password ul li a{ color:#666; text-decoration:none;font-size:12px;}
.password ul li a:hover{ color:#F00; text-decoration:none;}
.password ul li span{ margin:0 5px; font-size:10px;}
.password ul li input[type=submit]{ width:120px; height:36px; line-height:30px; font-size:16px; background:#3180bf; color:#fff; cursor:pointer; margin-left:70px;}
.password ul li input[type=reset]{ width:120px; height:36px; line-height:30px; font-size:16px; background:#3180bf; color:#fff; cursor:pointer; margin-left:40px;}
.password ul li input:hover[type=submit]{ background:#1c6aa8;}
.password ul li input:hover[type=reset]{ background:#1c6aa8;}
.password ul li input[type=checkbox]{ width:18px; height:15px; float:left;}
.imgload { position:absolute; top:0px; right:110px;}
</style>

<div class="bigbox">
	<div class="fixedvox">
    <div style="height:80px;"></div>
       
        <div class="logininput">
        	<div class="password">
            	<ul>
                	<li class="titlename">委托案件电子管理系统</li>	
                    <li><label>法院名称</label><select><option>义乌市人民法院</option></select></li>
                	<li><label>登录名</label><input type="text"  name="LoginForm[username]" /></li>
               		<li><label>密码</label><input  type="password" name="LoginForm[password]" /></li>
                   
                    <li style="padding-left:255px; height:30px;"><input type="hidden" value="0" name="LoginForm[rememberMe]"><input type="checkbox" name="LoginForm[rememberMe]" id="login_form_remember_me" class="remenber" /><span>记住我</span></li>
                    <li><input type="submit"  value="登录" /><input type="reset"  value="重置" /></li>
                </ul>
            </div>
        </div>
        <!--<div class="logintable">
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
        </div>-->
    </div>
</div>