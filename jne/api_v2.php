<?php 
$params = file_get_contents("php://input");
$params = json_decode($params,true);
$dataBind = "data-bind=\"
	value: value,
	valueUpdate: 'keyup',
	hasFocus: focused,
	attr: {
		name: inputName,
		placeholder: placeholder,
		'aria-describedby': getDescriptionId(),
		'aria-required': required,
		'aria-invalid': error() ? true : 'false',
		id: uid,
		disabled: disabled
	}\"";
if($params["country"] != 'ID'){
	$id = $params["id"];
	$html = '<input class="input-text" type="text" '.$dataBind.' name="city" aria-required="true" aria-invalid="false" id="'.$id.'">';
	print json_encode(array("component" => $html));
}
else{
	$id = $params["id"];
	$html = "<select id='{$id}' {$dataBind} name='city'><option value='denpasar'>Denpasar</option><option value='jakarta'>Jakarta</option></select>";
	print json_encode(array("component" => $html));
}