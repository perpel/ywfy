<h1>登陆</h1>

<form action="index.php?r=index/login" method="post">
	
	<table>
		<tr>
			<td>账号：</td>
			<td><input type="text" name="LoginForm[username]"></td>
		</tr>

		<tr>
			<td>密码：</td>
			<td><input type="password" name="LoginForm[password]"></td>
		</tr>

		<tr>
			<td></td>
			<td>
				<input type="hidden" value="0" name="LoginForm[rememberMe]">
				<input type="checkbox" name="LoginForm[rememberMe]" id="login_form_remember_me">
				<label for="login_form_remember_me">记住我</label>
			</td>
		</tr>

		<tr>
			<td></td>
			<td>
				<input type="submit" value="登陆">
				<input type="reset" value="重置">
			</td>
		</tr>
	</table>

</form>