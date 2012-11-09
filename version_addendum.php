<?php

$_SESSION['v'] = "";
$_SESSION['v_url'] = "";
if (isset($_GET['v']) || isset($_POST['v'])) {
  if (isset($_GET['v'])) {
    $_SESSION['v_url'] = "&v=".$_GET['v'];
    $_SESSION['v'] = $_GET['v'];
  } else {
    $_SESSION['v_url'] = "&v=".$_POST['v'];
    $_SESSION['v'] = $_POST['v'];
  }
}