<?php

$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-Type: text/html; utf-8';
$headers[] = 'Content-Transfer-Encoding: quoted-printable';

// *** This will break DKIM ***
$message = '<span style="color:green;font-size:24px;">ThisIsColored</span>';
// *** This had broke DKIM ***

mail("ianmuthuri254@gmail.com", "SUbject", $message, implode("\r\n", $headers));
?>