<?php

$question = array();
$question[0] = array("question");
$question[1] = array("節約したい。", array("q", 5), array("q", 2));
$question[2] = array("半年暮らせる貯金がある。", array("q", 3), array("a", 13));
$question[3] = array("コンスタントに貯金できてる", array("a", 10), array("a", 13));
$question[4] = array("");
$question[5] = array("リボを使っている", array("a", 4), array("q", 16));
$question[6] = array("服代にたくさん使っている自覚がある", array("a", 9), array("q", 7));
$question[7] = array("本をよく買う", array("q", 8), array("q", 9));
$question[8] = array("小説をよく買う", array("a", 3), array("a", 3));
$question[9] = array("飲み会に週2以上行く", array("a",5 ), array("q", 10));
$question[10] = array("女子会を月1以上する", array("a", 6), array("q", 11));
$question[11] = array("自炊してる", array("q", 12), array("q", 13));
$question[12] = array("賞味期限切れや痛んだ食べ物を食べて、お腹を壊すことがよくある",  array("a", 11), array("q", 13));
$question[13] = array("雑貨屋でよく、ものを買う", array("a", 7), array("q", 14));
$question[14] = array("減らしたい項目があるけれど、ちょこちょこ買いする", array("a", 12), array("q", 15));
$question[15] = array("一人暮らしで20%以上、実家暮らしで30%以上貯金してる", array("a", 8), array("a", 10));
$question[16] = array("クレジットや電子マネーの支出を把握してない", array("a", 2), array("q", 6));

$answer = array();
$answer[0] = array("answer");
$answer[1] = array("現金生活をしてみよう。定期以外は、交通機関電子マネー禁止！");
$answer[2] = array("家計簿をつけて、どんな浪費項目が多いか確認しよう。");
$answer[3] = array("本は1/3くらい、図書館を使ってみよう。新作の小説もいいけれど、明治の文豪も深いですよ。最新のビジネス本自己啓発本もいいけど、図書館には絶版の名作が揃っています。");
$answer[4] = array("リボをクレジット会社がなぜ推すかって、楽にもうかるからです。つまりこちら側は、大金を失うということ。今後リボを一切使わないで、まずはリボの残額を0にすることを目標にしよう。", true);
$answer[5] = array("飲み会、二次会は断ろう。二次会で得られるものはあるか、行く前に考えよう。");
$answer[6] = array("女子会は家でしよう。部屋が片付く&安く済む&お菓子や飲み物が残ったら、次の日の食事が浮きます(笑)");
$answer[7] = array("小物は、何でも無い日にも買う癖ついてない？ほしいと思ったら欲しいものリストに書いて、がんばった時(小さな目標達成したり。)に一つずつ集めて行くようにしよう。ほしい期間が長いと嬉しさは何倍にもなります！また、後悔がないです。");
$answer[8] = array("自己投資にお金を使おう。あなたは節約しすぎなところがあります。お金を貯めて何かやりたい事が無いのに、不安だからと…。今しか出来ないことがあります。実家暮らしなら30%、一人暮らしなら20%以上貯金に回してたら貯め過ぎです。清潔な見た目にする、勉強になる本を買う、友達と絆を深める…など、ケチってはいけないところがあります。");
$answer[9] = array("服の予算を決めよう流行の服を買って、それはあなたに似合っていますか？ファッションに詳しい友達に訊いてみよう。自分に本当に似合う服を、少しだけ揃えた方が、おしゃれな人です。", true);
$answer[10] = array("節約マスター！あなたはこのチャートの制作者もたどり着いていない境地にいます。お話を聞きたいです。", true);
$answer[11] = array("お腹を壊すと不健康ですよ。。むやみにまとめ買いをしないで。お腹こわすかもしれないものをこわさなくてラッキーというスリル＜＜お弁当屋さんのお弁当で自炊より栄養価は低いものを食べる　です！", true);
$answer[12] = array("何を削ったらいいか、もうわかってますよね。(制作人は飲み物です。)それに使う事で、あなたに良い事はある？勝った瞬間だけ快楽なんですよね。わかります。買おうと思ってやめた時、雑貨屋さんのスタンプカードにはんこを押そう。全部貯まったら、無駄遣い一回していいよ。高い物でも。トータルで考えると今よりはプラスだし、3枚埋まったくらいには、もう大丈夫になるはず！", true);
$answer[13] = array("なぜ節約しないのか、意見をお聞かせいただけると嬉しいです。");

$mode = "";
if(!isset($_GET["qa"]) || !isset($_GET["p"])) $mode = "index";
if($_GET["qa"] === "q"){
  if(array_key_exists($_GET["p"], $question)){
    $mode = "q";
  }
} elseif($_GET["qa"] === "a"){
  if(array_key_exists($_GET["p"], $answer)){
    $mode = "a";
  }
}

if($mode === "index"){
  $html = file_get_contents("x.template");
  
  print $html;
} elseif($mode === "q"){
  $html = file_get_contents("q.template");
  $template = $question[intval($_GET["p"])];
  $html = str_replace('%explain%', $template[0], $html);
  // yes
  $yes = $template[1];
  $link_yes = "?qa={$yes[0]}&p={$yes[1]}";
  $html = str_replace('%yes%', $link_yes, $html);
  // no
  $no = $template[2];
  $link_no = "?qa={$no[0]}&p={$no[1]}";
  $html = str_replace('%no%', $link_no, $html);

  print $html;
} elseif($mode === "a"){
  $html = file_get_contents("a.template");
  $template = $answer[intval($_GET["p"])];
  $html = str_replace('%explain%', $template[0], $html);

  $image_path = "";  
  if(isset($template[1]) && $template[1] == true){
    $image_path = '<img src="./images/ans'.intval($_GET["p"]).'.png" alt="節約セラピー診断 answer" />';
  }
  $html = str_replace('%image%', $image_path, $html);
  mb_internal_encoding('UTF-8');
  $tweet = mb_strcut($template[0], 0,100);
  $tweet .= "…";
  $html = str_replace('%explain_cut%', $tweet, $html);
  

  print $html;
}