<?php /* Smarty version Smarty-3.1.8, created on 2012-08-20 21:17:43
         compiled from "../1.2/shared/controllers/snippet/templates/overview.tpl" */ ?>
<?php /*%%SmartyHeaderCode:36797336950255c9dc498e5-39189008%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f1aa678fde8487f46159858fb9b66757c3e40f0' => 
    array (
      0 => '../1.2/shared/controllers/snippet/templates/overview.tpl',
      1 => 1345490247,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '36797336950255c9dc498e5-39189008',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50255c9dce88f9_03950263',
  'variables' => 
  array (
    'SCRIPT_NAME' => 0,
    'data' => 0,
    'snippet' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50255c9dce88f9_03950263')) {function content_50255c9dce88f9_03950263($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.replace.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.date_format.php';
?>
<div class="blocks snippets">
    <div class="header">
        <h2>Snippets</h2>
        <span class="action"><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
snippet/create/" title="Pagina toevoegen">Snippet toevoegen</a></span>
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
    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']['name'] = 'snippetsec';
$_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['snippetsec']['total']);
?>
        <?php $_smarty_tpl->tpl_vars['snippet'] = new Smarty_variable($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['snippetsec']['index']], null, 0);?>
        <div class="row instance">
            <div class="column column1"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['snippet']->value->getTitle(), ENT_QUOTES, 'UTF-8', true);?>
</div>
            <div class="column column2"><?php if ($_smarty_tpl->tpl_vars['snippet']->value->getActive()!=0){?>Actief<?php }else{ ?>Niet-actief<?php }?></div>
            <div class="column column3"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['snippet']->value->getCreated(),"%d-%m-%Y");?>
</div>
            <div class="column column4"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['snippet']->value->getUpdated(),"%d-%m-%Y");?>
</div>
            <div class="column column5"><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
snippet/edit/<?php echo $_smarty_tpl->tpl_vars['snippet']->value->getId();?>
/" title="Bewerken">Bewerken</a></div>
            <!--<div class="column column6"><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
snippet/delete/<?php echo $_smarty_tpl->tpl_vars['snippet']->value->getId();?>
/" title="Verwijderen">Verwijderen</a></div>-->
        </div>
    <?php endfor; endif; ?>
    </div>
</div><?php }} ?>