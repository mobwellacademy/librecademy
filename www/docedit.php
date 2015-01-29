
<?php
$loginreq = true;
include_once 'include/header.inc';
?>
<!--<script src="components/webodf/webodf.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
function init() {
	var odfelement = document.getElementById("odf"),
		odfcanvas = new odf.OdfCanvas(odfelement);
	odfcanvas.load("res/pub/files/Documents/chave.odt");
}
window.setTimeout(init, 0);
</script>
-->


	<script src="components/wodotexteditor/wodotexteditor/wodotexteditor.js" type="text/javascript" charset="utf-8"></script>
	<script src="components/wodotexteditor/FileSaver.js" type="text/javascript" charset="utf-8"></script>
	<script src="components/wodotexteditor/localfileeditor.js" type="text/javascript" charset="utf-8"></script> 
<style>
#editorContainer {
	background: #FFF;
	background-image: "";
}
</style>

<div class="container">
	<h1>Documents Online!</h1>
<div id="editorContainer" style="width: 100%;height: 600px;"></div>
</div>



<script>
	createEditor("res/pub/files/Documents/chave.odt");
/*
	Wodo.createTextEditor('editorContainer', {
		allFeaturesEnabled: true,
			userData: {
				fullName: "Tim Lee",
					color:    "blue"
			}
	}, function (err, editor) {
		if (err) {
			// something failed unexpectedly, deal with it (here just a simple alert)
				alert(err);
			return;
		}
		editor.openDocumentFromUrl("res/pub/files/Documents/chave.odt", function(err) {
			if (err) {
			//	something failed unexpectedly, deal with it (here just a simple alert)
					alert("There was an error on opening the document: " + err);
			}
		});
	});
 */

</script>
<?php
	include_once 'include/footer.inc';
?>


