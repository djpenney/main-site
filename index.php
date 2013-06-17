<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/default.css" rel="stylesheet" />
    <link href="css/bootstrap-responsive.css" rel="stylesheet" />

    <!-- It -->
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

</head>
<body>
    <div id="wrap">

        <div class="container">
            <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">
                    <a class="brand" href="../resume"><b>Daniel Penney</b> - <i><?php echo $title; ?></i></a>
                    <ul class="nav">
                        <?php
                            foreach ($parameters as $key => $value) {
                                if( $in_menu[$key] == 'TRUE' ) {
                                    // <td><a href="../main">Main</a></td>
                                    echo '<li><a href="../' . $key . '">' . $value . '</a></li>' . "\n";
                                }
                            }
                        ?>
                    </ul> <!-- nav -->
                </div> <!-- navbar-inner -->
            </div> <!-- navbar -->
            <?php include $page; ?>
        </div> <!-- container -->

        <div id="push"></div>
    </div> <!-- wrap -->

    <div id="footer">
        <div class="container">
            <p class="muted credit">&copy; 2013 - Daniel Penney</p>
        </div> <!-- container -->
    </div> <!-- footer -->

    <!-- Bootstrap JS -->
    <script src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
