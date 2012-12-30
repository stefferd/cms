<?php /* Smarty version Smarty-3.1.8, created on 2012-08-23 22:20:44
         compiled from "../1.2/shared/controllers/general/templates/menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20605037475025526a9f8b63-44431110%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7fdcc829b4ca5f085830ec3cab4a6fa0799f5dc4' => 
    array (
      0 => '../1.2/shared/controllers/general/templates/menu.tpl',
      1 => 1345753012,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20605037475025526a9f8b63-44431110',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5025526aa132e8_15591615',
  'variables' => 
  array (
    'SCRIPT_NAME' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5025526aa132e8_15591615')) {function content_5025526aa132e8_15591615($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.replace.php';
?>
<nav>
    <ul>
        <li><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
users/" title="Beheerders">Beheerders</a></li>
        <li><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
pages/" title="Pagina's">Pagina's</a></li>
        <li><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
snippet/" title="Snippets">Snippets</a></li>
        <li><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
teams/" title="Teams">Teams</a></li>
        <li><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
news/" title="Nieuws">Nieuws</a></li>
        <li><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
newsletter/" title="Nieuwsbrieven">Nieuwsbrieven</a></li>
    </ul>
</nav><?php }} ?>