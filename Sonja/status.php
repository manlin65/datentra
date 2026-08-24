<?php
$counterFile = __DIR__ . '/counter.json';
$data = ['count' => 0, 'last_visit' => null];
if (file_exists($counterFile)) {
    $decoded = json_decode(@file_get_contents($counterFile), true);
    if (is_array($decoded)) $data = array_merge($data, $decoded);
}
$count = (int)$data['count'];
$last = $data['last_visit'];
$lastFormatted = 'Noch kein externer Aufruf';
if ($last) {
    $dt = DateTime::createFromFormat('Y-m-d H:i:s', $last);
    if ($dt) $lastFormatted = $dt->format('d.m.Y, H:i:s') . ' Uhr';
}
?>
<!doctype html>
<html lang="de">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex,nofollow,noarchive">
<title>Sonja – Status</title>
<style>
:root{--rose:#efc1cc;--rose-deep:#a84f69;--rose-soft:#fff5f7;--white:#fff;--text:#4b3640;--muted:#8b737c}
*{box-sizing:border-box}
body{margin:0;min-height:100vh;display:flex;align-items:center;justify-content:center;padding:24px;
background:radial-gradient(circle at top left,rgba(239,193,204,.38),transparent 34%),linear-gradient(145deg,var(--rose-soft),var(--white));
color:var(--text);font-family:"Palatino Linotype","Book Antiqua",Palatino,Georgia,serif}
.card{width:min(620px,100%);background:rgba(255,255,255,.97);padding:44px 36px;border-radius:28px;border:1px solid #f3d7de;
box-shadow:0 20px 60px rgba(168,79,105,.14)}
h1{margin:0 0 26px;font-size:32px;font-weight:500;color:var(--rose-deep)}
.stat{background:#fff8fa;border:1px solid #f2d5dd;border-radius:20px;padding:20px;margin-bottom:16px}
.label{font:600 12px -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,sans-serif;text-transform:uppercase;letter-spacing:.08em;color:var(--muted);margin-bottom:7px}
.value{font-size:26px;font-weight:700;color:var(--rose-deep)}
.small{font-size:16px;line-height:1.5;color:var(--text)}
.note{margin-top:26px;padding-top:18px;border-top:1px solid #f1dce2;color:var(--muted);
font:13px/1.5 -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,sans-serif}
</style>
</head>
<body>
<main class="card">
<h1>Sonja – Status</h1>
<div class="stat"><div class="label">Externe Aufrufe</div><div class="value"><?php echo htmlspecialchars((string)$count, ENT_QUOTES, 'UTF-8'); ?></div></div>
<div class="stat"><div class="label">Letzter externer Aufruf</div><div class="small"><?php echo htmlspecialchars($lastFormatted, ENT_QUOTES, 'UTF-8'); ?></div></div>
<div class="note">Dein eigener Browser wird nicht mitgezählt, nachdem du einmal <strong>/Sonja/?admin=1</strong> geöffnet hast. Andere Browser, Inkognito-Modus oder andere Geräte werden weiterhin gezählt.</div>
</main>
</body>
</html>