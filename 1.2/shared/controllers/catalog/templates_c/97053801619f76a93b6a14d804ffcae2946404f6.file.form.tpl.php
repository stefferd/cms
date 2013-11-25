<?php /* Smarty version Smarty-3.1.8, created on 2013-11-09 17:43:45
         compiled from "../1.2/shared/controllers/catalog/templates/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:144873106150dcdeec9805f9-41359295%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97053801619f76a93b6a14d804ffcae2946404f6' => 
    array (
      0 => '../1.2/shared/controllers/catalog/templates/form.tpl',
      1 => 1384015422,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '144873106150dcdeec9805f9-41359295',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50dcdeec9d53c1_69866421',
  'variables' => 
  array (
    'catalogitem' => 0,
    'SCRIPT_NAME' => 0,
    'pictures' => 0,
    'picture' => 0,
    'count' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50dcdeec9d53c1_69866421')) {function content_50dcdeec9d53c1_69866421($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.replace.php';
if (!is_callable('smarty_function_imagesize')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/function.imagesize.php';
?><!-- The form for the car catalog type -->
<?php if ($_smarty_tpl->tpl_vars['catalogitem']->value->getId()!=''){?>
    <form action="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
catalog/update/<?php echo $_smarty_tpl->tpl_vars['catalogitem']->value->getId();?>
/" method="post" enctype="multipart/form-data">
<?php }else{ ?>
    <form action="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
catalog/save/" method="post" enctype="multipart/form-data">
<?php }?>
    <fieldset>
        <legend>Item toevoegen</legend>
        <div class="controls controls-row">
            <div class="control-group span10">
                <label class="control-label" for="title">Titel</label>
                <div class="controls">
                    <input type="text" id="title" name="title" placeholder="Titel" class="span10" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['catalogitem']->value->getTitle(), ENT_QUOTES, 'UTF-8', true);?>
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
        <?php if ((defined('use_free_fields')&&@use_free_fields==true)){?>
            <div class="controls controls-row">
                <div class="control-group span5">
                    <label class="control-label" for="free_field_one">Categorie</label>
                    <div class="controls">
                        <select name="free_field_one" id="free_field_one">
                            <option value="schilderij-aquarel" <?php if ($_smarty_tpl->tpl_vars['catalogitem']->value->getFreeFieldOne()=='schilderij-aquarel'){?> selected<?php }?>>Schilderij - Aquarel</option>
                            <option value="schilderij-gemenged" <?php if ($_smarty_tpl->tpl_vars['catalogitem']->value->getFreeFieldOne()=='schilderij-gemenged'){?> selected<?php }?>>Schilderij - Gemenged</option>
                            <option value="schilderij-olieverf" <?php if ($_smarty_tpl->tpl_vars['catalogitem']->value->getFreeFieldOne()=='schilderij-olieverf'){?> selected<?php }?>>Schilderij - Olieverf</option>
                            <option value="beeld" <?php if ($_smarty_tpl->tpl_vars['catalogitem']->value->getFreeFieldOne()=='beeld'){?> selected<?php }?>>Beeld</option>
                            <option value="tekening" <?php if ($_smarty_tpl->tpl_vars['catalogitem']->value->getFreeFieldOne()=='tekening'){?> selected<?php }?>>Tekening</option>
                        </select>
                    </div>
                </div>
                <div class="control-group span5">
                    <label class="control-label" for="free_field_two">Prijs</label>
                    <div class="controls">
                        <input type="text" name="free_field_two" id="free_field_two" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['catalogitem']->value->getFreeFieldTwo(), ENT_QUOTES, 'UTF-8', true);?>
" />
                    </div>
                </div>
            </div>
        <?php }?>
    </fieldset>
    <fieldset>
        <legend>Omschrijving</legend>
        <textarea id="text" name="text" placeholder="Auto omschrijving" style="height: 200px;"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['catalogitem']->value->getText(), ENT_QUOTES, 'UTF-8', true);?>
</textarea>
    </fieldset>
    <?php if ($_smarty_tpl->tpl_vars['catalogitem']->value->getId()!=''){?>
        <fieldset>
            <legend>Foto's</legend>
            <div class="controls controls-row">
                <div class="control-group span5">
                    <label class="control-label" for="pictures">Selecteer uw foto's om toe te voegen</label>
                    <div class="controls">
                        <input type="file" id="pictures" name="pictures[]" multiple class="input-medium" />
                    </div>
                </div>
                <div class="span12">
                    <div clas="row-fluid">
                        <ul class="thumbnails">
                            <?php  $_smarty_tpl->tpl_vars['picture'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['picture']->_loop = false;
 $_smarty_tpl->tpl_vars['count'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['pictures']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['picture']->key => $_smarty_tpl->tpl_vars['picture']->value){
$_smarty_tpl->tpl_vars['picture']->_loop = true;
 $_smarty_tpl->tpl_vars['count']->value = $_smarty_tpl->tpl_vars['picture']->key;
?>
                                <?php if (!strstr($_smarty_tpl->tpl_vars['picture']->value,"cache")){?>
                                    <li id="image<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
" class="span4">
                                        <div class="thumbnail">
                                            <a class="lightbox" href="<?php echo $_smarty_tpl->tpl_vars['picture']->value;?>
">
                                                <?php echo smarty_function_imagesize(array('src'=>$_smarty_tpl->tpl_vars['picture']->value,'width'=>300,'height'=>200),$_smarty_tpl);?>

                                            </a>
                                            <div class="caption">
                                                <button type="button" class="btn btn-danger" data-loading-text="Bezig met verwijderen..." onclick="afbeeldingVerwijderen('<?php echo $_smarty_tpl->tpl_vars['picture']->value;?>
', 'image<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
');">Verwijderen</button>
                                            </div>
                                        </div>
                                    </li>
                                <?php }?>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </fieldset>
    <?php }?>
    <div class="form-actions">
        <input type="submit" value="Opslaan" class="btn btn-primary" onmouseup="showLoading();" />
        <button type="button" onclick="document.location.href='<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
catalog/';" class="btn">Annuleren</button>
    </div>
</form>
<script type="text/javascript">
    function setMainimage(picture, id) {
        $('#mainimage').val(picture);
        $('#' + id).addClass('mainimage');
        $('#' + id).children('.thumbnail').children('.caption').append('<span>Hoofdafbeelding</span>');
    }

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
                '<p>De gegevens samen met de foto\'s worden opgeslagen, een moment geduld aub. Afhankelijk van de grote van de afbeeldingen kan het enige tijd duren...</p>' +
                '</div>' +
                '<div class="modal-footer">' +
                '<a href="#" class="btn">Close</a>' +
                '</div>' +
                '</div>');
    }

    function afbeeldingVerwijderen(url, id) {
        $.post("<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
ajax.php?module=catalog&action=delete-image", { picture: url } , function(data) {
            $('.thumbnails').before('<div class="alert fade in alert-block alert-error" id="' + id + '-alert">'
                    + '<button data-dismiss="alert" class="close" type="button">×</button>'
                    + 'Bezig met verwijderen.'
                    + '</div>');
        }).complete(
                function() {
                    $('#' + id + '-alert').remove();
                    $('.thumbnails').before('<div class="alert fade in">'
                            + '<button data-dismiss="alert" class="close" type="button">×</button>'
                            + 'Afbeelding is verwijderd.'
                            + '</div>');
                    $('#' + id).remove();
                }
        );
    }

    $(document).ready(function() {
        $('a.lightbox').lightBox();
        setTimeout(function() {
            $('#text_ifr').attr('style', 'width: 100%; height: 200px; display: block;');
            $('#text_tbl').attr('style', 'width: 940px; height: 250px;');
        }, 500);
    });
</script><?php }} ?>