# tweet3<?php
session_start();

require('dbconnect.php');

if(!empty($_POST)){
	//エラー項目の確認
	if($_POST['name']==''){
		$error['name']='blank';
	}
	if($_POST['email']==''){
		$error['email']='balnk';
	}
	if(strlen($_POST['password'])<4){
		$error['password']='length';
	}
	if($_POST['password']==''){
		$error['password']='blank';
	}
	if(empty($error)){
		$_SESSION['join']=$_POST;
		header('Location:check.php');
		exit();
	}

	}

	//書き直し
	if($_REQUEST['action']=='rewrite'){
		$_POST=$_SESSION['join'];
		$error['rewrite']=true;
	}

	//重複アカウントのチェック
	
?>
<p>記入してください</p>
<form action = "" method ="post">
	<dl>
		<dt>ニックネーム</dt>
		<dd>
			<input type = "text" name = "name">
			<?php if($error['name']=='blank'):?>
			<p class= "error">ニックネームを入力してください</p>
		<?php endif;?>
		</dd>
		
		<dt>メールアドれす</dt>
		<dd>
			<input type = "text" name = "email">
			<?php if($error['email']=='blank'):?>
			<p class= "error">メールアドれすを入力してください</p>
		<?php endif;?>
		</dd>
		
		<dt>パスワード</dt>
		<dd>
			<input type ="password" name ="password">
			<?php if($error['password']=='blank'):?>
			<p class= "error">パスワードを入力してください</p>
		<?php endif;?>
		</dd>
	</dl>
	<input type = "submit" value  ="送信する">
</form>
