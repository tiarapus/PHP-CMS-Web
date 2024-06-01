<?php

function truncateText($text, $maxLength, $suffix = '...')
{
    if (mb_strlen($text) > $maxLength) {
        $truncatedText = mb_substr($text, 0, $maxLength - mb_strlen($suffix)) . $suffix;
        return $truncatedText;
    }
    return $text;
}

function generateDate($timestamp) {
    $time = new DateTime($timestamp->format('Y-m-d H:i:s'));
    return $time->format('d/m/Y');
}

?>

