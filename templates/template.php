<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>
<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.maskedinput.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(function($){
   $("#tel").mask("+7 (999) 999-9999",{autoclear: false});
});
</script>
<?if(!empty($arResult["ERROR_MESSAGE"]))
{	?><div class="notice"><?
	foreach($arResult["ERROR_MESSAGE"] as $v)
		ShowError($v);?>

	</div>
	<?
}
if(strlen($arResult["OK_MESSAGE"]) > 0)
{
	?><div class="notice"><?=$arResult["OK_MESSAGE"]?></div><?
}
?>

	<form action="<?=POST_FORM_ACTION_URI?>" method="POST">
<?=bitrix_sessid_post()?>
		<table class="aiStyle form-table">
			<thead>
				<tr>
					<th colspan="2">
						Feedback form
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<div class="form-table__icon">
							<span class="i-auto-edit"></span>
						</div>
					</td>
					<td>
						<div class="form-group">
							<label>
								<?=GetMessage("MFT_NAME")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])):?><span class="required">*</span><?endif?>
							</label>
							<input type="text" name="user_name" value="<?=$arResult["AUTHOR_NAME"]?>" class="form-control">
						</div>
						<div class="form-group">
							<label>
								<?=GetMessage("MFT_TEL")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("TEL", $arParams["REQUIRED_FIELDS"])):?><span class="required">*</span><?endif?>
							</label>
							<input type="text" name="tel" id="tel" value="<?=$arResult["NEW_EXT_FIELDS"]["TEL"]?>" class="form-control">
						</div>
						<div class="form-group">
							<label>
								<?=GetMessage("MFT_EMAIL")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])):?><span class="required">*</span><?endif?>
							</label>
							<input type="text" name="user_email" value="<?=$arResult["AUTHOR_EMAIL"]?>" class="form-control">
						</div>
						<div class="form-group">
							<label>
								<?=GetMessage("MFT_TO")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("TO", $arParams["REQUIRED_FIELDS"])):?><span class="required">*</span><?endif?>
							</label>
							<select name = "to" class="form-control">
							   <option value="" >Make a choice</option>
							   <option value="В бухгалтерию" <?=($arResult["NEW_EXT_FIELDS"]["TO"]=="В бухгалтерию"?'selected':'')?>>To the accounts department</option>
							   <option value="Руководителю" <?=($arResult["NEW_EXT_FIELDS"]["TO"]=="Руководителю"?'selected':'')?>>Head</option>
							</select >
						</div>
						<div class="form-group">
							<label>
								<?=GetMessage("MFT_TOPIC")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("TOPIC", $arParams["REQUIRED_FIELDS"])):?><span class="required">*</span><?endif?>
							</label>
							<input type="text" name="topic" value="<?=$arResult["NEW_EXT_FIELDS"]["TOPIC"]?>" class="form-control">
						</div>
						<div class="form-group">
							<label>
								<?=GetMessage("MFT_MESSAGE")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])):?><span class="required">*</span><?endif?>
							</label>
							<textarea name="MESSAGE" rows="5" cols="40" class="form-control"><?=$arResult["MESSAGE"]?></textarea>
						</div>


						<?if($arParams["USE_CAPTCHA"] == "Y"):?>
							<div class="form-group">
								<label>
									<?=GetMessage("MFT_CAPTCHA")?>
								</label>
								<input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
								<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180" height="40" alt="CAPTCHA" class="form-control">
							</div>
							<div class="form-group">
								<label>
									<?=GetMessage("MFT_CAPTCHA_CODE")?><span class="required">*</span>
								</label>
								<input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
								<input type="text" name="captcha_word" size="30" maxlength="50" value="" class="form-control">
							</div>


						<?endif;?>


					</td>
				</tr>
			</tbody>


		</table>

		<div class="form-bottom-contol">
			<input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
			<button type="submit" name="submit" value="<?=GetMessage("MFT_SUBMIT")?>" class="form-bottom-contol__ok"><?=GetMessage("MFT_SUBMIT")?></button>
		</div>

</form>
