<?php
require_once('funcs.php'); //funcs.phpを呼び出す、つまりL14～22を消してもよくなる

/**
 * [ここでやりたいこと]
 * 1. クエリパラメータの確認 = GETで取得している内容を確認する
 * 2. select.phpのPHP<?php ?>の中身をコピー、貼り付け
 * 3. SQL部分にwhereを追加
 * 4. データ取得の箇所を修正。
 */

$id = $_GET['id'];

//  try {
//     $db_name = 'gs_db_kadai3';    //データベース名
//     $db_id   = 'root';      //アカウント名
//     $db_pw   = '';      //パスワード：MAMPは'root'
//     $db_host = 'localhost'; //DBホスト
//     $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
// } catch (PDOException $e) {
//     exit('DB Connection Error:' . $e->getMessage());
// }

$pdo = db_conn();  //これはデータベース接続の関数

//２．データ詳細表示SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_kadai_table WHERE id = :id;');
$stmt->bindValue(':id' , $id, PDO::PARAM_INT);
$status = $stmt->execute(); 

//３．データ表示
$view = '';
if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    $result = $stmt->fetch();
}


    // while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {  //これでデータを取ってくる whileのループによって、結果リストの1つ1つにa href(リンク機能)を順番に付与している
    //     //GETデータ送信リンク作成
    //     // <a>で囲う。
    //     $view .= '<p>';
    //     $view .= '<a href="detail.php?id=' . $result['id'] . '">'; //. は結合するという意味
    //     $view .= $result['id'] . ' : ' . $result['indate'] . ' : ' . $result['name'];
    //     $view .= '</a>';
    //     $view .= '</p>';
    // }

?>




<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
(入力項目は「登録/更新」はほぼ同じになるから)
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>フリーアンケート</legend>
                <label>名前：<input type="text" name="name" value="<?= $result['name'] ?>"></label><br>
                <label>Email：<input type="text" name="email" value="<?= $result['email'] ?>"></label><br>
                <label>年齢：<input type="text" name="age"  value="<?= $result['age'] ?>"></label><br>
                <label><textarea name="content" rows="4" cols="40"><?= $result['content'] ?></textarea></label><br>

                <input type="hidden" name="id" value="<?= $result['id'] ?>">
                <!-- input type="hidden"にすることで、ブラウザ上から消え、IDを編集されないように出来る -->

                <input type="submit" value="送信">
                <!-- テキストエリアはValueが使えない -->
            </fieldset>
        </div>
    </form>
</body>

</html>