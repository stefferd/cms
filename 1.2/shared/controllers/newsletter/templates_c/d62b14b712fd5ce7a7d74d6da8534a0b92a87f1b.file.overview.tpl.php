<?php /* Smarty version Smarty-3.1.8, created on 2012-12-28 15:32:12
         compiled from "../1.2/shared/controllers/newsletter/templates/overview.tpl" */ ?>
<?php /*%%SmartyHeaderCode:235869282503692dfde3827-52515911%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd62b14b712fd5ce7a7d74d6da8534a0b92a87f1b' => 
    array (
      0 => '../1.2/shared/controllers/newsletter/templates/overview.tpl',
      1 => 1356705122,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '235869282503692dfde3827-52515911',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_503692dfe925d9_37141864',
  'variables' => 
  array (
    'data' => 0,
    'SCRIPT_NAME' => 0,
    'newsletter' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_503692dfe925d9_37141864')) {function content_503692dfe925d9_37141864($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.replace.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.date_format.php';
?>
<h1>Nieuwsbrieven</h1>
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
    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']['name'] = 'newsletterec';
$_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['newsletterec']['total']);
?>
        <?php $_smarty_tpl->tpl_vars['newsletter'] = new Smarty_variable($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['newsletterec']['index']], null, 0);?>
    <tr onclick="document.location.href='<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
newsletter/edit/<?php echo $_smarty_tpl->tpl_vars['newsletter']->value->getId();?>
/';">
        <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['newsletter']->value->getTitle(), ENT_QUOTES, 'UTF-8', true);?>
</td>
        <td><?php if ($_smarty_tpl->tpl_vars['newsletter']->value->getActive()!=0){?>Actief<?php }else{ ?>Niet-actief<?php }?></td>
        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['newsletter']->value->getCreated(),"%d-%m-%Y");?>
</td>
        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['newsletter']->value->getUpdated(),"%d-%m-%Y");?>
</td>
        <td><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
newsletter/edit/<?php echo $_smarty_tpl->tpl_vars['newsletter']->value->getId();?>
/" title="Bewerken" class="btn btn-mini"><i class="icon-edit"></i> Bewerken</a></td>
        <td><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
newsletter/delete/<?php echo $_smarty_tpl->tpl_vars['newsletter']->value->getId();?>
/" title="Verwijderen" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Verwijderen</a></td>
    </tr>
    <?php endfor; endif; ?>
    </tbody>
</table>
<a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
newsletter/create/" title="Nieusbrief toevoegen" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Nieuwsbrief toevoegen</a><?php }} ?>