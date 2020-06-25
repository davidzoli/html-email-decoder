<?php
    include('fileHandler.php');

    function getParam ($var, $param_name, $default = false) {
        if (isset($var[$param_name])) return $var[$param_name];
        return $default;
    };

    $fh = new fileHandler();
    $postData = getParam($_POST, 'sourceCode');

    if($postData) {
        $fh->put($postData);
        $str = $postData;
    } else {
        $str = $fh->get();
        $code = htmlspecialchars(quoted_printable_decode($str));
    }

    $action = getParam($_GET, 'action');
?>

<!DOCTYPE html>
<html lang="en" style="padding:0;margin:0;">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Email decoder</title>

    <style>
        html, body {
            height: 100%;
            font-family: Arial;
            color: black;
        }
        a,
        a:active,
        a:visited,
        a:hover {
            color: black;
            text-decoration: none;
        }
        .resp-container {
            position: relative;
            overflow: hidden;
            height: calc(100% - 30px);
        }
        .resp-iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }
    </style>
</head>
<body style="padding:0;margin:0;">
    <div style="background:#fefefe;border-bottom:2px solid #ccc;padding: 5px;">
        <a href="index.php?action=viewCode">Code view</a>
        <span>|</span>
        <a href="index.php">Html view</a>
        <span>|</span>
        <a href="index.php?action=set">Set source</a>
    </div>

    <?php if ($action == 'viewCode') { ?>
        <div id="editor" style="width: 100%;height:calc(100% - 30px);"><?php echo $code; ?></div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.3.3/ace.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.11.0/beautify.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.11.0/beautify-css.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.11.0/beautify-html.js"></script>
        <script>
            var editor = ace.edit("editor");
            editor.setTheme("ace/theme/monokai");
            editor.session.setMode("ace/mode/html");
            editor.setFontSize("14px");
            editor.getSession().setValue(html_beautify(editor.getValue(), {
                indent_size: 4
            }));
        </script>
    <?php } else if ($action == 'set') { ?>
        <form action="index.php?action=view" method="post">
            <textarea name="sourceCode" style="width:70%;height:500px"><?php echo $code; ?></textarea> <br>
            <button type="submit">Set</button>
        </form>
    <?php } else { ?>
        <div class="resp-container">
            <iframe src="decoder.php" class="resp-iframe" frameborder="0" />
        </div>
    <?php } ?>
</body>
</html>
