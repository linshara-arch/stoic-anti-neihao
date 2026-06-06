<?php
// ========== 项目核心逻辑 ==========
date_default_timezone_set('PRC');
$data_dir = __DIR__ . '/../data';
$file = $data_dir . '/data.json';

// 确保数据目录存在
if (!is_dir($data_dir)) {
    mkdir($data_dir, 0777, true);
}

// 处理表单提交
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['msg'])) {
    $msg = htmlspecialchars(trim($_POST['msg'])); // 防御 XSS 攻击
    $data = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
    array_unshift($data, ['time' => date('Y-m-d H:i'), 'msg' => $msg]);
    file_put_contents($file, json_encode($data));
    header('Location: /');
    exit;
}

$posts = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>斯多葛反内耗树洞 (Stoic Anti-Neihao)</title>
<style>
  body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; background: #f4f4f9; color: #333; }
  .box { background: white; padding: 20px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); margin-bottom: 20px; }
  textarea { width: 100%; box-sizing: border-box; padding: 12px; border-radius: 8px; border: 1px solid #ddd; margin-bottom: 12px; resize: vertical; font-size: 16px; background: #fafafa; }
  button { background: #2c3e50; color: white; border: none; padding: 12px 24px; border-radius: 8px; cursor: pointer; font-weight: bold; font-size: 16px; width: 100%; }
  button:hover { background: #1a252f; }
  .post { border-bottom: 1px solid #eee; padding: 15px 0; }
  .post:last-child { border-bottom: none; }
  .time { color: #888; font-size: 0.85em; margin-bottom: 8px; font-weight: bold; }
  .content { line-height: 1.6; }
</style>
</head>
<body>
  <h2 style="text-align: center; color: #2c3e50;">🌱 斯多葛反内耗树洞</h2>
  <p style="text-align: center; color: #666; font-size: 0.9em; margin-bottom: 30px;">区分能控制的，接受不能控制的。<br>在这里留下你的内耗，然后放下它。</p>
  
  <div class="box">
    <form method="post">
      <textarea name="msg" rows="4" placeholder="绝对无需注册，无需登录，直接写下你想说的话..."></textarea>
      <button type="submit">发 布 留 言</button>
    </form>
  </div>
  
  <div class="box">
    <?php foreach($posts as $p): ?>
      <div class="post">
        <div class="time">匿名游客 · <?= $p['time'] ?></div>
        <div class="content"><?= nl2br($p['msg']) ?></div>
      </div>
    <?php endforeach; ?>
    <?php if(!$posts) echo "<p style='text-align: center; color:#999; padding: 20px 0;'>还没有留言，做第一个发言的人吧！</p>"; ?>
  </div>
</body>
</html>