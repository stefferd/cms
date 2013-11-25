<?php /* Smarty version Smarty-3.1.8, created on 2013-01-07 22:49:18
         compiled from "../1.2/shared/controllers/general/templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17344780015025523c1a2618-19854208%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46c4ad4ba92b7355d47e6e4ea78a7474a819cafe' => 
    array (
      0 => '../1.2/shared/controllers/general/templates/header.tpl',
      1 => 1357595180,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17344780015025523c1a2618-19854208',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5025523c1ee636_97027152',
  'variables' => 
  array (
    'version' => 0,
    'url' => 0,
    'theme' => 0,
    'profile' => 0,
    'SCRIPT_NAME' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5025523c1ee636_97027152')) {function content_5025523c1ee636_97027152($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.replace.php';
?><!DOCTYPE html>
<html lang="nl">
    <head>
        <title>MMCMS - <?php echo $_smarty_tpl->tpl_vars['version']->value;?>
</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link media="screen" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
css/style.css" type="text/css" />
        <script language="javascript" type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
javascript/jquery-1.7.2.min.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
javascript/default-controller.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
../1.2/shared/editor/jscripts/tiny_mce/tiny_mce.js"></script>
        <!-- Bootstap -->
        <link media="screen" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
../1.2/shared/libs/bootstrap/bootstrap-responsive.min.css" type="text/css" />
        <link media="screen" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
../1.2/shared/libs/bootstrap/bootstrap.min.css" type="text/css" />
        <script language="javascript" type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
../1.2/shared/libs/bootstrap/bootstrap.min.js"></script>
        <!-- Lightbox -->
        <link media="screen" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
../1.2/shared/libs/lightbox/jquery.lightbox-0.5.css" type="text/css" />
        <script language="javascript" type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
../1.2/shared/libs/lightbox/jquery.lightbox-0.5.min.js"></script>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" class="brand">MMCMS</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <?php if (isset($_smarty_tpl->tpl_vars['profile']->value)){?>
                                <?php echo $_smarty_tpl->getSubTemplate ('menu-rights.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 1);?>

                            <?php }?>
                        </ul>
                        <div class="pull-right">
                            <?php if (isset($_smarty_tpl->tpl_vars['profile']->value)){?>
                                <div class="btn-group">
                                    <a class="btn dropdown-toggle" data-toggle="dropdown" href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
profile/view/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['profile']->value->getId(), ENT_QUOTES, 'UTF-8', true);?>
/">
                                        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['profile']->value->getName(), ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['profile']->value->getLastname(), ENT_QUOTES, 'UTF-8', true);?>

                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
users/edit/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['profile']->value->getId(), ENT_QUOTES, 'UTF-8', true);?>
/" title="Profiel wijzigen">Profiel wijzigen</a></li>
                                        <li><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
profile/logout/" title="Uitloggen">Uitloggen</a></li>
                                    </ul>
                                </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container"><?php }} ?>