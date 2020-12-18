<?php
// 初期設定（XSS、クリックジャンクション、データベース
require_once('Base/syoki_settei.php');

//　XSSエスケープ
$_POST=h($_POST);

if(isset($_POST['pass'])){
  $r_pass = password_hash(h($_POST['pass']),PASSWORD_DEFAULT);
}else{
  $r_pass="";
}

?>

<!DOCTYPE html >
<html lang="ja">
<head>
  <?php
  //htmlの初期設定を別ファイルに
  require_once('Base/kijutu.html');
  ?>
<title>Textのhash生成</title>
<link rel="stylesheet" type="text/css"
href="css/mystyle2.css?<?php echo date('Ymd-Hi');?>">
</head>

<body>
  <header class="menuheder">
 <h1>ハッシュの生成</h1>
 <form>
 <p>
   ログインパスワードの照合用など、ハッシュ化したい時お使いください。
   <input type="button" value="戻る" class="menubutton" onclick="location.href='other_menu.php'">
 </p>
</form>
</header>
<div class="content">
 <form action="<?php echo h($_SERVER['SCRIPT_NAME']);?>" method="post">
    <dl>
      <dt>◎テキストを入力して実行するボタンを押してください</dt>
      <dd>任意のテキスト：<input type="text" name="pass" value="">
      <input type="submit" class="button" value="生成" >
      </dd>
    </dl>
  </form>
  <?php
 if($r_pass !=""){
   echo '<p class="Explanation">',$r_pass,"<?p>";
   if(password_verify($_POST['pass'],$r_pass)){
     echo"<p>[&nbsp;",$_POST['pass'],"&nbsp;]のハッシュを生成しました。</p>";
   }
 }
   ?>
</div>
</body>
</html>
