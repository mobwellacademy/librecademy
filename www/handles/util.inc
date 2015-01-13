<?php
	require_once 'config.inc';

function remscript($html) {
	return preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $var);	
}
?>
