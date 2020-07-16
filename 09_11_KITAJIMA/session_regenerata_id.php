<?php
// sessionをスタートしてidを再生成しよう．
// 旧idと新idを表示しよう．
session_start(); // セッション開始
$old_session_id = session_id();
// var_dump($old_session_id);
// exit();
session_regenerate_id(true);
$new_session_id = session_id();
// var_dump($old_session_id);
// var_dump($new_session_id);
// exit();
echo '<p>旧id' . $old_session_id . '</p>';// idの確認
echo '<p>新id' . $new_session_id . '</p>';
?>