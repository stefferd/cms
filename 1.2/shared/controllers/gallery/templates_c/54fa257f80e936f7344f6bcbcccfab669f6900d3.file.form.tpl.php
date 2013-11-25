<?php /* Smarty version Smarty-3.1.8, created on 2013-06-05 23:26:51
         compiled from "../1.2/shared/controllers/gallery/templates/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:186502697051af9b276bb583-00546873%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '54fa257f80e936f7344f6bcbcccfab669f6900d3' => 
    array (
      0 => '../1.2/shared/controllers/gallery/templates/form.tpl',
      1 => 1370467369,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '186502697051af9b276bb583-00546873',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51af9b277d5565_24852772',
  'variables' => 
  array (
    'gallery' => 0,
    'SCRIPT_NAME' => 0,
    'pictures' => 0,
    'picture' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51af9b277d5565_24852772')) {function content_51af9b277d5565_24852772($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.replace.php';
?><!-- The form for the car catalog type -->
<?php if ($_smarty_tpl->tpl_vars['gallery']->value->getId()!=''){?>
    <form action="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
gallery/update/<?php echo $_smarty_tpl->tpl_vars['gallery']->value->getId();?>
/" method="post" enctype="multipart/form-data">
<?php }else{ ?>
    <form action="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
gallery/save/" method="post" enctype="multipart/form-data">
<?php }?>
    <fieldset>
        <legend>Album toevoegen</legend>
        <div class="controls controls-row">
            <div class="control-group span10">
                <label class="control-label" for="name">Naam</label>
                <div class="controls">
                    <input type="text" id="name" name="name" placeholder="Naam" class="span10" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['gallery']->value->getName(), ENT_QUOTES, 'UTF-8', true);?>
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
    </fieldset>
    <fieldset>
        <legend>Omschrijving</legend>
        <div class="controls controls-row">
            <div class="control-group span10">
                <textarea id="description" rows="5" class="span11" contenteditable="true" name="description" placeholder="Plaats hier uw notitie"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['gallery']->value->getDescription(), ENT_QUOTES, 'UTF-8', true);?>
</textarea>
            </div>
        </div>
    </fieldset>
    <div class="form-actions">
        <input type="submit" value="Opslaan" class="btn btn-primary" onmouseup="showLoading();" />
        <button type="button" onclick="document.location.href='<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
gallery/';" class="btn">Annuleren</button>
    </div>
</form>
<?php if ($_smarty_tpl->tpl_vars['gallery']->value->getId()!=''){?>
    <form action="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
gallery/upload/<?php echo $_smarty_tpl->tpl_vars['gallery']->value->getId();?>
/" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Foto toevoegen</legend>
            <div class="controls controls-row">
                <div class="control-group span10">
                    <label class="control-label" for="picture">Bestand</label>
                    <div class="controls">
                        <input type="file" id="picture" name="picture" placeholder="picture" />
                    </div>
                </div>
            </div>
        </fieldset>
        <div class="form-actions">
            <input type="submit" value="Foto opslaan" class="btn btn-primary" onmouseup="showLoading();" />
        </div>
    </form>
    <?php if ($_smarty_tpl->tpl_vars['pictures']->value!=null){?>
        <fieldset>
            <legend>Foto's</legend>
            <div class="row">
                <?php  $_smarty_tpl->tpl_vars['picture'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['picture']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pictures']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['picture']->key => $_smarty_tpl->tpl_vars['picture']->value){
$_smarty_tpl->tpl_vars['picture']->_loop = true;
?>
                    <div class="span3">
                        <img src="<?php echo @url;?>
<?php echo $_smarty_tpl->tpl_vars['picture']->value->getUrl();?>
" style="max-width: 100%; max-height: 100%;" />
                    </div>
                <?php } ?>
            </div>
        </fieldset>
    <?php }?>
<?php }?>
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