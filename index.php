<?php
require_once('functions.php');
header('Set-Cookie: userId=123');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Home</title>
</head>
<body>
  welcome hello world
  <div>
     <a href="new.php">
       <p>新規作成</p>
     </a>
  </div>
  <div> 
    <table>
      <tr>
        <th>ID</th>
        <th>内容</th>
        <th>更新</th>
        <th>削除</th>
      </tr>
      <?php foreach (getTodoList() as $todo): ?>
        <tr>
          <td><?= $todo['id']; ?></td>
          <td><?= $todo['content']; ?></td>
          <!--<td><?//= e($todo['id']); ?></td>
          <td><?//= e($todo['content']); ?></td>-->
          <td>
            <a href="edit.php?id=<?= $todo['id']; ?>">更新</a>
            <!--<a href="edit.php?id=<?//= e($todo['id']); ?>">更新</a>-->
          </td>
          <td>
            <form action="store.php" method="post">
              <input type="hidden" name="id" value="<?= $todo['id']; ?>">
              <!--<input type="hidden" name="id" value="<?//= e($todo['id']); ?>">-->
              <button type="submit">削除</button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
</body>
</html>





<!--コード説明(bodyタグ内)
まず、ブラウザの上部にwelcome hello worldと表示します。
div要素でnew.phpへ遷移する新規作成リンクを作成。
次のdiv要素内でデータベースから取得したデータの表示について設定します。
データの表示は表形式で行いたいので、表形式で表示したい要素をtableタグで囲います。
まず、trタグで表の行を定義し、その中にthタグを配置して各行の見出しを設定します。
次に、phpでfunctions.phpで定義しているgetTodoList関数を呼び出し、データベース内のデータを走査します。
データを取得するごとに$todoに格納し、次の処理を行います。
まず、1行目には$todo内のidキーの値を表示します。2行目には$todo内のcontentキーの値を表示します。
3行目には更新リンクを表示し、リンク先は空にしておきます。
4行目には削除ボタンを表示します。
削除ボタンを押下した際の処理の設定について説明します。
formタグを使ってボタンが押されたときに指定したデータを削除するリクエストを送信するフォームを作成して表示します。
form要素では、まずリクエストの送信先にstore.phpを設定し、メソッドはpostに設定します。
次に、削除対象のデータを特定するために、type属性をhiddenを設定し、画面には表示されないフォームを用意します。
そのフォームにname属性がidの値が入るように設定し、その値をフォームの送信データに含めることで、削除対象を指定したデータ削除のリクエストを送信できます。
リクエストを送るためのボタンを用意し、ボタンに表示する文字列に削除を設定します。
以上の処理をデータベース内のデータを1件取得するたびに行います。


type=hidden　画面に表示されない入力欄を作成