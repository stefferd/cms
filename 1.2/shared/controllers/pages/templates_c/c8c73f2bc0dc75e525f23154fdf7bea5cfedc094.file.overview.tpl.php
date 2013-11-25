<?php /* Smarty version Smarty-3.1.8, created on 2013-01-11 20:55:08
         compiled from "../1.2/shared/controllers/pages/templates/overview.tpl" */ ?>
<?php /*%%SmartyHeaderCode:189001554550255cac34ead9-65824046%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c8c73f2bc0dc75e525f23154fdf7bea5cfedc094' => 
    array (
      0 => '../1.2/shared/controllers/pages/templates/overview.tpl',
      1 => 1357857390,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '189001554550255cac34ead9-65824046',
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
  'unifunc' => 'content_50255cac3e3f06_47102379',
  'variables' => 
  array (
    'data' => 0,
    'level' => 0,
    'classes' => 0,
    'page' => 0,
    'SCRIPT_NAME' => 0,
    'daopage' => 0,
    'children' => 0,
    'count' => 0,
  ),
  'has_nocache_code' => 0,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50255cac3e3f06_47102379')) {function content_50255cac3e3f06_47102379($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.replace.php';
?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_replace')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.replace.php';
?><?php if (!function_exists('smarty_template_function_row')) {
    function smarty_template_function_row($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['row']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
    <?php $_smarty_tpl->tpl_vars['classes'] = new Smarty_variable(array('main','child child_1','child child_2','child child_3','child child_4','child child_5'), null, 0);?>
    <?php  $_smarty_tpl->tpl_vars['page'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['page']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['page']->key => $_smarty_tpl->tpl_vars['page']->value){
$_smarty_tpl->tpl_vars['page']->_loop = true;
?>
    <tr class="<?php echo $_smarty_tpl->tpl_vars['classes']->value[$_smarty_tpl->tpl_vars['level']->value];?>
">
        <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value->getTitle(), ENT_QUOTES, 'UTF-8', true);?>
</td>
        <td><?php if ($_smarty_tpl->tpl_vars['page']->value->getActive()!=0){?>Actief<?php }else{ ?>Niet-actief<?php }?></td>
        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['page']->value->getCreated(),"%d-%m-%Y");?>
</td>
        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['page']->value->getUpdated(),"%d-%m-%Y");?>
</td>
        <td><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
pages/edit/<?php echo $_smarty_tpl->tpl_vars['page']->value->getId();?>
/" title="Bewerken" class="btn btn-mini"><i class="icon-edit"></i> Bewerken</a></td>
        <!--<td><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
pages/delete/<?php echo $_smarty_tpl->tpl_vars['page']->value->getId();?>
/" title="Verwijderen" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Verwijderen</a></td>-->
    </tr>
        <?php $_smarty_tpl->tpl_vars['children'] = new Smarty_variable($_smarty_tpl->tpl_vars['daopage']->value->getChildren($_smarty_tpl->tpl_vars['page']->value->getId()), null, 0);?>
        <?php $_smarty_tpl->tpl_vars['count'] = new Smarty_variable(count($_smarty_tpl->tpl_vars['children']->value), null, 0);?>
        <?php if ($_smarty_tpl->tpl_vars['count']->value>0){?>
            <?php smarty_template_function_row($_smarty_tpl,array('data'=>$_smarty_tpl->tpl_vars['children']->value,'daopage'=>$_smarty_tpl->tpl_vars['daopage']->value,'level'=>$_smarty_tpl->tpl_vars['level']->value+1));?>

        <?php }?>
    <?php } ?>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>


<h1>Pagina's</h1>
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
        <?php smarty_template_function_row($_smarty_tpl,array('data'=>$_smarty_tpl->tpl_vars['daopage']->value->getMain(),'daopage'=>$_smarty_tpl->tpl_vars['daopage']->value));?>

    </tbody>
</table>
<a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
pages/create/" title="Pagina toevoegen" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Pagina toevoegen</a><?php }} ?>