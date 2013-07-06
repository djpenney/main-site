<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap CSS -->
    <link href="css/default.css" rel="stylesheet" />
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">

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
    <!-- http://blog.colin-gourlay.com/blog/2012/02/safely-using-ready-before-including-jquery/ -->
    <script>(function(w,d,u){w.readyQ=[];w.bindReadyQ=[];function p(x,y){if(x=="ready"){w.bindReadyQ.push(y);}else{w.readyQ.push(x);}};var a={ready:p,bind:p};w.$=w.jQuery=function(f){if(f===d||f===u){return a}else{p(f)}}})(window,document)</script>
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

    <div id="footer" class="navbar navbar-fixed-bottom">
        <div class="container">
            <p class="muted credit">&copy; 2013 - Daniel Penney</p>
        </div> <!-- container -->
    </div> <!-- footer -->

    <!-- Bootstrap JS -->
    <script src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>

    <!-- http://blog.colin-gourlay.com/blog/2012/02/safely-using-ready-before-including-jquery/ -->
    <script>(function($,d){$.each(readyQ,function(i,f){$(f)});$.each(bindReadyQ,function(i,f){$(d).bind("ready",f)})})(jQuery,document)</script>
</body>
</html>
