<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//error_reporting(-1); 5行目と同義
//ini_set('error_reporting', E_ALL); 5行目と同義
set_error_handler('errorHandler');
function errorHandler($errNo, $errStr, $errFile, $errLine) {
  if ($errNo === E_NOTICE || $errNo === E_WARNING) {
    $errTitle = $errNo === E_NOTICE ? 'Notice' : 'Warning';
    $escapedErrStr = htmlspecialchars($errStr);
    $escapedErrFile = htmlspecialchars($errFile);

    echo '<b>' . $errTitle . '</b>: ' . $escapedErrStr . ' in <b>' . $escapedErrFile . '</b> on line <b>' . $errLine . '</b>';
      exit;
  }

  return false;
}

define('DSN', 'mysql:dbname=php_lesson;host=localhost;unix_socket=/tmp/mysql.sock');
define('DB_USER', 'root');
define('DB_PASSWORD', 'call'); 








/*コード説明
config.phpでは、エラー処理の設定とDB接続情報の定義を行っています。
エラー処理の設定は、PHPのビルトイン関数のini_setを使用し、display_errorsを1に設定することでエラーを表示させるようにします。
次の行では、display_startup_errorsを1に設定しています。この設定でPHPの起動シーケンスにおいて発生するエラーも表示させます。 
同じくビルトイン関数のerror_reportingは出力するエラーの種類を設定する関数で、今回はE_ALLとし、すべてのエラーを報告するように設定しています。
次に、同じくビルトイン関数のset_error_handlerを使用し、エラーが発生したら次行以降で定義しているerrorHandler関数で処理されるようにします。
次に、errorHandler関数を定義します。関数には4つの引数を持たせています。
第1引数がエラーレベル、第2がエラーメッセージ、第3がエラーが起きているファイル名、第4がエラーが発生したスクリプトの行番号、をそれぞれ受け取る役割を担います。
そして、if文を使い、条件式をエラーレベルが、定数E_NOTICEまたは定数E_WARNINGと等しいかどうかを判定して等しい場合は
まず三角演算子を使って、$errTitleにエラーレベルが定数E_NOTICEと等しければ'Notice'を、そうでなければ'Warning'を代入するようにします。
次に$escapedErrStrにビルトイン関数のhtmlspecialcharsを使ってエラーメッセージに特殊文字が含まれていた場合はHTMLエンティティに変換して代入します。
同じく$escapedErrFileにも同じ関数を使ってファイル名を代入します。
<>や&,'や"などはHTML文書では意味を持つ特殊文字のため、HTMLエンティティに変換する必要があります。
以上の処理を行って、それぞれの変数に格納されている値を文字列結合で表示します。なお、<b>タグで囲っている変数は太字で表示されます。
エラー表示したらexitで、PHPのスクリプトの実行を終了させるようにします。
また、エラーレベルがif文の条件式に当てはまらない場合は、戻り値としてfalseを返します。
そうすることで、条件に当てはまらないエラーはPHP標準のエラー処理に任せることができます。

次に、define関数を使用して、データベース接続に必要な定数を定義しています。
DSNにはドライバ、データベース名、　ホスト名、ソケットのパスを指定し、
DB_USERにはデータベースのユーザー名、
DB_PASSWORDにはデータベースのパスワードを指定しています。


E_NOTICE 実行時の注意。エラーを示しているかもしれない何かに遭遇したことを表す。
スクリプトを問題なく実行しているときに起こることもある。定数の値：8
E_WARNING 実行時の警告(致命的でないエラー)。スクリプトの実行は中断されない。定数の値：2

DSNの値の:と;の違いは、ドライバ名とその接続情報を区切るのが:、接続する項目同士を区切るのが;
ソケットのパスとはDBと通信するためのソケットファイルが置かれている場所
ソケットファイルとは同PC内でプログラム同士が通信するために使うファイルのこと*/