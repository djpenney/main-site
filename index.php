<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<base href="http://danielpenney.sytes.net/">

<?php
    include_once './menu.php';

    $page_name = $_GET['page'];

    if( isset( $parameters[$page_name] ) ) {
        // *.sytes.net/$page_name
        $page = $_SERVER['DOCUMENT_ROOT'] . '/' . $page_name . '.html';
        $title = $parameters[$page_name];
    } elseif( empty($page_name) ) {
        // *.sytes.net/
        $page = $_SERVER['DOCUMENT_ROOT'] . '/resume.html';
        $title = $parameters['resume'];
    } else {
        // *.sytes.net/not_in_parameters
        $page = $_SERVER['DOCUMENT_ROOT'] . '/404.html';
        $title = $parameters['404'];
    }

    echo '<title>Daniel Penney - ' . $title . '</title>';
?>

<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.1.0/pure-min.css" />
<link rel="stylesheet" type="text/css" href="css/screen.css" />
</head>

<body>
    <div class="page pure-g-r">
        <div class="header pure-u-1">
            <div class="pure-menu pure-menu-open pure-menu-horizontal">
                <style scoped> .pure-menu-heading{ width: 250px; } </style>
                <a class="pure-menu-heading" href="../resume"><b>Daniel Penney</b> - <i><?php echo $title; ?></i></a>
                <ul id="mlinks">
                <?php
                    foreach ($parameters as $key => $value) {
                        if( $in_menu[$key] == 'TRUE' ) {
                            // <td><a href="../main">Main</a></td>
                            echo '<li><a href="../' . $key . '">' . $value . '</a></li>' . "\n";
                        }
                    }
                ?>
                </ul>
            </div> <!-- menu -->
        </div> <!-- header -->
        <div class="content pure-u-1">
            <div class="pure-g">
                <?php include $page; ?>
            </div> <!-- to make pages easier to layout -->
        </div> <!-- content -->
    <div class="footer pure-u-1">
        <p>&copy; 2013 - Daniel Penney</p>
    </div> <!-- footer -->
    </div> <!-- page -->
</body>
</html>
