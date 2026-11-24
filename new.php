<?php
require_once('functions.php');
setToken();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>新規作成</title>
</head>
<body>
  <!-- <?php if (!empty($_SESSION['err'])): ?>
    <p><?= $_SESSION['err']; ?></p>
  <?php endif; ?> 追記 -->
  <form action="store.php" method="post">
    <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>"> <!-- 追記 -->
    <input type="text" name="content">
    <input type="submit" value="作成">
  </form>
  <div>
    <a href="index.php">一覧へもどる</a>
  </div>
  <?php unsetError(); ?>
</body>
</html>
















<!--コード説明(bodyタグ内)
form要素を用意し、action属性でフォームの送信先としてstore.phpを指定し、
method属性でHTTPメソッドにpostを指定し、フォームの入力データをリクエストの本文に入れて送信するようにしています。
次に、input要素を用意し、type属性をtextに設定することで、ブラウザに文字を入力するテキストフィールドが表示されるようにします。
そして、name属性にcontentを指定することで、送信先で入力値をcontentというキーで取得できるようにしています。
次に、input要素を用意し、type属性をsubmitに設定することで、ブラウザに送信ボタンが表示されるようにします。
ボタン名はvalue属性で作成と指定しています。
次に、div要素を用意し、その中にa要素を用意して、href属性でリンク先としてindex.phpを指定しています。
「一覧へもどる」をクリックすると、index.phpに遷移するようになっています。-->