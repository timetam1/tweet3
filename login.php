# tweet3<?php
require('dbconnect.php');

session_start();
if(!empty($_POST)){
	//ログイン処理
	if($_POST['email']!=''&& $_POST['password']!=''){
		$sql = sprintf('SELECT * FROM members WHERE email = "%s" AND password = "%s"',
			mysqli_real_escape_string($db,$_POST['email']),
			mysqli_real_escape_string($db,sha1($_POST['password']))
			);
		$record = mysqli_query($db,$sql) or die(mysqli_error($db));
		if($table=mysqli_fetch_assoc($record)){
			//ログイン成功
			$_SESSION['id']=$table['id'];
			$_SESSION['time']=time();
			header('Location:index.php');
			exit();
		}else{
			$error['login']='failed';
		}
	}else{
		$error['login']='blank';
	}
}
?>
<div id ="lead">
<p>メールアドレすとパスワードを記録してログインしてください</p>
<p>入会手続きがまだのかたは</p>
</div>
<form action = "" method  = "post">
	<dl>
		<dt>メールアドレす</dt>
		<dd>
			<input type = "text" name="email" value = "<?php echo htmlspecialchars($_POST['email']);?>">
			<?php if($error['login']=='blank'):?>
				<p class = "error">メールアドれすとパスワードを入力してください</p>
			<?php endif;?>
			<?php if($error['login']=='failed'):?>
				<p class = "error">ログインに失敗しました</p>
			<?php endif;?>
		</dd>

		<dt>パスワード</dt>
		<dd>
			<input type = "text" name = "password">
		</dd>

		<dt>ログイン情報の記録</dt>
		<dd>
			<input type = "checkbox" name = "save" value = "on">
			<label for="save">次回からは自動ログインする</label>
		</dd>

	</dl>
	<div><input type ="submit" value= "ログインする"/></div>
</form>
