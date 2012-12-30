<?php /* Smarty version Smarty-3.1.8, created on 2012-09-02 12:33:56
         compiled from "../1.2/shared/controllers/profile/templates/edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:120292493750433614480b01-15228116%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b01cc6291de6e81fa7aa79a8d8058c3de2538df8' => 
    array (
      0 => '../1.2/shared/controllers/profile/templates/edit.tpl',
      1 => 1345490930,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '120292493750433614480b01-15228116',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SCRIPT_NAME' => 0,
    'profile' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_504336146364e8_80548574',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_504336146364e8_80548574')) {function content_504336146364e8_80548574($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.replace.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.date_format.php';
?>
<div class="form">
    <form action="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
users/update/<?php echo $_smarty_tpl->tpl_vars['profile']->value->getId();?>
/" method="post">
        <?php if ($_smarty_tpl->tpl_vars['error']->value!=''){?>
            <?php if ($_smarty_tpl->tpl_vars['error']->value=='user_not_found'){?> De gebruikersnaam en het wachtwoord komen niet overeen, probeer het opnieuw.
            <?php }elseif($_smarty_tpl->tpl_vars['error']->value=='email_invalid'){?> Vul een geldig emailadres in.
            <?php }?>
        <?php }?>
        <div class="field">
            <div class="question"><label for="name">Naam</label></div>
            <div class="answer"><input id="name" name="name" type="text" value="<?php echo $_smarty_tpl->tpl_vars['profile']->value->getName();?>
" placeholder="Naam" /></div>
        </div>
        <div class="field">
            <div class="question"><label for="lastname">Achternaam</label></div>
            <div class="answer"><input id="lastname" name="lastname" type="text" value="<?php echo $_smarty_tpl->tpl_vars['profile']->value->getLastname();?>
" placeholder="Achternaam" /></div>
        </div>
        <div class="field">
            <div class="question"><label for="email">E-mailadres</label></div>
            <div class="answer"><input id="email" name="email" type="text" value="<?php echo $_smarty_tpl->tpl_vars['profile']->value->getEmailaddress();?>
" placeholder="E-mailadres" /></div>
        </div>
        <div class="field">
            <div class="question"><label>Geboortedatum</label></div>
            <div class="answer"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['profile']->value->getBirthday(),"%d-%m-%Y");?>
</div>
        </div>
        <div class="buttons">
            <input type="submit" value="Opslaan" />
        </div>
    </form>
</div><?php }} ?>