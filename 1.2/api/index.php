<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
/**
 * Gemaakt door van den Berg Multimedia.
 * Gebruiker: s.van.den.berg
 * Datum: 7-8-12 15:38
 * Omschrijving:
 */
    include('./classes/settings.php');
    include(smarty_dir . 'Smarty.class.php');
    include(profile_controller . 'libs/setup.php');
    include(profile_controller . 'libs/profile.php');
    include(profile_controller . 'libs/user.php');
    include(pages_controller . 'libs/setup.php');
    include(pages_controller . 'libs/pages.php');
    include(snippet_controller . 'libs/setup.php');
    include(snippet_controller . 'libs/snippet.php');

    if (isset($_GET) && !empty($_GET)) {
        //Get the querystring attributes
        $_module = isset($_REQUEST['module']) ? $_REQUEST['module'] : 'startpagina';
        $_action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'text';
        $_item = isset($_REQUEST['item']) ? $_REQUEST['item'] : '0';

        $content = '';
        $snippet = '';

        $cpages = new PagesController();
        $csnippet = new SnippetController();
        switch($_module) {
            case 'contact':
                switch ($_action) {
                    case 'snippet':
                        $return = $csnippet->getByUniqueid('contact-gegevens');
                        break;
                    default:
                        $return = $cpages->getEntry($_module);
                        break;
                }
                break;
            default:
                switch ($_action) {
                    case 'snippet':
                        $return = $csnippet->getByUniqueid('advies-nodig');
                        break;
                    default:
                        $return = $cpages->getEntry($_module);
                        break;
                }
                break;
        }
        echo $return;
    } else {
        'Geen resultaat gevonden';
    }

?>
</body>
</html>
