<?php /* Smarty version Smarty-3.1.8, created on 2012-08-10 21:10:36
         compiled from "../1.2/shared/controllers/pages/templates/overview.tpl" */ ?>
<?php /*%%SmartyHeaderCode:189001554550255cac34ead9-65824046%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c8c73f2bc0dc75e525f23154fdf7bea5cfedc094' => 
    array (
      0 => '../1.2/shared/controllers/pages/templates/overview.tpl',
      1 => 1344622567,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '189001554550255cac34ead9-65824046',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SCRIPT_NAME' => 0,
    'data' => 0,
    'pages' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50255cac3e3f06_47102379',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50255cac3e3f06_47102379')) {function content_50255cac3e3f06_47102379($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.replace.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.date_format.php';
?>
<div class="blocks pages">
    <div class="header">
        <h2>Pagina's</h2>
        <span class="action"><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
pages/create/" title="Pagina toevoegen">Pagina toevoegen</a></span>
    </div>
    <div class="block pages">
        <div class="row header">
            <div class="column column1">Titel</div>
            <div class="column column2">Actief</div>
            <div class="column column3">Aangemaakt op</div>
            <div class="column column4">Aangepast op</div>
            <div class="column column5">&nbsp;</div>
            <!--<div class="column column6">&nbsp;</div>-->
        </div>
    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']['name'] = 'pagesec';
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['pagesec']['total']);
?>
        <?php $_smarty_tpl->tpl_vars['pages'] = new Smarty_variable($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pagesec']['index']], null, 0);?>
        <div class="row instance">
            <div class="column column1"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pages']->value->getTitle(), ENT_QUOTES, 'UTF-8', true);?>
</div>
            <div class="column column2"><?php if ($_smarty_tpl->tpl_vars['pages']->value->getActive()!=0){?>Actief<?php }else{ ?>Niet-actief<?php }?></div>
            <div class="column column3"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['pages']->value->getCreated(),"%d-%m-%Y");?>
</div>
            <div class="column column4"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['pages']->value->getUpdated(),"%d-%m-%Y");?>
</div>
            <div class="column column5"><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
pages/edit/<?php echo $_smarty_tpl->tpl_vars['pages']->value->getId();?>
/" title="Bewerken">Bewerken</a></div>
            <!--<div class="column column6"><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
pages/delete/<?php echo $_smarty_tpl->tpl_vars['pages']->value->getId();?>
/" title="Verwijderen">Verwijderen</a></div>-->
        </div>
    <?php endfor; endif; ?>
    </div>
</div><?php }} ?>