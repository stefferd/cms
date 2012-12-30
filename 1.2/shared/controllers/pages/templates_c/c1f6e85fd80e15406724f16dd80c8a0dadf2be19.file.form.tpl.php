<?php /* Smarty version Smarty-3.1.8, created on 2012-08-22 22:39:28
         compiled from "../1.2/shared/controllers/pages/templates/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1042390225025679f9eb852-00409117%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1f6e85fd80e15406724f16dd80c8a0dadf2be19' => 
    array (
      0 => '../1.2/shared/controllers/pages/templates/form.tpl',
      1 => 1345667963,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1042390225025679f9eb852-00409117',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5025679fa377d0_96893102',
  'variables' => 
  array (
    'SCRIPT_NAME' => 0,
    'error' => 0,
    'possibleParents' => 0,
    'parent' => 0,
    'pages' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5025679fa377d0_96893102')) {function content_5025679fa377d0_96893102($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.replace.php';
?>
<div class="form">
    <form action="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
pages/save/" method="post">
    <?php if ($_smarty_tpl->tpl_vars['error']->value!=''){?>
        <?php if ($_smarty_tpl->tpl_vars['error']->value=='user_not_found'){?> De gebruikersnaam en het wachtwoord komen niet overeen, probeer het opnieuw.
            <?php }elseif($_smarty_tpl->tpl_vars['error']->value=='email_invalid'){?> Vul een geldig emailadres in.
        <?php }?>
    <?php }?>
        <div class="blocks pageform">
            <div class="block">
                <div class="field">
                    <div class="question"><label for="title">Titel</label></div>
                    <div class="answer"><input id="title" name="title" type="text" value="" placeholder="Titel" /></div>
                </div>
                <div class="field">
                    <div class="question"><label for="parent">Koppelen onder pagina</label></div>
                    <div class="answer">
                        <select name="parent" id="parent">
                            <option value="0">Niet koppelen</option>
                        <?php  $_smarty_tpl->tpl_vars['parent'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['parent']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['possibleParents']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['parent']->key => $_smarty_tpl->tpl_vars['parent']->value){
$_smarty_tpl->tpl_vars['parent']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['parent']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['parent']->value['value'];?>
</option>
                        <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="field">
                    <div class="question"><label for="active">Actief</label></div>
                    <div class="answer"><input id="active" name="active" type="checkbox" checked="checked" /></div>
                </div>
                <div class="field memo">
                    <div class="question"><label for="tinymce">Tekst</label></div>
                    <div class="answer"><textarea id="tinymce" name="text" placeholder="Tekstuele inhoud"><h1>Titel</h1><p>Tekstuele inhoud van de pagina</p></textarea></div>
                </div>
                <div class="buttons">
                    <input type="submit" value="Opslaan" />
                </div>
                <div class="block closed">
                    <div class="header">SEO optimalisatie</div>
                    <div class="field">
                        <div class="question"><label for="metatitle">Meta titel</label></div>
                        <div class="answer"><input id="metatitle" name="metatitle" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pages']->value->getMetatitle(), ENT_QUOTES, 'UTF-8', true);?>
" maxlength="160" placeholder="Titel van de pagina voor de zoekmachines, max 160 karakters" /></div>
                    </div>
                    <div class="field">
                        <div class="question"><label for="metadescription">Meta omschrijving</label></div>
                        <div class="answer"><textarea id="metadescription" name="metadescription" placeholder="Omschrijving van de pagina voor de zoekmachines, max 320 karakters"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pages']->value->getMetadescription(), ENT_QUOTES, 'UTF-8', true);?>
</textarea></div>
                    </div>
                    <div class="field">
                        <div class="question"><label for="keywords">Trefwoorden (keywords)</label></div>
                        <div class="answer"><textarea id="keywords" name="keywords" placeholder="Zoekwoord suggesties voor de zoekmachines, max 20 suggesties" ><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pages']->value->getKeywords(), ENT_QUOTES, 'UTF-8', true);?>
</textarea></div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div><?php }} ?>