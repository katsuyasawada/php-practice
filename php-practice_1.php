<?php
// Q1 変数と文字列
$name = '沢田';

echo "私の名前は「{$name}」です。" ;


// Q2 四則演算
$num = 5 * 4;
echo $num . "\n";

$num /= 2;
echo $num;


// Q3 日付操作
$date = date('Y年m月d日 H時i分s秒');

echo "現在時刻は、{$date}です。";


// Q4 条件分岐-1 if文
$device = 'mac';

if($device === 'windows'|| $device === 'mac') {
  echo "使用のOSは、{$device}です。";
} 
else {
  echo "どちらでもありません";
}


// Q5 条件分岐-2 三項演算子
$age = 51;

$message = ($age >= 18) ? '成人です。' : '未成年です。';

echo $message;


// Q6 配列
$kantou = ['茨城県','群馬県','栃木県','千葉県','埼玉県','東京都','神奈川県'];

echo "$kantou[2]と$kantou[3]は関東地方の都道府県です。";


// Q7 連想配列-1
$prefectoralCapital = [
  '東京都' => '新宿区',
  '神奈川県' => '横浜市',
  '千葉県' => '千葉市',
  '埼玉県' => 'さいたま市',
  '栃木県' => '宇都宮市',
  '群馬県' => '前橋市',
  '茨城県' => '水戸市'
];

foreach ($prefectoralCapital as $value) {
  echo $value ."\n" ;
}


// Q8 連想配列-2
foreach ($prefectoralCapital as $key => $value) {
  if ($key === '埼玉県') {
    echo "{$key}の県庁所在地は、{$value}です。";
  }
    
}


// Q9 連想配列-3
$prefectoralCapital += [
    '愛知県' => '名古屋市',
    '大阪府' => '大阪市'
];

foreach ($prefectoralCapital as $key => $value) {
    if ($key === '愛知県' || $key === '大阪府') {
        echo "{$key}は関東地方ではありません。\n";
    }
    else {
        echo "{$key}の県庁所在地は、{$value}です。\n";
    }
}


// Q10 関数-1
function hello($name)
{
    echo "$name さん、こんにちは。\n";
}

hello('とう');
hello('かあ');


// Q11 関数-2
function calcTaxInPrice($price) {
    return $price *= 1.1;
}

$price = 1000;
$taxInPrice = calcTaxInPrice($price);

echo "{$price}円の商品の税込価格は{$taxInPrice}円です。";


// Q12 関数とif文
function distinguishNum($num) {
    if($num % 2 !== 0) {
        return "{$num}は奇数です。\n";
        
    } else {
        return "{$num}は偶数です。\n";
    }
}

echo distinguishNum(11);
echo distinguishNum(24);


// Q13 関数とswitch文
function evaluateGrade($grade) {
    switch($grade) {
        case 'A':
        case 'B':
            return "合格です。\n";
            
        case 'C':
            return "合格ですが追加課題があります。\n";
            
        case 'D':
            return "不合格です。\n";
            
        default:
            return "判定不明です。講師に問い合わせてください。\n";
    }
}

echo evaluateGrade('A');
echo evaluateGrade('T');


?>