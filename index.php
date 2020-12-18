<?php
//初期設定（XSS、クリックジャンクション、データベース
require_once('Base/syoki_settei.php');

//　XSSエスケープ
$_POST=h($_POST);

//SESSIONのランク、IDを得る
if(isset($_POST['show'])){
  $show = h($_POST['show']);
}else{
  $show = "";
}
?>

<!DOCTYPEhtml>
<html lang="ja">
<head>
<?php
//htmlの初期設定を別ファイルに
require_once('Base/kijutu.html');
?>
<meta content="複数店店舗管理経験者が店舗管理ツールを作って紹介するページ" name="description">
<title>複数店店舗管理経験者が作るwebツール</title>
<link rel="stylesheet" type="text/css"
 href="css/mystyle.css?<?php echo date('Ymd-Hi');?>">
</head>
<body>
<header>
<h1><img src="image/m_title.png" class="imagesize" alt="STORAGE"></h1>
<a href="profile.php"><img src="image/s_title.png" class="imagesize_sub" title="プロフィールを表示します" alt="For Katsuyki Mitsuoka"></a>
  <form method="POST" action="<?php echo h($_SERVER['SCRIPT_NAME']);?>">
    <input type="hidden" name="show" value="show">
    <input type="submit" class="menubutton" value="管理ツール" >
    <input type="button" class="menubutton" value="Numbers３集計" onclick="location.href='alchematics.php'">
    <input type="button" class="menubutton" value="Other" onclick="location.href='other_menu.php'">
    <input type="button" class="menubutton" value="ログイン" onclick="location.href='DB_manage.php'">
  </form>
</header>


<?php
if ($show !=""){
?>
<div class="center">
  <h2>Works</h2>
  <p>リストを選択するとサンプルが表示されます</p>
  <ul class="center">
    <li class="left_text"><a href="Portfolio/payroll.php">勤務時間の計算</a></li>
    <li class="left_text"><a href="Portfolio/Nippou.php">店舗日報の管理</a></li>
    <li class="left_text"><a href="Portfolio/shift_chart.php">シフト表作成（24時間のコンビニ用）</a></li>
    <li class="left_text"><a href="Portfolio/Document_make.php">PDFで履歴書出力</a></li>
  </ul>
</div>
<?php
}
 ?>
</body>

</html>
