<?php /* Smarty version Smarty-3.1.8, created on 2013-01-27 15:07:31
         compiled from "../1.2/shared/controllers/teams/templates/overview.tpl" */ ?>
<?php /*%%SmartyHeaderCode:132633725750329017763641-44393005%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c09ce3d1f951e07481e10f4ced4e68c18a49aa9' => 
    array (
      0 => '../1.2/shared/controllers/teams/templates/overview.tpl',
      1 => 1359295648,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '132633725750329017763641-44393005',
  'function' => 
  array (
    'row' => 
    array (
      'parameter' => 
      array (
        'level' => 0,
      ),
      'compiled' => '',
    ),
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50329017810721_36328183',
  'variables' => 
  array (
    'data' => 0,
    'level' => 0,
    'classes' => 0,
    'team' => 0,
    'SCRIPT_NAME' => 0,
  ),
  'has_nocache_code' => 0,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50329017810721_36328183')) {function content_50329017810721_36328183($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.replace.php';
?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_replace')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.replace.php';
?><?php if (!function_exists('smarty_template_function_row')) {
    function smarty_template_function_row($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['row']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
    <?php $_smarty_tpl->tpl_vars['classes'] = new Smarty_variable(array('main','child child_1','child child_2','child child_3','child child_4','child child_5'), null, 0);?>
    <?php  $_smarty_tpl->tpl_vars['team'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['team']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['team']->key => $_smarty_tpl->tpl_vars['team']->value){
$_smarty_tpl->tpl_vars['team']->_loop = true;
?>
        <tr class="<?php echo $_smarty_tpl->tpl_vars['classes']->value[$_smarty_tpl->tpl_vars['level']->value];?>
">
            <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['team']->value->getTitle(), ENT_QUOTES, 'UTF-8', true);?>
</td>
            <td><?php if ($_smarty_tpl->tpl_vars['team']->value->getActive()!=0){?>Actief<?php }else{ ?>Niet-actief<?php }?></td>
            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['team']->value->getCreated(),"%d-%m-%Y");?>
</td>
            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['team']->value->getUpdated(),"%d-%m-%Y");?>
</td>
            <td><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
teams/edit/<?php echo $_smarty_tpl->tpl_vars['team']->value->getId();?>
/" title="Bewerken" class="btn btn-mini"><i class="icon-edit"></i> Bewerken</a></td>
            <td><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
teams/delete/<?php echo $_smarty_tpl->tpl_vars['team']->value->getId();?>
/" title="Verwijderen" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Verwijderen</a></td>
        </tr>
    <?php } ?>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>


<h1>Team's</h1>
<table class="table table-hover table-striped table-bordered">
    <thead>
        <tr>
            <th>Naam</th>
            <th>Actief</th>
            <th>Aangemaakt op</th>
            <th>Aangepast op</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php smarty_template_function_row($_smarty_tpl,array('data'=>$_smarty_tpl->tpl_vars['data']->value));?>

    </tbody>
</table>
<a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
teams/create/" title="Team toevoegen" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Team toevoegen</a><?php }} ?>