<?php /* Smarty version Smarty-3.1.8, created on 2013-01-18 01:12:33
         compiled from "../1.2/shared/controllers/notes/templates/overview.tpl" */ ?>
<?php /*%%SmartyHeaderCode:134323633450f6d30d5ff7a2-74388733%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73396963d0ece76bfca3db0421ba248f4c505fc4' => 
    array (
      0 => '../1.2/shared/controllers/notes/templates/overview.tpl',
      1 => 1358353923,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '134323633450f6d30d5ff7a2-74388733',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50f6d30d6ab032_60960315',
  'variables' => 
  array (
    'data' => 0,
    'item' => 0,
    'SCRIPT_NAME' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f6d30d6ab032_60960315')) {function content_50f6d30d6ab032_60960315($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_replace')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.replace.php';
?>
<h1>Notities</h1>
<table class="table table-hover table-striped table-bordered">
    <thead>
    <tr>
        <th>Id</th>
        <th>Naam</th>
        <th>Email</th>
        <th>Aangemaakt op</th>
        <th>Van</th>
        <th>&nbsp;</th>
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
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->getId();?>
</td>
            <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value->getName(), ENT_QUOTES, 'UTF-8', true);?>
</td>
            <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value->getEmail(), ENT_QUOTES, 'UTF-8', true);?>
</td>
            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value->getCreated(),"%d-%m-%Y");?>
</td>
            <td><?php echo htmlspecialchars(ProfileController::getFullname($_smarty_tpl->tpl_vars['item']->value->getUser()), ENT_QUOTES, 'UTF-8', true);?>
</td>
            <td><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
note/edit/<?php echo $_smarty_tpl->tpl_vars['item']->value->getId();?>
/" title="Bewerken" class="btn btn-mini"><i class="icon-edit"></i> Bewerken</a></td>
            <td><a href="#" data-delete="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
note/delete/<?php echo $_smarty_tpl->tpl_vars['item']->value->getId();?>
/" title="Verwijderen" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Verwijderen</a></td>
        </tr>
    <?php endfor; endif; ?>
    </tbody>
</table>
<script type="text/javascript">
    $('.btn-danger').click(function() {
        var delUrl = $(this).attr('data-delete');
        var deleteMessage = confirm('Weet u zeker dat u dit item wilt verwijderen?');
        if (deleteMessage) {
            document.location.href = delUrl;
        }
    });
</script><?php }} ?>