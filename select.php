<?php
require_once('funcs.php'); //funcs.phpを呼び出す、つまりL14～22を消してもよくなる

//【重要】
/**
 * DB接続のための関数をfuncs.phpに用意
 * require_onceでfuncs.phpを取得
 * 関数を使えるようにする。
 */
// try {
//     $db_name = 'gs_db_class3';    //データベース名
//     $db_id   = 'root';      //アカウント名
//     $db_pw   = '';      //パスワード：MAMPは'root'
//     $db_host = 'localhost'; //DBホスト
//     $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
// } catch (PDOException $e) {
//     exit('DB Connection Error:' . $e->getMessage());
// }
$pdo = db_conn();  //これはデータベース接続の関数

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_kadai_table;');
$status = $stmt->execute(); 

//３．データ表示
$view = '';
if ($status === false) {
    sql_error($stmt);
    // $error = $stmt->errorInfo();
    // exit('SQLError:' . print_r($error, true));
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {  //これでデータを取ってくる whileのループによって、結果リストの1つ1つにa href(リンク機能)を順番に付与している
        //GETデータ送信リンク作成
        // <a>で囲う。
        $view .= '<p>';
        $view .= '<a href="detail.php?id=' . $result['id'] . '">'; //. は結合するという意味
        $view .= $result['id'] . ' : ' . $result['name'] . '、' . $result['age'] . '歳、' . $result['email'] . '　';
        $view .= '</a>';

        $view .= '<a href="delete.php?id=' . $result['id'] . '">';
        $view .= '[ 削除 ]';
        $view .= '</a>';

        $view .= '</p>';
    }
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>アンケート表示</title>
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body id="main">
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">データ登録</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div>
        <div class="container jumbotron">
            <a href="detail.php"></a>
            <?= $view ?>
        </div>
    </div>
    <!-- Main[End] -->

</body>

</html>
