<?php
    /*
     * Author: Stef van den Berg
     * Updated on: 21-07-2012
     * index page of the CMS 1.2 project frontend
     */
    session_start();

    try {
        require_once('./classes/settings.php');
        require_once(smarty_dir . 'Smarty.class.php');
        require_once(profile_controller . 'libs/setup.php');
        require_once(profile_controller . 'libs/profile.php');
        require_once(profile_controller . 'libs/user.php');
        require_once(pages_controller . 'libs/setup.php');
        require_once(pages_controller . 'libs/pages.php');
        require_once(snippet_controller . 'libs/setup.php');
        require_once(snippet_controller . 'libs/snippet.php');
        require_once(teams_controller . 'libs/setup.php');
        require_once(teams_controller . 'libs/teams.php');
        require_once(news_controller . 'libs/setup.php');
        require_once(news_controller . 'libs/news.php');
        require_once(newsletter_controller . 'libs/setup.php');
        require_once(newsletter_controller . 'libs/newsletter.php');
        require_once(guestbook_controller . 'libs/setup.php');
        require_once(guestbook_controller . 'libs/guestbook.php');
        require_once(catalog_controller . 'libs/setup.php');
        require_once(catalog_controller . 'libs/catalog.php');
        require_once(newsletterplus_controller . 'libs/setup.php');
        require_once(newsletterplus_controller . 'libs/newsletterplus.php');
        require_once('./classes/spam/daospam.php');
        require_once(newsletterplus_controller . 'libs/mime_mail.class.php');

        $smarty = new Smarty();
        $smarty->setTemplateDir('theme/general/templates');
        $smarty->setCompileDir('theme/general/templates_c');

        $smarty->assign('url', url);
        $smarty->assign('cms', cms);
        $smarty->assign('theme', theme);
        $smarty->assign('version', version);

        $content = '';
        $message = array();

        //Get the querystring attributes
        $_module = isset($_REQUEST['module']) ? $_REQUEST['module'] : 'home';
        $_action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'view';
        $_item = isset($_REQUEST['item']) ? $_REQUEST['item'] : '0';

        $ccatalogus = new CatalogController();
        if ($_module == 'home' || $_module == 'our-news') {
            $cnews = new NewsController();
            $smarty->assignByRef('news', $cnews->getEntries());
            $smarty->assignByRef('lastestnews', $cnews->getEntries(2));
            $smarty->assignByRef('cars', $ccatalogus->getLastEntries(6));
        }

        if($_module == 'teams') {
            $cteams = new TeamController();
            $smarty->assignByRef('teams', $cteams->getEntries());
        }

        $cpages = new PagesController();
        switch($_module) {
            case 'contact-us':
                if ($_action == 'subscribe') {
                    if (!empty($_POST)) {
                        if (!empty($_POST['name']) && !empty($_POST['email'])) {
                            $naam = $_POST['name'];
                            $email = $_POST['email'];
                            $bericht = 'Automatisch gegenereerd bericht, probeer niet te antwoorden naar het adres.';
                            $headers = 'From: ' . $email . "\r\n" .
                                'Reply-To: ' . $email . "\r\n" .
                                'X-Mailer: PHP/' . phpversion();
                            $cnewsletterplus = new NewsletterPlusController();
                            if (!$cnewsletterplus->checkSubscriber($email)) {
                                /* Sla de nieuwsbrief aanmelding op in de database */
                                $cnewsletterplus->saveSubscriber($_POST);
                                /* Stuur een update naar de website houder */
                                mail('info@porsche356cars.com', $naam . ' heeft zicht aangemeld voor uw nieuwsbrief', $bericht, $headers);
                                $error = array();
                                $values = array();
                                $message = array('message' => 'Your subscription to our newsletter has been confirmed.');
                            } else {
                                $error = array();
                                $values = array();
                                $message = array('message' => 'Your are already subscribed to our newsletter.');
                            }
                        } else {
                            $error = array('id' => 1, 'message' => 'Some required fields are not filled, please try again.');
                            $values = array('name' => $_POST['name'], 'email' => $_POST['email']);
                            $message = array();
                        }
                    } else {
                        $error = array();
                        $values = array();
                        $message = array();
                    }
                } else {
                    if (!empty($_POST)) {
                        if (!empty($_POST['contact_name']) && !empty($_POST['contact_message']) && !empty($_POST['contact_email'])) {
                            $naam = $_POST['contact_name'];
                            $email = $_POST['contact_email'];
                            $bericht = $_POST['contact_message'];
                            $mime = new MIME_Mail();
                            $mime->addTo('info@classics-world.com', 'Classics-world.com');
                            $mime->setFrom($email, $naam);
                            $mime->setSubject($naam . ' heeft contact met u opgenomen via de website');
                            $mime->setPlainPart($bericht);
                            $mime->sendMail();
                            //mail('info@porsche356cars.com', , $bericht, $headers);
                            $error = array();
                            $values = array();
                            $message = array();
                        } else {
                            $error = array('id' => 1, 'message' => 'Some required fields are not filled, please try again.');
                            $values = array('contact_name' => $_POST['contact_name'], 'contact_message' => $_POST['contact_message'], 'contact_email' => $_POST['contact_email']);
                            $message = array();
                        }
                    } else {
                        $error = array();
                        $values = array();
                        $message = array();
                    }
                }
                $smarty->assign('error', $error);
                $smarty->assign('values', $values);
                $smarty->assign('message', $message);
                $content = $cpages->getEntry($_module);
                $content .= $smarty->fetch('contact-form.tpl');
                break;
            case 'our-news':
                $content = $cpages->getEntry($_module);
                $content .= $smarty->fetch('nieuws.tpl');
                break;
            case 'inventory':
                switch($_action) {
                    case 'contact':
                        if (!empty($_POST)) {
                            if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
                                $mime = new MIME_Mail();
                                $naam = $_POST['name'];
                                $email = $_POST['email'];
                                $bericht = $_POST['message'];

                                $car = $ccatalogus->getCar($_item);
                                $subject = $naam . ' heeft een vraag over auto met id ' . $_item . ', ' . $car->title;
                                $smarty->assign('subject', $subject);
                                $smarty->assign('name', $naam);
                                $smarty->assign('email', $email);
                                $smarty->assign('message', $bericht);
                                $smarty->assign('id', $car->id);
                                $smarty->assign('brand', $car->brand);
                                $smarty->assign('type', $car->type);
                                $smarty->assign('year', $car->year);
                                $smarty->assign('engine', $car->engine());
                                $smarty->assign('location', $car->location());
                                $smarty->assign('title', $car->title());
                                $smarty->assign('picture', CatalogController::getMainimage($car->id));
                                $emailmessage = $smarty->fetch('email.tpl');
                                $mime->addTo('info@classics-world.com', 'Classics-world.com');
                                $mime->setFrom($email, $naam);
                                $mime->setSubject($subject);
                                $mime->setHTMLPart($emailmessage);
                                $mime->sendMail();
                                //mail('info@porsche356cars.com', $subject, $emailmessage, $headers);
                                $error = array();
                                $values = array();
                                $message = array('id' => 1, 'message' => 'Your message has been send to the seller.');
                            } else {
                                $error = array('id' => 1, 'message' => 'Some required fields are not filled, please try again.');
                                $values = array('name' => $_POST['name'], 'message' => $_POST['message'], 'email' => $_POST['email']);
                                $message = array();
                            }
                        } else {
                            $error = array();
                            $values = array();
                            $message = array();
                        }
                        $smarty->assign('message', $message);
                        $smarty->assignByRef('item', $ccatalogus->getCar($_item));
                        $content .= $smarty->fetch('catalog-detail.tpl');
                        break;
                    case 'details':
                        $smarty->assign('message', $message);
                        $smarty->assignByRef('item', $ccatalogus->getCar($_item));
                        $content .= $smarty->fetch('catalog-detail.tpl');
                        break;
                    case 'pages':
                        $smarty->assignByRef('catalog', $ccatalogus->getEntriesByPage($_item, 6));
                        $smarty->assign('brands', $ccatalogus->getBrands());
                        $smarty->assign('pagination', $ccatalogus->getPaginering($_item));
                        $content = $cpages->getEntry($_module);
                        $content .= $smarty->fetch('catalog.tpl');
                        break;
                    default:
                        $smarty->assignByRef('catalog', $ccatalogus->getEntries(6));
                        $smarty->assign('brands', $ccatalogus->getBrands());
                        $smarty->assign('pagination', $ccatalogus->getPaginering(1));
                        $content = $cpages->getEntry($_module);
                        $content .= $smarty->fetch('catalog.tpl');
                        break;
                }
                break;
            case 'nieuwsbrieven':
                $cnewsletter = new NewsletterController();
                $smarty->assignByRef('newsletters', $cnewsletter->getEntries());
                $content = $cpages->getEntry($_module);
                $content .= $smarty->fetch('newsletters.tpl');
                break;
            case 'gastenboek':
                $cguestbook = new GuestbookController();
                $smarty->assignByRef('guestbookentries', $cguestbook->getEntries());
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
                $content = $cpages->getEntry($_module);
                $content .= $smarty->fetch('gastenboek.tpl');
                break;
            case 'newsletter-plus':
                $cnewsletterplus = new NewsletterPlusController();
                switch($_action) {
                    case 'view':
                        $newsletter = $cnewsletterplus->get($_item);
                        $content = $newsletter->html;
                        break;
                    case 'unsubscribe':
                        if (!empty($_POST)) {
                            //Show unsubscribe completed
                            if ($cnewsletterplus->unsubscripe($_POST['email'])) {
                                $message = array('message' => 'Your unsubscription to our newsletter has been confirmed. You will not receive newsletters from us in the future.');
                            } else {
                                $message = array('message' => 'The email (' . $_POST['email'] . ') given is not found as a subscription.');
                            }
                            $smarty->assign('message', $message);
                            $content = $smarty->fetch('unsubscribe-newsletter.tpl');
                        } else {
                            //Show unsubscribe
                            $message = array();
                            $smarty->assign('message', $message);
                            $content = $smarty->fetch('unsubscribe-newsletter.tpl');
                        }
                        break;
                }
                break;
            case 'home':
                switch($_action) {
                    case 'subscribe':
                        if (!empty($_POST)) {
                            if ($smarty->isCached('page.tpl')) {
                                $smarty->clearCache('page.tpl');
                            }
                            if (!empty($_POST['name']) && !empty($_POST['name'])) {
                                $naam = $_POST['name'];
                                $email = $_POST['email'];
                                $bericht = 'Automatisch gegenereerd bericht, probeer niet te antwoorden naar het adres.';
                                $headers = 'From: ' . $email . "\r\n" .
                                    'Reply-To: ' . $email . "\r\n" .
                                    'X-Mailer: PHP/' . phpversion();
                                $cnewsletterplus = new NewsletterPlusController();
                                if (!$cnewsletterplus->checkSubscriber($email)) {
                                    /* Sla de nieuwsbrief aanmelding op in de database */
                                    $cnewsletterplus->saveSubscriber($_POST);
                                    /* Stuur een update naar de website houder */
                                    mail('info@porsche356cars.com', $naam . ' heeft zicht aangemeld voor uw nieuwsbrief', $bericht, $headers);
                                    $error = array();
                                    $values = array();
                                    $message = array('message' => 'Your subscription to our newsletter has been confirmed.');
                                } else {
                                    $error = array();
                                    $values = array();
                                    $message = array('message' => 'Your are already subscribed to our newsletter.');
                                }
                            } else {
                                $error = array();
                                $values = array();
                                $message = array();
                            }
                        } else {
                            $error = array('id' => 1, 'message' => 'Some required fields are not filled, please try again.');
                            $values = array('name' => $_POST['name'], 'email' => $_POST['email']);
                            $message = array();
                        }
                        $smarty->assign('message', $message);
                        $content = $cpages->getEntry($_module);
                        break;
                    default:
                        $smarty->assign('message', $message);
                        $content = str_replace('cw/images/', cms. 'images/', $cpages->getEntry($_module));
                        break;
                }
                break;
            default:
                $smarty->assign('message', $message);
                $content = str_replace('cw/images/', cms. 'images/', $cpages->getEntry($_module));
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