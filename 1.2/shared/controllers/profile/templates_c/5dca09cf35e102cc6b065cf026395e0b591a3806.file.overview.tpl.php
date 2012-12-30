<?php /* Smarty version Smarty-3.1.8, created on 2012-12-28 15:13:25
         compiled from "../1.2/shared/controllers/profile/templates/overview.tpl" */ ?>
<?php /*%%SmartyHeaderCode:136021127450352e5b5e51c1-45115887%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5dca09cf35e102cc6b065cf026395e0b591a3806' => 
    array (
      0 => '../1.2/shared/controllers/profile/templates/overview.tpl',
      1 => 1356703985,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136021127450352e5b5e51c1-45115887',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50352e5b7c6638_94460164',
  'variables' => 
  array (
    'data' => 0,
    'profile' => 0,
    'SCRIPT_NAME' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50352e5b7c6638_94460164')) {function content_50352e5b7c6638_94460164($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_replace')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.replace.php';
?>
<h1>Beheerders</h1>
<table class="table table-hover table-striped table-bordered">
    <thead>
        <tr>
            <th>Naam</th>
            <th>Achternaam</th>
            <th>E-mailadres</th>
            <th>Laatst gewijzigd op</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['profiles'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']['name'] = 'profiles';
$_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['profiles']['total']);
?>
        <?php $_smarty_tpl->tpl_vars['profile'] = new Smarty_variable($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['profiles']['index']], null, 0);?>
        <tr>
            <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['profile']->value->getName(), ENT_QUOTES, 'UTF-8', true);?>
</td>
            <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['profile']->value->getLastname(), ENT_QUOTES, 'UTF-8', true);?>
</td>
            <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['profile']->value->getEmailaddress(), ENT_QUOTES, 'UTF-8', true);?>
</td>
            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['profile']->value->getUpdated(),"%d-%m-%Y");?>
</td>
            <td><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
users/edit/<?php echo $_smarty_tpl->tpl_vars['profile']->value->getId();?>
/" title="Bewerken" class="btn btn-mini"><i class="icon-edit"></i> Bewerken</a></td>
            <!--<td><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
users/delete/<?php echo $_smarty_tpl->tpl_vars['profile']->value->getId();?>
/" title="Verwijderen">Verwijderen</a></td>-->
        </tr>
    <?php endfor; endif; ?>
    </tbody>
</table>
<a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
users/create/" title="Beheerder toevoegen" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Beheerder toevoegen</a><?php }} ?>