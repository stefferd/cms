<?php /* Smarty version Smarty-3.1.8, created on 2012-08-24 14:27:22
         compiled from "../1.2/shared/controllers/profile/templates/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8960350485037732a7e3ae4-68752311%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e027fa34e30bb47a7cd45ed734d3c758d9b39463' => 
    array (
      0 => '../1.2/shared/controllers/profile/templates/form.tpl',
      1 => 1345490930,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8960350485037732a7e3ae4-68752311',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SCRIPT_NAME' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5037732abb1989_18998205',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5037732abb1989_18998205')) {function content_5037732abb1989_18998205($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.replace.php';
if (!is_callable('smarty_function_html_select_date')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/function.html_select_date.php';
?>
<div class="form">
    <form action="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
users/save/" method="post">
        <?php if ($_smarty_tpl->tpl_vars['error']->value!=''){?>
            <?php if ($_smarty_tpl->tpl_vars['error']->value=='user_not_found'){?> De gebruikersnaam en het wachtwoord komen niet overeen, probeer het opnieuw.
            <?php }elseif($_smarty_tpl->tpl_vars['error']->value=='email_invalid'){?> Vul een geldig emailadres in.
            <?php }?>
        <?php }?>
        <div class="field">
            <div class="question"><label for="name">Naam</label></div>
            <div class="answer"><input id="name" name="name" type="text" value="" placeholder="Naam" /></div>
        </div>
        <div class="field">
            <div class="question"><label for="lastname">Achternaam</label></div>
            <div class="answer"><input id="lastname" name="lastname" type="text" value="" placeholder="Achternaam" /></div>
        </div>
        <div class="field">
            <div class="question"><label for="email">E-mailadres</label></div>
            <div class="answer"><input id="email" name="email" type="text" value="" placeholder="E-mailadres" /></div>
        </div>
        <div class="field">
            <div class="question"><label for="password">Password</label></div>
            <div class="answer"><input id="password" name="password" type="password" value="" placeholder="Wachtwoord" /></div>
        </div>
        <div class="field">
            <div class="question"><label>Geboortedatum</label></div>
            <div class="answer"><?php echo smarty_function_html_select_date(array('prefix'=>'birthday','start_year'=>'+1','end_year'=>'1900'),$_smarty_tpl);?>
</div>
        </div>
        <div class="buttons">
            <input type="submit" value="Opslaan" />
        </div>
    </form>
</div><?php }} ?>