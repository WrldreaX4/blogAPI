<?php

function generateRandomString($length = 32) {
    return bin2hex(random_bytes($length));
}

$secret_key = generateRandomString();
echo $secret_key;

?>


<!-- 63448c0f19663276ceabdc626d7aab8855872cc7ef5b152d099c41dcbbccd4ce -->