<?php

//php -S 127.0.0.1:8000

require('init.php');

$lots = get_lots($link);
$title = 'Yeticave -  главная';

$page_content = include_template('index.php', [
    'categories' => $categories,
    'lots' => $lots]);

$layout_content = include_template('layout.php', [
    'page_content' => $page_content,
    'categories' => $categories,
    'title' => $title,
    'user' => $user]);

print($layout_content);
