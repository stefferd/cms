<?php /* Smarty version Smarty-3.1.8, created on 2012-12-28 13:45:32
         compiled from "../1.2/shared/controllers/profile/templates/miniprofile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13592578215025526a9715d3-21404668%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '223cda93400b62b10082fe7a81056ddb99ed207d' => 
    array (
      0 => '../1.2/shared/controllers/profile/templates/miniprofile.tpl',
      1 => 1356698730,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13592578215025526a9715d3-21404668',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5025526a9f1ac2_08043805',
  'variables' => 
  array (
    'profile' => 0,
    'SCRIPT_NAME' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5025526a9f1ac2_08043805')) {function content_5025526a9f1ac2_08043805($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.replace.php';
?>
<div class="blocks logins">
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
</div><?php }} ?>