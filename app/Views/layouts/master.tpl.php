<html>

<body>

<div id="content">
<?php
if (isset($content) && !empty($content)) {
    $file = __DIR__  . '/../' . $content;

    if (is_file($file)) {
        require($file);
    } else {
        echo $content;
    }
} //else echo t('root_cont_notexist');
?>
</div>
</body>
</html>


