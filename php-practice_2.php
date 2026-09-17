<?php
// Q1 tic-tac問題
echo "1から100までのカウントを開始します\n\n";

for($nums = 1; $nums <= 100; $nums++) {
  if($nums % 20 === 0) {
    echo "tic-tac\n";
    ;
  } elseif($nums % 4 ===0) {
    echo "tic\n";
  } elseif($nums % 5 ===0) {
    echo "tac\n";
  } else {
    echo "$nums\n";
  }
}

// Q2 多次元連想配列
//設問前に変数を用意
$personalInfos = [
  [
    'name' => 'Aさん',
    'mail' => 'aaa@mail.com',
    'tel' => '09011112222',
  ],
  [
    'name' => 'Bさん',
    'mail' => 'bbb@mail.com',
    'tel' => '08033334444',
  ],
  [
    'name' => 'Cさん',
    'mail' => 'ccc@mail.com',
    'tel' => '09055556666',
  ],
];

//Q2 問1
$name = $personalInfos[1]['name'];
$tel = $personalInfos[1]['tel'];

echo "{$name}の電話番号は{$tel}です。";


//Q2 問2
foreach($personalInfos as $i => $personalInfo) {
    echo  ($i + 1). "番目の{$personalInfo['name']}のメールアドレスは、{$personalInfo['mail']}で、電話番号は{$personalInfo['tel']}です。\n";
}


//Q3 問3
$ages = [20, 25, 30];
foreach($personalInfos as $i => $personalInfo) {
  $personalInfo['age'] = $ages[$i];
}

var_dump($personalInfos);


// Q3 オブジェクト-1
class student
{
    public $studentId;
    public $studentName;

    public function __construct($id, $name)
    {
        $this->studentId = $id;
        $this->studentName = $name;
    }

    public function attend($subject)
    {
        echo "{$this->studentName}は{$subject}の授業に参加しました。学籍番号：{$this->studentId}";
    }
}

$yamada = new Student(120, '山田');
$yamada->attend('PHP');

echo "学籍番号{$yamada->studentId}番の生徒は{$yamada->studentName}です。";



// Q5 定義済みクラス
//問1
$date = new DateTime();
echo $date->format('Y-m-d');

//問2
$today = new DateTime();
$ThatDay = new DateTime('1992-04-25');

$diff = $today->diff($ThatDay);

echo "あの日から{$diff->days}日経過しました。";

?>