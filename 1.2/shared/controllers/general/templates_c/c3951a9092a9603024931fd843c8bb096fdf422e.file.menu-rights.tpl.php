<?php /* Smarty version Smarty-3.1.8, created on 2012-12-28 14:19:00
         compiled from "../1.2/shared/controllers/general/templates/menu-rights.tpl" */ ?>
<?php /*%%SmartyHeaderCode:85592702450dc80441b4910-08017407%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c3951a9092a9603024931fd843c8bb096fdf422e' => 
    array (
      0 => '../1.2/shared/controllers/general/templates/menu-rights.tpl',
      1 => 1356700736,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85592702450dc80441b4910-08017407',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50dc8044365243_36995607',
  'variables' => 
  array (
    'SCRIPT_NAME' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50dc8044365243_36995607')) {function content_50dc8044365243_36995607($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.replace.php';
?>
<?php if (Rights::users==true){?>
    <li><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
users/" title="Beheerders">Beheerders</a></li>
<?php }?>
<?php if (Rights::pages){?>
    <li><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
pages/" title="Pagina's">Pagina's</a></li>
<?php }?>
<?php if (Rights::snippets){?>
    <li><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
snippet/" title="Snippets">Snippets</a></li>
<?php }?>
<?php if (Rights::teams){?>
    <li><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
teams/" title="Teams">Teams</a></li>
<?php }?>
<?php if (Rights::catalog){?>
    <li><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
catalog/" title="Nieuws">Catalogus</a></li>
<?php }?>
<?php if (Rights::news){?>
    <li><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
news/" title="Nieuws">Nieuws</a></li>
<?php }?>
<?php if (Rights::newsletterBasic){?>
    <li><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
newsletter/" title="Nieuwsbrieven">Nieuwsbrieven</a></li>
<?php }?>
<?php if (Rights::newsletterPlus){?>
    <li><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
newsletter-plus/" title="Nieuwsbrieven">Nieuwsbrieven</a></li>
<?php }?><?php }} ?>