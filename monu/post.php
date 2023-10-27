<?php
session_start();
if(isset($_SESSION['name'])){
    $string = $_POST['text'];
    $stringUpper = strtoupper($string);

    if (strpos($string, "?") !== false && $string === $stringUpper) {
        $patata = "Cool la life ! Cherche sur google !";
    } elseif (strpos($string, "?") !== false) {
        $patata = "Cherche sur google";
    } elseif ( empty($string)) {
        $patata = "Merci ca me repose";
    } elseif ($string === $stringUpper) {
        $patata = "Cool la life !"; 
    } elseif (strpos($string, "merci") !== false || strpos($string, "Merci") !== false) {
        $patata = "50e";
    } else {
        $patata = "Schnouf";
    }

    $text_message = "<div class='msgln'><span class='chat-time'>".date("g:i A")."</span> <b class='user-name'>".$_SESSION['name']."</b> ".stripslashes(htmlspecialchars($string))."<br></div>";
    $text_message2 = "<div class='msgln'><span class='chat-time'>".date("g:i A")."</span> <b class='user-name'>"."Manu"."</b> ".stripslashes(htmlspecialchars($patata))."<br></div>";
    file_put_contents("log.html", $text_message, FILE_APPEND | LOCK_EX);
    file_put_contents("log.html", $text_message2, FILE_APPEND | LOCK_EX);
}
?>
