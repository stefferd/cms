<?php /* Smarty version Smarty-3.1.8, created on 2013-01-16 17:24:27
         compiled from "../1.2/shared/controllers/notes/templates/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:143447090350f6d289be63f9-75181885%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7e9fe690ccba5f290d14bb0c372df2399d612c8e' => 
    array (
      0 => '../1.2/shared/controllers/notes/templates/form.tpl',
      1 => 1358353464,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '143447090350f6d289be63f9-75181885',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50f6d289c641d9_31931968',
  'variables' => 
  array (
    'item' => 0,
    'SCRIPT_NAME' => 0,
    'car' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f6d289c641d9_31931968')) {function content_50f6d289c641d9_31931968($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.replace.php';
?><!-- The form for the car catalog type -->
<?php if ($_smarty_tpl->tpl_vars['item']->value->getId()!=''){?>
    <form action="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
note/update/<?php echo $_smarty_tpl->tpl_vars['item']->value->getId();?>
/" method="post" enctype="multipart/form-data">
<?php }else{ ?>
    <form action="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
note/save/" method="post" enctype="multipart/form-data">
<?php }?>
    <fieldset>
        <legend>Notitie toevoegen</legend>
        <div class="controls controls-row">
            <div class="control-group span10">
                <label class="control-label" for="name">Naam</label>
                <div class="controls">
                    <input type="text" id="name" name="name" placeholder="Naam" class="span10" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value->getName(), ENT_QUOTES, 'UTF-8', true);?>
" />
                </div>
            </div>
            <div class="control-group span1">
                <label class="control-label" for="active">Actief</label>
                <div class="controls">
                    <input id="active" name="active" type="checkbox" checked="checked" />
                </div>
            </div>
        </div>
        <div class="controls controls-row">
            <div class="control-group span5">
                <label class="control-label" for="email">Email</label>
                <div class="controls">
                    <input type="text" id="email" name="email" placeholder="Email" class="input-xlarge" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value->getEmail(), ENT_QUOTES, 'UTF-8', true);?>
" />
                </div>
            </div>
            <div class="control-group span5 offset1">
                <label class="control-label">Notitie voor <?php echo $_smarty_tpl->tpl_vars['car']->value->getTitle();?>
 <?php echo $_smarty_tpl->tpl_vars['car']->value->getYear();?>
</label>
                <div class="controls">
                    Met id <?php echo $_smarty_tpl->tpl_vars['car']->value->getId();?>

                </div>
                <input type="hidden" name="catalog" class="input-xlarge" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value->getCatalog(), ENT_QUOTES, 'UTF-8', true);?>
" />
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Notitie</legend>
        <textarea id="text" name="text" placeholder="Plaats hier uw notitie"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value->getText(), ENT_QUOTES, 'UTF-8', true);?>
</textarea>
    </fieldset>
    <div class="form-actions">
        <input type="submit" value="Opslaan" class="btn btn-primary" onmouseup="showLoading();" />
        <button type="button" onclick="document.location.href='<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
catalog/';" class="btn">Annuleren</button>
    </div>
</form>
<script type="text/javascript">
    function showLoading() {
        $('.btn, a').each(function() {
            if (!$(this).hasClass('btn-primary')) {
                $(this).attr('disabled', true);
            }
        });
        $('body').append('<div class="modal">' +
                            '<div class="modal-header">' +
                                '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>' +
                                '<h3>Opslaan</h3>' +
                            '</div>' +
                            '<div class="modal-body">' +
                                '<p>De gegevens worden opgeslagen, dit kan enige tijd duren...</p>' +
                            '</div>' +
                            '<div class="modal-footer">' +
                                '<a href="#" class="btn">Close</a>' +
                            '</div>' +
                         '</div>');
    }
</script><?php }} ?>