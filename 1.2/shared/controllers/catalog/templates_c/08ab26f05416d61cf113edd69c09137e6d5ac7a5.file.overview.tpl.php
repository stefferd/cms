<?php /* Smarty version Smarty-3.1.8, created on 2012-12-28 15:17:22
         compiled from "../1.2/shared/controllers/catalog/templates/overview.tpl" */ ?>
<?php /*%%SmartyHeaderCode:107880260150dcde6981b096-11337963%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08ab26f05416d61cf113edd69c09137e6d5ac7a5' => 
    array (
      0 => '../1.2/shared/controllers/catalog/templates/overview.tpl',
      1 => 1356704239,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '107880260150dcde6981b096-11337963',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50dcde698ecb33_09629890',
  'variables' => 
  array (
    'data' => 0,
    'SCRIPT_NAME' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50dcde698ecb33_09629890')) {function content_50dcde698ecb33_09629890($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.replace.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.date_format.php';
?>
<h1>Catalogus</h1>
<table class="table table-hover table-striped table-bordered">
    <thead>
    <tr>
        <th>Titel</th>
        <th>Actief</th>
        <th>Aangemaakt op</th>
        <th>Aangepast op</th>
        <th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']['name'] = 'itemsec';
$_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['itemsec']['total']);
?>
        <?php $_smarty_tpl->tpl_vars['item'] = new Smarty_variable($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['itemsec']['index']], null, 0);?>
        <tr onclick="document.location.href='<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
catalog/edit/<?php echo $_smarty_tpl->tpl_vars['item']->value->getId();?>
/';">
            <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value->getTitle(), ENT_QUOTES, 'UTF-8', true);?>
</td>
            <td><?php if ($_smarty_tpl->tpl_vars['item']->value->getActive()!=0){?>Actief<?php }else{ ?>Niet-actief<?php }?></td>
            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value->getCreated(),"%d-%m-%Y");?>
</td>
            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value->getUpdated(),"%d-%m-%Y");?>
</td>
            <td><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
catalog/edit/<?php echo $_smarty_tpl->tpl_vars['item']->value->getId();?>
/" title="Bewerken" class="btn btn-mini"><i class="icon-edit"></i> Bewerken</a></td>
            <td><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
catalog/delete/<?php echo $_smarty_tpl->tpl_vars['item']->value->getId();?>
/" title="Verwijderen" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Verwijderen</a></td>
        </tr>
    <?php endfor; endif; ?>
    </tbody>
</table>
<a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
catalog/create/" title="Item toevoegen" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Item toevoegen</a><?php }} ?>