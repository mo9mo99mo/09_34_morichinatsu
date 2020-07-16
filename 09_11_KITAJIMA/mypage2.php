<?php
// DB接続の設定
// DB名は`gsacf_x00_00`にする
session_start();
include("functions.php");

$id=$_SESSION["post_id"]; //login_actのセッション変数のところの名前と合わせる

// $user_id=$_["user_id"];
$pdo = connect_to_db();

// データベースにデータがあるか
$sql = 'SELECT * FROM news_table
--  WHERE user_id=:user_id AND is_deleted=0';
// var_dump($sql);
// exit();
$stmt = $pdo->prepare($sql);
// $stmt->bindValue(":user_id", $user_id, PDO::PARAM_STR);
// var_dump($stmt);
// exit();
$status = $stmt->execute();
// var_dump($status);
// exit();
// SQL準備&実行
$view='';

// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  exit('sqlError:'.$error[2]);
} else {
  // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
  // fetchAll()関数でSQLで取得したレコードを配列で取得できる
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // データの出力用変数（初期値は空文字）を設定
  var_dump($result);
  $output = "";
  // <tr><td>deadline</td><td>todo</td><tr>の形になるようにforeachで順番に$outputへデータを追加
  // `.=`は後ろに文字列を追加する，の意味
  foreach ($result as $record) {
    $output .= "<tr>";
    $output .= "<td>{$record["title"]}</td>";
    $output .= "<td>{$record["url"]}</td>";
    $output .= "<td>{$record["category"]}</td>";
    // var_dump($output);
    // exit();
    // edit deleteリンクを追加
    $output .= "<td><a href='like_create.php?user_id={$user_id}&todo_id={$record["id"]}'>like{$record["cnt"]}</a></td>";
    $output .= "<td><a href='todo_edit.php?id={$record["id"]}'>edit</a></td>";
    // $output .= "<td><a href='todo_delete.php?id={$record["id"]}'>delete</a></td>";
    $output .= "</tr>";
    // var_dump($output);
    // exit();
  }}
  // $valueの参照を解除する．解除しないと，再度foreachした場合に最初からループしない
  // 今回は以降foreachしないので影響なし
  unset($value);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Mypage</title>
</head>

<body>
    <div class="logout-b">
    <a href class="bt-samp12">
        <i class="fa fa-chevron-circle-right"></i> Logout
    </a>
    </div>
    <div class="cp_tab">
        <input type="radio" name="cp_tab" id="tab1_1" aria-controls="first_tab01" checked>
        <label for="tab1_1">Post</label>
        <input type="radio" name="cp_tab" id="tab1_2" aria-controls="second_tab01">
        <label for="tab1_2">Favorite</label>
        <div class="cp_tabpanels">
            <div id="first_tab01" class="cp_tabpanel">
              <h2>Post</h2>
              <p>～私の投稿記事～</p>
              <table>
                <tr>
                    <th>Title</th>
                    <th>URL</th>
                    <th>Category</th>
                    <th>いいね数</th>
                    <th>シェア</th>
                </tr>
                <?= $output ?>
                
              </table>
            </div>
            <!-- <div id="first_tab02" class="cp_tabpanel">
              <h2>Favorite</h2>
              <p>～私のお気に入り記事～</p> -->
              <div id="second_tab01" class="cp_tabpanel">
              <h2>Favorite</h2>
              <p>～私のお気に入り記事～</p>
              <table>
                <tr>
                    <th>Title</th>
                    <th>URL</th>
                    <th>Category</th>
                    <th>いいね数</th>
                    <th>シェア</th>
                </tr>
                <?= $output ?>
              </table>
              </div>
            </div>
        </div>
    </div>
    
</body>
</html>