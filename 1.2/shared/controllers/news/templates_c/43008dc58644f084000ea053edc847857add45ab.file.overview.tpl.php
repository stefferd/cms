<?php /* Smarty version Smarty-3.1.8, created on 2012-12-28 15:21:21
         compiled from "../1.2/shared/controllers/news/templates/overview.tpl" */ ?>
<?php /*%%SmartyHeaderCode:461099706503699b665d592-18787871%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '43008dc58644f084000ea053edc847857add45ab' => 
    array (
      0 => '../1.2/shared/controllers/news/templates/overview.tpl',
      1 => 1356704476,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '461099706503699b665d592-18787871',
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
  'unifunc' => 'content_503699b6757f96_34539640',
  'variables' => 
  array (
    'data' => 0,
    'news' => 0,
    'SCRIPT_NAME' => 0,
    'daonews' => 0,
  ),
  'has_nocache_code' => 0,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_503699b6757f96_34539640')) {function content_503699b6757f96_34539640($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.replace.php';
?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_replace')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.replace.php';
?><?php if (!function_exists('smarty_template_function_row')) {
    function smarty_template_function_row($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['row']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
    <?php  $_smarty_tpl->tpl_vars['news'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['news']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['news']->key => $_smarty_tpl->tpl_vars['news']->value){
$_smarty_tpl->tpl_vars['news']->_loop = true;
?>
        <tr>
            <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['news']->value->getTitle(), ENT_QUOTES, 'UTF-8', true);?>
</td>
            <td><?php if ($_smarty_tpl->tpl_vars['news']->value->getActive()!=0){?>Actief<?php }else{ ?>Niet-actief<?php }?></td>
            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['news']->value->getCreated(),"%d-%m-%Y");?>
</td>
            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['news']->value->getUpdated(),"%d-%m-%Y");?>
</td>
            <td><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
news/edit/<?php echo $_smarty_tpl->tpl_vars['news']->value->getId();?>
/" title="Bewerken" class="btn btn-mini"><i class="icon-edit"></i> Bewerken</a></td>
            <td><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
news/delete/<?php echo $_smarty_tpl->tpl_vars['news']->value->getId();?>
/" title="Verwijderen" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Verwijderen</a></td>
        </tr>
    <?php } ?>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>


<h1>Nieuws</h1>
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
        <?php smarty_template_function_row($_smarty_tpl,array('data'=>$_smarty_tpl->tpl_vars['daonews']->value->getEntries(),'daonews'=>$_smarty_tpl->tpl_vars['daonews']->value));?>

    </tbody>
</table>
<a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
news/create/" title="Pagina toevoegen" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Nieuws toevoegen</a><?php }} ?>