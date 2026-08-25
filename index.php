<?php
/**
 * ┌─────────────────────────────────────────────────────────────────┐
 * │              TrackNCloak Cloaker — index.php                      │
 * │          Rule: Sexual wellness campaign
 * │                                                                 │
 * │  Upload this file as  index.php  to your server root.           │
 * │  Cloaking starts instantly — 100% server-side, zero flash!      │
 * └─────────────────────────────────────────────────────────────────┘
 *
 *  ✔  Real visitors       → redirected to your Offer URL
 *  ✗  Bots / VPNs / blocked countries → shown your Safe Page
 *
 *  ⚠  DO NOT edit the variables in the config block below.
 *     To change settings, update the rule in your dashboard and
 *     download a fresh index.php.
 */

// ── Config (auto-generated — do not edit) ────────────────────────
$rid          = 'cmt8y0rt717p7juk1m8ex92yj';
$api_url      = 'https://trackncloak.com';
$offer        = 'https://vedartha.in/v1.html';
$php_version  = '2026-07-01.1';  // bumped by TrackNCloak when generator changes

// ── Phase F: Delivery Mode Config ───────────────────────────────
$safe_mode  = 'redirect';
$offer_mode = 'redirect';
$loading_delay = 3;

function deliver_page($url, $mode, $delay = 3) {
    $safe_url = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
    $json_url = json_encode($url);
    switch ($mode) {
        case 'meta':
            header('Content-Type: text/html; charset=utf-8');
            header('Cache-Control: no-store');
            header('X-Robots-Tag: noindex, nofollow');
            echo '<!DOCTYPE html><html><head><meta charset="utf-8"><meta http-equiv="refresh" content="0;url='.$safe_url.'"><meta name="robots" content="noindex,nofollow"><title>Redirecting...</title></head>';
            echo '<body><noscript><a href="'.$safe_url.'">Click here to continue</a></noscript></body></html>';
            exit;
        case 'js':
            header('Content-Type: text/html; charset=utf-8');
            header('Cache-Control: no-store');
            header('X-Robots-Tag: noindex, nofollow');
            echo '<!DOCTYPE html><html><head><meta charset="utf-8"><meta name="robots" content="noindex,nofollow"><title>Redirecting...</title>';
            echo '<script>window.location.replace('.$json_url.')</script></head>';
            echo '<body><noscript><a href='.$json_url.'>Click here to continue</a></noscript></body></html>';
            exit;
        case 'blank_referrer':
            header('Content-Type: text/html; charset=utf-8');
            header('Cache-Control: no-store');
            header('Referrer-Policy: no-referrer');
            header('X-Robots-Tag: noindex, nofollow');
            echo '<!DOCTYPE html><html><head><meta charset="utf-8"><meta name="referrer" content="no-referrer"><meta name="robots" content="noindex,nofollow"><title>Redirecting...</title>';
            echo '<script>(function(){var a=document.createElement("a");a.href='.$json_url.';a.rel="noreferrer noopener";a.referrerPolicy="no-referrer";document.body.appendChild(a);a.click();})()</script></head>';
            echo '<body><noscript><a href='.$json_url.' rel="noreferrer">Click here to continue</a></noscript></body></html>';
            exit;
        case 'double_meta':
            header('Content-Type: text/html; charset=utf-8');
            header('Cache-Control: no-store');
            header('X-Robots-Tag: noindex, nofollow');
            $step2 = 'data:text/html,<meta http-equiv="refresh" content="0;url='.urlencode($url).'"/>';
            echo '<!DOCTYPE html><html><head><meta charset="utf-8"><meta http-equiv="refresh" content="0;url='.htmlspecialchars($step2, ENT_QUOTES).'"><meta name="robots" content="noindex,nofollow"><title>Redirecting...</title></head>';
            echo '<body><noscript><a href="'.$safe_url.'">Click here to continue</a></noscript></body></html>';
            exit;
        case 'loading':
            header('Content-Type: text/html; charset=utf-8');
            header('Cache-Control: no-store');
            header('X-Robots-Tag: noindex, nofollow');
            echo '<!DOCTYPE html><html><head><meta charset="utf-8"><meta name="robots" content="noindex"><title>Loading...</title>';
            echo '<style>*{margin:0;padding:0}body{min-height:100vh;display:flex;align-items:center;justify-content:center;background:#0f0f12;color:#fff;font-family:sans-serif}';
            echo '.spinner{width:48px;height:48px;border:3px solid rgba(255,255,255,.15);border-top-color:#6366f1;border-radius:50%;animation:s .8s linear infinite;margin:0 auto 20px}';
            echo '@keyframes s{to{transform:rotate(360deg)}}.bar-wrap{width:200px;height:3px;background:rgba(255,255,255,.1);border-radius:3px;margin:16px auto 0;overflow:hidden}';
            echo '.bar{height:100%;background:linear-gradient(90deg,#6366f1,#818cf8);border-radius:3px;animation:l '.$delay.'s linear forwards}@keyframes l{from{width:0}to{width:100%}}</style></head>';
            echo '<body><div style="text-align:center"><div class="spinner"></div><div style="font-size:14px;color:rgba(255,255,255,.5)">Loading</div>';
            echo '<div class="bar-wrap"><div class="bar"></div></div></div>';
            echo '<script>setTimeout(function(){window.location.replace('.$json_url.')},'.($delay*1000).')</script></body></html>';
            exit;
        case 'iframe':
            header('Content-Type: text/html; charset=utf-8');
            header('Cache-Control: no-store');
            header('X-Robots-Tag: noindex, nofollow');
            echo '<!DOCTYPE html><html><head><meta charset="utf-8"><meta name="robots" content="noindex"><title>Loading...</title>';
            echo '<style>*{margin:0;padding:0}body,html{width:100%;height:100%;overflow:hidden}iframe{position:fixed;top:0;left:0;width:100%;height:100%;border:none}</style></head>';
            echo '<body><iframe src='.htmlspecialchars($json_url, ENT_QUOTES).' allowfullscreen></iframe></body></html>';
            exit;
        case 'frameset':
            header('Content-Type: text/html; charset=utf-8');
            header('Cache-Control: no-store');
            header('X-Robots-Tag: noindex, nofollow');
            echo '<!DOCTYPE html><html><head><meta charset="utf-8"><meta name="robots" content="noindex,nofollow"><title>Loading...</title></head>';
            echo '<frameset rows="100%,*" border="0" frameborder="0" framespacing="0">';
            echo '<frame src='.$json_url.' name="main" noresize scrolling="auto"/>';
            echo '<frame src="about:blank" noresize/>';
            echo '</frameset><noframes><body><a href='.$json_url.'>Click here to continue</a></body></noframes></html>';
            exit;
        case 'reverse_proxy':
            $ch2 = curl_init($url);
            curl_setopt_array($ch2, [CURLOPT_RETURNTRANSFER=>true,CURLOPT_TIMEOUT=>8,CURLOPT_FOLLOWLOCATION=>true,CURLOPT_SSL_VERIFYPEER=>false,
                CURLOPT_USERAGENT=>'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36']);
            $html = curl_exec($ch2);
            $ct2 = curl_getinfo($ch2, CURLINFO_CONTENT_TYPE);
            $code2 = curl_getinfo($ch2, CURLINFO_HTTP_CODE);
            curl_close($ch2);
            if ($code2 === 200 && $html) {
                $base_url = preg_replace('#[^/]*$#', '', $url);
                $html = preg_replace('#</head>#i', '<base href="'.htmlspecialchars($base_url).'"><meta name="robots" content="noindex"></head>', $html, 1);
                header('Content-Type: '.($ct2 ?: 'text/html'));
                header('Cache-Control: no-store');
                header('X-Robots-Tag: noindex, nofollow');
                echo $html;
                exit;
            }
            // Fix 2026-04-28: previous fallback was the default 302 redirect
            // which exposed the offer URL in the browser address bar — defeating
            // the whole point of reverse_proxy mode. Now serve a generic
            // page-unavailable HTML response from the cloaker domain so the URL
            // stays masked even on cURL failure.
            header('Content-Type: text/html; charset=utf-8');
            header('Cache-Control: no-store');
            header('X-Robots-Tag: noindex, nofollow');
            echo '<!DOCTYPE html><html><head><meta charset="utf-8"><meta name="robots" content="noindex,nofollow"><title>Page unavailable</title>';
            echo '<style>body{font-family:sans-serif;background:#0a0a0f;color:#fff;display:flex;min-height:100vh;align-items:center;justify-content:center;margin:0;text-align:center}p{max-width:480px;padding:0 24px}</style></head>';
            echo '<body><div><h1>Page temporarily unavailable</h1><p>We could not load the requested page. Please try again in a few moments.</p></div></body></html>';
            exit;
        default:
            header('Location: ' . $url, true, 302);
            exit;
    }
}

function deliver_safe($url) { global $safe_mode, $loading_delay; deliver_page($url, $safe_mode, $loading_delay); }
function deliver_offer($url) { global $offer_mode, $loading_delay; deliver_page($url, $offer_mode, $loading_delay); }

// ── Detect real visitor IP ────────────────────────────────────────
$ip = '';
foreach ([
    'HTTP_CF_CONNECTING_IP',  // Cloudflare
    'HTTP_X_REAL_IP',         // Nginx / reverse proxy
    'HTTP_X_FORWARDED_FOR',   // Load balancers / shared hosting
    'REMOTE_ADDR',            // Direct connection (fallback)
] as $k) {
    if (!empty($_SERVER[$k])) {
        $ip = trim(explode(',', $_SERVER[$k])[0]);
        break;
    }
}

$ua  = $_SERVER['HTTP_USER_AGENT'] ?? '';
$ref = urlencode($_SERVER['HTTP_REFERER'] ?? '');

// ── Phase 24: Capture platform click IDs for CAPI attribution ───
$fbclid = $_GET['fbclid'] ?? '';
$gclid  = $_GET['gclid']  ?? '';
$ttclid = $_GET['ttclid'] ?? '';

// ── ValueTrack parameters from Final URL Suffix ─────────────────
$campaignid = $_GET['campaignid'] ?? '';
$adgroupid  = $_GET['adgroupid']  ?? '';
$matchtype  = $_GET['matchtype']  ?? '';
$url = $api_url . '/api/cloak/check?rid=' . $rid . '&ref=' . $ref . '&ip=' . urlencode($ip);

// Append platform click IDs to API URL
if ($fbclid !== '') $url .= '&fbclid=' . urlencode($fbclid);
if ($gclid  !== '') $url .= '&gclid='  . urlencode($gclid);
if ($ttclid !== '') $url .= '&ttclid=' . urlencode($ttclid);
if ($campaignid !== '') $url .= '&campaignid=' . urlencode($campaignid);
if ($adgroupid  !== '') $url .= '&adgroupid='  . urlencode($adgroupid);
if ($matchtype  !== '') $url .= '&matchtype='  . urlencode($matchtype);

// ── Call cloaker API (server-to-server, 3 s timeout) ─────────────
$body = null;

if (function_exists('curl_init')) {
    // cURL (preferred — works on virtually all PHP hosts)
    // 2026-07-01 perf pass: DNS cache (60s), fast connect timeout, HTTP/2
    // when available, gzip. Cuts India→Singapore latency by ~100-200ms on
    // repeat visits (DNS reuse) and adds early bailout if TnC is unreachable.
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER    => true,
        CURLOPT_TIMEOUT           => 3,
        CURLOPT_CONNECTTIMEOUT    => 2,
        CURLOPT_DNS_CACHE_TIMEOUT => 60,
        CURLOPT_TCP_KEEPALIVE     => 1,
        CURLOPT_ENCODING          => '',  // enables gzip/deflate
        CURLOPT_HTTP_VERSION      => defined('CURL_HTTP_VERSION_2_0') ? CURL_HTTP_VERSION_2_0 : CURL_HTTP_VERSION_1_1,
        CURLOPT_HTTPHEADER        => [
            'X-Forwarded-For: '   . $ip,
            'User-Agent: '        . $ua,
            'X-Cloaker-Version: ' . $php_version,  // freshness stamp
            'Accept-Encoding: gzip',
        ],
        CURLOPT_SSL_VERIFYPEER    => false,
        CURLOPT_FOLLOWLOCATION    => true,
    ]);
    $raw = curl_exec($ch);
    curl_close($ch);
    $body = $raw ? json_decode($raw, true) : null;
} else {
    // Fallback: file_get_contents (requires allow_url_fopen = On)
    $ctx = stream_context_create([
        'http' => [
            'method'        => 'GET',
            'header'        => "X-Forwarded-For: $ip\r\nUser-Agent: $ua\r\nX-Cloaker-Version: $php_version",
            'timeout'       => 3,
            'ignore_errors' => true,
        ],
        'ssl'  => ['verify_peer' => false],
    ]);
    $raw  = @file_get_contents($url, false, $ctx);
    $body = $raw ? json_decode($raw, true) : null;
}

// ── PHP Auto-Update v1.5 (2026-04-28) ────────────────────────────
// Read live config from API response and override baked-in values.
// Means changes to Offer URL, Safe URL, and Delivery Modes apply
// instantly via dashboard — no need to re-download + re-upload index.php.
// Feature toggles (jsFingerprinting, etc.) still baked in for now;
// full toggle live-update planned in v2 rewrite.
if (isset($body['config']) && is_array($body['config'])) {
    $cfg = $body['config'];
    if (!empty($cfg['offerUrl']))      $offer         = $cfg['offerUrl'];
    if (!empty($cfg['safeMode']))      $safe_mode     = $cfg['safeMode'];
    if (!empty($cfg['offerMode']))     $offer_mode    = $cfg['offerMode'];
    if (isset($cfg['loadingDelay']))   $loading_delay = (int)$cfg['loadingDelay'];
    // Note: safeUrl from config is NOT overridden here because the API
    // already returns the correct safeUrl as $body['redirectUrl'] when
    // action=='cloak'. The cloak block below uses that directly.
}

// ── Redirect based on cloaker decision ───────────────────────────
if (
    isset($body['action']) &&
    $body['action'] === 'cloak' &&
    !empty($body['redirectUrl'])
) {
    // Bot / VPN / blocked country → safe page (no visible flash)
    deliver_safe($body['redirectUrl']);
}


// ── Phase 24: Pass platform click IDs to offer URL ──────────
if ($fbclid !== '') $offer .= (strpos($offer, '?') !== false ? '&' : '?') . 'fbclid=' . urlencode($fbclid);
if ($gclid  !== '') $offer .= (strpos($offer, '?') !== false ? '&' : '?') . 'gclid='  . urlencode($gclid);
if ($ttclid !== '') $offer .= (strpos($offer, '?') !== false ? '&' : '?') . 'ttclid=' . urlencode($ttclid);
if ($campaignid !== '') $offer .= (strpos($offer, '?') !== false ? '&' : '?') . 'campaignid=' . urlencode($campaignid);
if ($adgroupid  !== '') $offer .= (strpos($offer, '?') !== false ? '&' : '?') . 'adgroupid='  . urlencode($adgroupid);
if ($matchtype  !== '') $offer .= (strpos($offer, '?') !== false ? '&' : '?') . 'matchtype='  . urlencode($matchtype);

// Legitimate visitor → your offer / landing page
$pass_url = !empty($body['redirectUrl']) ? $body['redirectUrl'] : $offer;
deliver_offer($pass_url);
