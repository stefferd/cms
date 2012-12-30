<?php /* Smarty version Smarty-3.1.8, created on 2012-08-22 23:48:08
         compiled from "../1.2/shared/controllers/teams/templates/overview.tpl" */ ?>
<?php /*%%SmartyHeaderCode:132633725750329017763641-44393005%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c09ce3d1f951e07481e10f4ced4e68c18a49aa9' => 
    array (
      0 => '../1.2/shared/controllers/teams/templates/overview.tpl',
      1 => 1345672086,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '132633725750329017763641-44393005',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50329017810721_36328183',
  'variables' => 
  array (
    'SCRIPT_NAME' => 0,
    'data' => 0,
    'teams' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50329017810721_36328183')) {function content_50329017810721_36328183($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.replace.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.date_format.php';
?>
<div class="blocks pages">
    <div class="header">
        <h2>Teams's</h2>
        <span class="action"><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
teams/create/" title="Team toevoegen">Team toevoegen</a></span>
    </div>
    <div class="block pages">
        <div class="row header">
            <div class="column column1">Naam</div>
            <div class="column column2">Actief</div>
            <div class="column column3">Aangemaakt op</div>
            <div class="column column4">Aangepast op</div>
            <div class="column column5">&nbsp;</div>
            <!--<div class="column column6">&nbsp;</div>-->
        </div>
    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']['name'] = 'teamsec';
$_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['teamsec']['total']);
?>
        <?php $_smarty_tpl->tpl_vars['teams'] = new Smarty_variable($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['teamsec']['index']], null, 0);?>
        <div class="row instance" onclick="document.location.href='<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
teams/edit/<?php echo $_smarty_tpl->tpl_vars['teams']->value->getId();?>
/';">
            <div class="column column1"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['teams']->value->getTitle(), ENT_QUOTES, 'UTF-8', true);?>
</div>
            <div class="column column2"><?php if ($_smarty_tpl->tpl_vars['teams']->value->getActive()!=0){?>Actief<?php }else{ ?>Niet-actief<?php }?></div>
            <div class="column column3"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['teams']->value->getCreated(),"%d-%m-%Y");?>
</div>
            <div class="column column4"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['teams']->value->getUpdated(),"%d-%m-%Y");?>
</div>
            <div class="column column5"><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
teams/edit/<?php echo $_smarty_tpl->tpl_vars['teams']->value->getId();?>
/" title="Bewerken">Bewerken</a></div>
            <div class="column column6"><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
teams/delete/<?php echo $_smarty_tpl->tpl_vars['teams']->value->getId();?>
/" title="Verwijderen">Verwijderen</a></div>
        </div>
    <?php endfor; endif; ?>
    </div>
</div><?php }} ?>