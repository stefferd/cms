<?php
    /*
     * Author: Stef van den Berg
     * Updated on: 21-07-2012
     * index page of the CMS 1.2 project frontend
     */
    session_start();
    ini_set("allow_url_include", true);

    try {
        include('./classes/settings.php');
        include(smarty_dir . 'Smarty.class.php');
        include(profile_controller . 'libs/setup.php');
        include(profile_controller . 'libs/profile.php');
        include(profile_controller . 'libs/user.php');
        include(pages_controller . 'libs/setup.php');
        include(pages_controller . 'libs/pages.php');
        include(snippet_controller . 'libs/setup.php');
        include(snippet_controller . 'libs/snippet.php');
        include(teams_controller . 'libs/setup.php');
        include(teams_controller . 'libs/teams.php');
        include(news_controller . 'libs/setup.php');
        include(news_controller . 'libs/news.php');
        include(newsletter_controller . 'libs/setup.php');
        include(newsletter_controller . 'libs/newsletter.php');
        include(guestbook_controller . 'libs/setup.php');
        include(guestbook_controller . 'libs/guestbook.php');
        include('./classes/spam/daospam.php');

        $smarty = new Smarty();
        $smarty->setTemplateDir('theme/general/templates');
        $smarty->setCompileDir('theme/general/templates_c');

        $smarty->assign('url', url);
        $smarty->assign('cms', cms);
        $smarty->assign('theme', theme);
        $smarty->assign('version', version);

        //Get the querystring attributes
        $_module = isset($_REQUEST['module']) ? $_REQUEST['module'] : 'home';
        $_action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'view';
        $_item = isset($_REQUEST['item']) ? $_REQUEST['item'] : '0';

        $content = '';

        $cnews = new NewsController();
        $smarty->assignByRef('news', $cnews->getEntries());
        $smarty->assignByRef('lastestnews', $cnews->getEntries(3));

        $cnewsletter = new NewsletterController();
        $smarty->assignByRef('newsletters', $cnewsletter->getEntries());

        $cguestbook = new GuestbookController();
        $smarty->assignByRef('guestbookentries', $cguestbook->getEntries());

        $cteams = new TeamController();
        $smarty->assignByRef('teams', $cteams->getEntries());

        $cpages = new PagesController();
        switch($_module) {
            case 'contact-us':
                if (!empty($_POST)) {
                    if (!empty($_POST['contact_name']) && !empty($_POST['contact_message']) && !empty($_POST['contact_email'])) {
                        $naam = $_POST['contact_name'];
                        $email = $_POST['contact_email'];
                        $bericht = $_POST['contact_message'];
                        $headers = 'From: ' . $email . "\r\n" .
                            'Reply-To: ' . $email . "\r\n" .
                            'X-Mailer: PHP/' . phpversion();
                        mail('anouk_wijnhoven@hotmail.com', $naam . ' heeft een vraag over SVO Korfbal', $bericht, $headers);
                        $error = array();
                        $values = array();
                    } else {
                        $error = array('id' => 1, 'message' => 'Niet alle velden zijn ingevuld probeer het opnieuw');
                        $values = array('contact_name' => $_POST['contact_name'], 'contact_message' => $_POST['contact_message'], 'contact_email' => $_POST['contact_email']);
                    }
                } else {
                    $error = array();
                    $values = array();
                }
                $smarty->assign('error', $error);
                $smarty->assign('values', $values);
                $content = $cpages->getEntry($_module);
                $content .= $smarty->fetch('contact-form.tpl');
                break;
            case 'our-news':
                $content = $cpages->getEntry($module);
                $content .= $smarty->fetch('nieuws.tpl');
            case 'nieuwsbrieven':
                $content = $cpages->getEntry($module);
                $content .= $smarty->fetch('newsletters.tpl');
            case 'gastenboek':
                if (!empty($_POST)) {
                    if (!empty($_POST['name'])) {
                        //Spam registreer dit en negeer dit
                        $spam = new Spam();
                        $daospam = new DaoSpam();
                        $spam->setIpaddress($_SERVER['REMOTE_ADDR']);
                        $spam->setText('Een poging tot spam door het volgende ipadress: ' . $spam->getIpaddress());
                        $daospam->save($spam);
                    } elseif (!empty($_POST['contact_name']) && !empty($_POST['contact_message'])) {
                        $guestbook = $cguestbook->guestbook;
                        $guestbook->setTitle($_POST['contact_name']);
                        $guestbook->setText($_POST['contact_message']);
                        $guestbook->setActive(1);
                        $cguestbook->daoguestbook->save($guestbook);
                        $error = array();
                        $values = array();
                        $error = array('id' => 1, 'message' => 'Uw bericht is verstuurd, wij zullen zo snel mogelijk met u contact opnemen.');
                    } else {
                        $error = array('id' => 1, 'message' => 'Niet alle velden zijn ingevuld probeer het opnieuw.');
                        $values = array('contact_name' => $_POST['contact_name'], 'contact_message' => $_POST['contact_message']);
                    }
                } else {
                    $error = array();
                    $values = array();
                }
                $smarty->assign('error', $error);
                $smarty->assign('values', $values);
                $content = $cpages->getEntry($module);
                $content .= $smarty->fetch('gastenboek.tpl');
            default:
                $content = $cpages->getEntry($_module);
                break;
        }

        $smarty->assign('module', $_module);
        $smarty->assignByRef('daopage', $cpages->daopages);
        $smarty->assign('content', $content);

        $smarty->display('page.tpl');
    } catch (Exception $exception) {
        echo $exception->getMessage();
    }
?>