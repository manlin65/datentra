<?php
session_start();

$counterFile = __DIR__ . '/counter.json';
$adminCookie = 'sonja_admin_exclude';

if (isset($_GET['admin']) && $_GET['admin'] === '1') {
    setcookie($adminCookie, '1', [
        'expires' => time() + 60*60*24*365,
        'path' => '/Sonja/',
        'secure' => (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'),
        'httponly' => true,
        'samesite' => 'Lax'
    ]);
    $_COOKIE[$adminCookie] = '1';
}

$data = ['count' => 0, 'last_visit' => null];

if (file_exists($counterFile)) {
    $decoded = json_decode(@file_get_contents($counterFile), true);
    if (is_array($decoded)) {
        $data = array_merge($data, $decoded);
    }
}

$isAdmin = isset($_COOKIE[$adminCookie]) && $_COOKIE[$adminCookie] === '1';
$alreadyCounted = isset($_SESSION['sonja_counted']) && $_SESSION['sonja_counted'] === true;

if (!$isAdmin && !$alreadyCounted) {
    $data['count'] = (int)$data['count'] + 1;
    $data['last_visit'] = date('Y-m-d H:i:s');
    @file_put_contents($counterFile, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES), LOCK_EX);
    $_SESSION['sonja_counted'] = true;
}
?>

<!doctype html>
<html lang="de">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Für Sonja</title>
<style>
:root{
  --rose:#efc1cc;
  --rose-deep:#a84f69;
  --rose-soft:#fff5f7;
  --white:#ffffff;
  --text:#4b3640;
  --muted:#8b737c;
}
*{box-sizing:border-box}
body{
  margin:0;
  min-height:100vh;
  display:flex;
  align-items:center;
  justify-content:center;
  padding:24px;
  background:
    radial-gradient(circle at top left, rgba(239,193,204,.38), transparent 34%),
    linear-gradient(145deg,var(--rose-soft),var(--white));
  color:var(--text);
  font-family:"Palatino Linotype","Book Antiqua",Palatino,Georgia,serif;
}
.card{
  width:min(680px,100%);
  background:rgba(255,255,255,.97);
  padding:48px 40px;
  border-radius:30px;
  border:1px solid #f3d7de;
  box-shadow:0 20px 60px rgba(168,79,105,.14);
}
h1{
  margin:0 0 30px;
  font-size:35px;
  font-weight:500;
  color:var(--rose-deep);
  letter-spacing:.15px;
}
p{
  font-size:20px;
  line-height:1.72;
  margin:0 0 19px;
}
strong{font-weight:700}
.hugs{
  font-size:31px;
  letter-spacing:8px;
  margin-top:30px;
}
.signature{
  margin-top:20px;
  margin-bottom:0;
  font-size:24px;
  font-style:italic;
  color:var(--rose-deep);
}
.note{
  margin-top:34px;
  padding-top:20px;
  border-top:1px solid #f1dce2;
  color:var(--muted);
  font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Arial,sans-serif;
  font-size:12.5px;
  line-height:1.5;
}
@media(max-width:520px){
  body{padding:15px}
  .card{padding:35px 24px;border-radius:22px}
  h1{font-size:30px}
  p{font-size:18px}
  .hugs{font-size:28px}
}

.musicbox{margin-top:28px}
.musicbtn{
  border:1px solid #edc8d2;
  background:#fff8fa;
  color:#a84f69;
  border-radius:999px;
  padding:12px 18px;
  font:600 15px -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,sans-serif;
  cursor:pointer;
}
.musicbtn:hover{background:#fff1f5}


.song-card{
  margin-top:34px;
  padding:14px;
  display:flex;
  align-items:center;
  gap:16px;
  background:linear-gradient(135deg,#fff8fb,#fbe8ee);
  border:1px solid #f1cfd9;
  border-radius:22px;
  box-shadow:0 10px 28px rgba(168,79,105,.10);
}
.song-card img{
  width:112px;
  height:112px;
  object-fit:cover;
  border-radius:16px;
  box-shadow:0 7px 18px rgba(40,20,30,.15);
}
.song-copy{min-width:0}
.song-kicker{
  font:600 12px -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,sans-serif;
  color:#a84f69;
  text-transform:uppercase;
  letter-spacing:.08em;
  margin-bottom:5px;
}
.song-title{
  font-size:21px;
  font-weight:700;
  color:#4b3640;
  line-height:1.2;
}
.song-artist{
  margin-top:3px;
  font:500 15px -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,sans-serif;
  color:#8b737c;
}
.apple-link{
  display:inline-block;
  margin-top:12px;
  padding:10px 15px;
  border-radius:999px;
  background:#a84f69;
  color:#fff;
  text-decoration:none;
  font:700 14px -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,sans-serif;
}
@media(max-width:520px){
  .song-card{align-items:flex-start}
  .song-card img{width:92px;height:92px}
  .song-title{font-size:18px}
}

</style></head>
<body><main class="card">
  <h1>Hallo Sonja,</h1>

  <p>ich will gar nicht noch mehr schreiben.</p>

  <p><strong>Ich möchte dich sehen und mit dir reden.</strong></p>

  <p>Einfach wir zwei. In Ruhe.</p>

  <p>Du fehlst mir. Sehr.</p>

  <p>Ich bin gerade mit zwei, drei Sachen gleichzeitig beschäftigt und arbeite im Moment oft zehn, zwölf Stunden am Tag – manchmal gefühlt noch mehr.</p>

  <p>Und trotzdem merke ich: <strong>Du würdest mir gerade gut tun.</strong></p>

  <p>Ich möchte wissen, wie es dir geht. Und ich möchte wissen, was du fühlst.</p>

  <p><strong>Ich werde nicht mehr hinterherlaufen oder betteln.</strong></p>

  <p>Vielleicht ist das meine letzte Nachricht an dich. Aber ich wollte dir noch einmal ehrlich sagen, was in mir ist.</p>

  <p><strong>Wenn dir noch etwas an uns liegt, dann meld dich bitte bei mir.</strong></p>

  <div class="hugs">🫂🫂🫂</div>

  <p class="signature">Manni</p>

  <section class="song-card">
    <img src="https://is1-ssl.mzstatic.com/image/thumb/Music116/v4/36/05/47/360547a0-b20d-1587-5faf-1d43bb6f6052/075679762023.jpg/600x600bb.jpg" alt="Cover von Fly Me To The Moon von Sia">
    <div class="song-copy">
      <div class="song-kicker">Für dich</div>
      <div class="song-title">♫ Fly Me To The Moon</div>
      <div class="song-artist">Sia</div>
      <a class="apple-link" href="https://music.apple.com/de/album/fly-me-to-the-moon-inspired-by-final-fantasy-xiv/1598179109?i=1598179296" target="_blank" rel="noopener noreferrer">
        Auf Apple Music anhören
      </a>
    </div>
  </section>

  <div class="note">Page erstellt mit KI, Text ist von mir.</div>
</main>


</body></html>