<?php
    /*
     * Author: Stef van den Berg
     * Updated on: 19-06-2012
     * index page of the CMS 1.1 project
     */
    session_start();

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
    include(catalog_controller . 'libs/setup.php');
    include(catalog_controller . 'libs/catalog.php');
    include(newsletterplus_controller . 'libs/setup.php');
    include(newsletterplus_controller . 'libs/newsletterplus.php');
    include(note_controller . 'libs/setup.php');
    include(note_controller . 'libs/notes.php');

    $smarty = new Smarty();
    $smarty->setTemplateDir(general_controllers . 'templates');
    $smarty->setCompileDir(general_controllers . 'templates_c');
    $smarty->assign('url', url);
    $smarty->assign('theme', theme);
    $smarty->assign('version', version);

    //Check if the user is loggedin
    $cprofile = new ProfileController();
    if ($_SESSION['LOGIN'] && ($_module != 'profile' && $_action != 'logout'))
    {
        $daoprofile = new DaoProfile();
        $profile = new Profile();
        $daoprofile->get($profile, $_SESSION['id']);
        $smarty->assignByRef('profile', $profile);
        //$cprofile->miniProfile($_SESSION['id']);
    }

    $smarty->display('header.tpl');

    //Get the querystring attributes
    $_module = isset($_REQUEST['module']) ? $_REQUEST['module'] : 'start';
    $_action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'view';
    $_item = isset($_REQUEST['item']) ? $_REQUEST['item'] : '0';

    if ($_module == 'profile' && $_action == 'logout') {
        $cprofile->logout();
    } else {
        if ($_module == 'profile') {
            switch($_action) {
                case 'subscribe':
                    $cprofile->subscribe($_POST);
                    break;
                case 'subscription':
                    $cprofile->mungeFormData($_POST);
                    $cprofile->save($_POST);
                    break;
                case 'activation':
                    $cprofile->activate($_item);
                    break;
                case 'login':
                    $cprofile->checkLogin($_POST);
                    break;
            }
        }
    }

    //Only show when the user is loggedin
    if ($_SESSION['LOGIN']) {
        switch($_module) {
            case 'pages':
                $cpages = new PagesController();
               switch($_action) {
                    case 'create':
                        $cpages->create($_POST, $cpages->getPossibleParents());
                        break;
                    case 'delete':
                        if ($cpages->remove($_item)) {
                            $cpages->view();
                        }
                        break;
                    case 'edit':
                        $cpages->edit($_POST, $_item, $cpages->getPossibleParents());
                        break;
                    case 'update':
                        $cpages->update($_POST, $_item);
                        $cpages->view();
                        break;
                    case 'save':
                        $cpages->save($_POST);
                        $cpages->view();
                        break;
                    case 'view':
                    default:
                        $cpages->view();
                        break;
                }
                break;
            case 'snippet':
                $csnippet = new SnippetController();
                switch($_action) {
                    case 'create':
                        $csnippet->create($_POST);
                        break;
                    case 'delete':
                        if ($csnippet->remove($_item)) {
                            $csnippet->view($csnippet->getEntries());
                        }
                        break;
                    case 'edit':
                        $csnippet->edit($_POST, $_item);
                        break;
                    case 'update':
                        $csnippet->update($_POST, $_item);
                        $csnippet->view($csnippet->getEntries());
                        break;
                    case 'save':
                        $csnippet->save($_POST);
                        $csnippet->view($csnippet->getEntries());
                        break;
                    case 'view':
                    default:
                        $csnippet->view($csnippet->getEntries());
                        break;
                }
                break;
            case 'users':
               $cuser = new UserController();
               switch($_action) {
                    case 'create':
                        $cuser->create($_POST);
                        break;
                    case 'delete':
                        if ($cuser->delete($_item)) {
                            $cuser->view($cuser->getEntries());
                        }
                        break;
                    case 'edit':
                        $cuser->edit($_POST, $_item);
                        break;
                    case 'update':
                        $cuser->update($_POST, $_item);
                        $cuser->view($cuser->getEntries());
                        break;
                    case 'save':
                        $cuser->save($_POST);
                        $cuser->view($cuser->getEntries());
                        break;
                    case 'view':
                    default:
                        $cuser->view($cuser->getEntries());
                        break;
                }
                break;
            case 'teams':
                $cteams = new TeamController();
                switch($_action) {
                    case 'create':
                        $cteams->create($_POST);
                        break;
                    case 'delete':
                        if ($cteams->remove($_item)) {
                            $cteams->view($cteams->getEntries());
                        }
                        break;
                    case 'edit':
                        $cteams->edit($_POST, $_item);
                        break;
                    case 'update':
                        $cteams->update($_POST, $_FILES, $_item);
                        $cteams->view($cteams->getEntries());
                        break;
                    case 'save':
                        $cteams->save($_POST, $_FILES);
                        $cteams->view($cteams->getEntries());
                        break;
                    case 'view':
                    default:
                        $cteams->view($cteams->getEntries());
                        break;
                }
                break;
            case 'newsletter':
                $cnewsletter = new NewsletterController();
                switch($_action) {
                    case 'create':
                        $cnewsletter->create($_POST);
                        break;
                    case 'delete':
                        if ($cnewsletter->remove($_item)) {
                            $cnewsletter->view($cnewsletter->getEntries());
                        }
                        break;
                    case 'edit':
                        $cnewsletter->edit($_POST, $_item);
                        break;
                    case 'update':
                        $cnewsletter->update($_POST, $_FILES, $_item);
                        $cnewsletter->view($cnewsletter->getEntries());
                        break;
                    case 'save':
                        $cnewsletter->save($_POST, $_FILES);
                        $cnewsletter->view($cnewsletter->getEntries());
                        break;
                    case 'view':
                    default:
                        $cnewsletter->view($cnewsletter->getEntries());
                        break;
                }
                break;
            case 'newsletter-plus':
                $cnewsletterplus = new NewsletterPlusController();
                switch($_action) {
                    case 'prepare':
                        $cnewsletterplus->selectImage($_item);
                        break;
                    case 'send':
                        $images = '';
                        if (isset($_POST)) {
                            $images = $_POST['imagesForNewsletter'];
                        }
                        $cnewsletterplus->prepareNewsletter('info@vandenbergmultimedia.nl', $_item, $images);
                        break;
                    case 'subscribers':
                        if (!empty($_item) && $_item != 1) {
                            $cnewsletterplus->subscribers($cnewsletterplus->getSubscribers($_item), $_item);
                        } else {
                            $cnewsletterplus->subscribers($cnewsletterplus->getSubscribers(1), 1);
                        }
                        break;
                    case 'search-subscribers':
                        $cnewsletterplus->subscribers($cnewsletterplus->searchSubscribers($_POST['search']), 1);
                        break;
                    case 'import':
                        if (empty($_FILES)) {
                            $cnewsletterplus->prepareImport();
                        } else {
                            echo $cnewsletterplus->import($_FILES);
                        }
                        break;
                    case 'subscriber-delete':
                        $cnewsletterplus->deleteSubscriber($_item);
                        $cnewsletterplus->subscribers($cnewsletterplus->getSubscribers());
                        break;
                    case 'save-subscriber':
                        $cnewsletterplus->saveSubscriber($_POST);
                        $cnewsletterplus->subscribers($cnewsletterplus->getSubscribers());
                        break;
                    case 'show':
                        $cnewsletterplus->show($_item);
                        break;
                    case 'view':
                    default:
                        $cnewsletterplus->view();
                        break;
                }
                break;
            case 'news':
                $cnews = new NewsController();
                switch($_action) {
                    case 'create':
                        $cnews->create($_POST);
                        break;
                    case 'delete':
                        if ($cnews->remove($_item)) {
                            $cnews->view();
                        }
                        break;
                    case 'edit':
                        $cnews->edit($_POST, $_item);
                        break;
                    case 'update':
                        $cnews->update($_POST, $_item);
                        $cnews->view();
                        break;
                    case 'save':
                        $cnews->save($_POST);
                        $cnews->view();
                        break;
                    case 'view':
                    default:
                        $cnews->view();
                        break;
                }
                break;
            case 'catalog':
                $ccatalog = new CatalogController();
                switch($_action) {
                    case 'create':
                        $ccatalog->create($_POST, 'car');
                        break;
                    case 'save':
                        $ccatalog->save($_POST);
                        $ccatalog->view($ccatalog->getEntries());
                        break;
                    case 'update':
                        $ccatalog->update($_POST, $_FILES, $_item);
                        $ccatalog->view($ccatalog->getEntries());
                        break;
                    case 'edit':
                        $ccatalog->edit($_POST, $_item, 'car');
                        break;
                    case 'delete':
                        $ccatalog->remove($_item);
                        break;
                    case 'view':
                    default:
                        $ccatalog->view($ccatalog->getEntries());
                        break;
                }
                break;
            case 'note':
                $cnotes = new NotesController();
                switch($_action) {
                    case 'create':
                        $cnotes->create($_POST, $_item);
                        break;
                    case 'save':
                        $cnotes->save($_POST);
                        $cnotes->view($cnotes->getEntries());
                        break;
                    case 'update':
                        $cnotes->update($_POST, $_item);
                        $cnotes->view($cnotes->getEntries());
                        break;
                    case 'edit':
                        $cnotes->edit($_POST, $_item);
                        break;
                    case 'delete':
                        $cnotes->remove($_item);
                        break;
                    case 'view':
                    default:
                        $cnotes->view($cnotes->getEntries());
                        break;
                }
                break;
        }
    }
    else
    {
        $cprofile->login();
    }
    $smarty->display('footer.tpl');
?>