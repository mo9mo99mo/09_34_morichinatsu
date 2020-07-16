<?php
//共通関数の読込 データベース接続
//セッション開始
session_start();

// 外部ファイル読込
include('09_11_KITAJIMA/functions.php');

// ログイン状態をチェック idチェック関数実行
//check_session_id();

//ログインか非ログインで表示切替え
if (isset($_SESSION['session_id'])) {
    //ログイン時の処理
    $username = $_SESSION['username'];
    $e_username = htmlspecialchars($username, \ENT_QUOTES, 'UTF-8');
    $e_link = '<a href="logout.php">ログアウト</a>';
} else {
    //未ログイン時の処理
    $e_username = 'ゲスト';
    $e_link = '<a href="login.php">ログイン</a>';
}

//DB接続
$pdo = connect_to_db();

// データ取得SQL作成
// $sql = "SELECT user.id, user.username, news.id, news.title, news.category, news.url, news.created_at, news.comment, news.use_id, like.user_id, like.news_id, comment.news_id, comment.action_comment, comment.username, comment.rating, comment.created_at FROM news_table AS news JOIN users_table AS user ON news.use_id = user.id RIGHT JOIN like_table AS like ON news.id = like.news_id RIGHT JOIN comments_table AS comment ON news.id = comment.news_id WHERE news.id";
$sql = "SELECT * FROM `kqfm_news_table` as news LEFT OUTER JOIN kqfm_user_table AS user ON news.news_id = user.user_id LEFT OUTER JOIN kqfm_like_table AS likes ON news.news_id = likes.like_id LEFT OUTER JOIN kqfm_favo_table AS favo on news.news_id = favo.favo_news_id ORDER BY news_created_at DESC LIMIT 5";
// SQL準備&実行
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
    // fetchAll()関数でSQLで取得したレコードを配列で取得できる
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // データの出力用変数（初期値は空文字）を設定
}

// $sql = "SELECT * FROM `kqfm_news_table` as news LEFT OUTER JOIN kqfm_user_table AS user ON news.news_id = user.user_id LEFT OUTER JOIN kqfm_like_table AS likes ON news.news_id = likes.like_id LEFT OUTER JOIN kqfm_favo_table AS favo on news.news_id = favo.favo_news_id ORDER BY news_created_at COUNT DESC LIMIT 5";
// $sql = "SELECT like_news_id, COUNT(like_id) AS cnt FROM kqfm_like_table GROUP BY like_news_id";
$sql = "SELECT * FROM kqfm_news_table AS news LEFT OUTER JOIN kqfm_user_table AS user ON news.news_id = user.user_id LEFT OUTER JOIN ( SELECT like_news_id, COUNT(like_id) AS cnt FROM kqfm_like_table GROUP BY like_news_id) AS likes ON news.news_id = likes.like_news_id";
// SQL準備&実行
$stmt = $pdo->prepare($sql);
$news_l_cnt = $stmt->execute();

// データ登録処理後
if ($news_l_cnt == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
    // fetchAll()関数でSQLで取得したレコードを配列で取得できる
    $news_l_rank = $stmt->fetchAll(PDO::FETCH_ASSOC);  // データの出力用変数（初期値は空文字）を設定
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>なんちゃらニュースマガジン｜みんなのニュースを発信するWebメディア</title>
    <link href="https://fonts.googleapis.com/earlyaccess/nicomoji.css" rel="stylesheet">
    <link rel="stylesheet" href="index/css/reset.css">
    <link rel="stylesheet" href="index/css/style.css">
</head>

<body>
    <header>
        <h1>なんちゃらニュースマガジン</h1>
        <div class="user_info">
            <h3>こんにちは、<?php echo $e_username ?> さん</h3>
            <ul class="user_page">
                <li><a href="mypage2.php" class="text-dark">マイページ</a></li>
                <li><?php echo $e_link ?></li>
            </ul>
        </div>
    </header>
    <main>
        <section id="main_topics">
            <div class="l_2columns">
                <div class="pickup_card_block" id="main_news">
                    <div class="pickup_card">
                        <div class="news_caps">
                            <span class="news_date">2020.07.13</span>
                            <span class="news_tag">カテゴリー</span>
                        </div>
                        <h2 class="news_ttl">注目ニュースのタイトル</h2>
                        <p class="news_txt">ニューステキスト要約ニューステキスト要約ニューステキスト要約ニューステキスト要約ニューステキスト要約ニューステキスト要約ニューステキスト要約</p>
                    </div>
                    <div class="pickup_card comment">
                        <h3 class="news_ttl">ニュースへのコメント</h3>
                        <div class="news_caps">
                            <span class="news_date">いいね 数 件 / </span>
                            <span class="news_date">コメント数</span>
                        </div>
                        <dl>
                            <dt>ユーザー名</dt>
                            <dd>コメントコメントコメントコメント</dd>
                            <dt>ユーザー名</dt>
                            <dd>コメントコメントコメントコメント</dd>
                            <dt>ユーザー名</dt>
                            <dd>コメントコメントコメントコメント</dd>
                            <dt>ユーザー名</dt>
                            <dd>コメントコメントコメントコメント</dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div id="trend_latest_news" class="r_2columns">
                <div class="news_list_block">
                    <!-- tab -->
                    <div class="tab_area">
                        <input id="trend_news" type="radio" name="tab_btn" checked>
                        <label class="tab_btn" for="trend_news">トレンドニュース</label>
                        <input id="latest_news" type="radio" name="tab_btn">
                        <label class="tab_btn" for="latest_news">最新のニュース</label>

                        <div class="tab_content" id="trend_news_block">
                            <h2>トレンドニュース</h2>
                            <p>トレンドニュース説明文トレンドニュース説明文トレンドニュース説明文</p>
                            <ul>
                                <?php foreach ($news_l_rank as $record) : ?>
                                    <li>
                                        <h3><a href="<?= $record['url'] ?>"><?= $record['news_title'] ?></a></h3>
                                        <div class="news_caps">
                                            <span class="news_date"><?= $record['news_created_at'] ?></span>
                                            <span class="news_author"><?= $record['user_username'] ?></span>
                                            <span class="news_tag"><?= $record['news_category'] ?></span>
                                            <span class="news_like">いいね数<?= $record['cnt'] ?>件</span>
                                        </div>
                                    </li>
                                <?php endforeach ?>
                                <li>
                                    <h3>トレンドニュース02のタイトル</h3>
                                    <div class="news_caps">
                                        <span class="news_date">2020.07.13</span>
                                        <span class="news_tag">カテゴリ名</span>
                                        <span class="news_like">いいね数</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!--/trend_news_block-->

                        <div class="tab_content" id="latest_news_block">
                            <h2>最新のニュース</h2>
                            <p>最新ニュース説明文最新ニュース説明文最新ニュース説明文</p>
                            <ul>
                                <?php foreach ($result as $record) : ?>
                                    <li>
                                        <h3><a href="<?= $record['url'] ?>"><?= $record['news_title'] ?></a></h3>
                                        <div class="news_caps">
                                            <span class="news_date"><?= $record['news_created_at'] ?></span>
                                            <span class="news_author"><?= $record['user_username'] ?></span>
                                            <span class="news_tag"><?= $record['news_category'] ?></span>
                                            <span class="news_like">いいね数</span>
                                        </div>
                                    </li>
                                <?php endforeach ?>
                                <li>
                                    <h3>最新ニュース02のタイトル</h3>
                                    <div class="news_caps">
                                        <span class="news_date">2020.07.13</span>
                                        <span class="news_tag">カテゴリ名</span>
                                        <span class="news_like">いいね数</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!--/latest_news_block-->
                    </div><!-- /tab -->
                </div>
                <!--/news_list_block-->
        </section>
        <!--/main_topics-->
        <section id="editors_recommend">
            <h2>編集部イチオシ</h2>
            <p>編集部イチオシニュース説明文編集部イチオシニュース説明文</p>
            <div class="pickup_card">
                <div class="news_caps">
                    <span class="news_date">2020.07.13</span>
                    <span class="news_tag">カテゴリー</span>
                </div>
                <h3 class="news_ttl">注目ニュースのタイトル</h3>
                <p class="news_txt">ニューステキスト要約ニューステキスト要約ニューステキスト要約ニューステキスト要約ニューステキスト要約ニューステキスト要約ニューステキスト要約</p>
            </div>
            <div class="pickup_card">
                <div class="news_caps">
                    <span class="news_date">2020.07.13</span>
                    <span class="news_tag">カテゴリー</span>
                </div>
                <h3 class="news_ttl">注目ニュースのタイトル</h3>
                <p class="news_txt">ニューステキスト要約ニューステキスト要約ニューステキスト要約ニューステキスト要約ニューステキスト要約ニューステキスト要約ニューステキスト要約</p>
            </div>
            <div class="pickup_card">
                <div class="news_caps">
                    <span class="news_date">2020.07.13</span>
                    <span class="news_tag">カテゴリー</span>
                </div>
                <h3 class="news_ttl">注目ニュースのタイトル</h3>
                <p class="news_txt">ニューステキスト要約ニューステキスト要約ニューステキスト要約ニューステキスト要約ニューステキスト要約ニューステキスト要約ニューステキスト要約</p>
            </div>
        </section>
        <section id="hot_categories">
            <h2>今注目のカテゴリー</h2>
            <div class="tag_lists">
                <span><a href="#">カテゴリ名</a></span>
                <span><a href="#">カテゴリ名</a></span>
                <span><a href="#">カテゴリ名</a></span>
                <span><a href="#">カテゴリ名</a></span>
                <span><a href="#">カテゴリ名</a></span>
                <span><a href="#">カテゴリ名</a></span>
                <span><a href="#">カテゴリ名</a></span>
                <span><a href="#">カテゴリ名</a></span>
                <span><a href="#">カテゴリ名</a></span>
                <span><a href="#">カテゴリ名</a></span>
            </div>

        </section>
    </main>
</body>

</html>