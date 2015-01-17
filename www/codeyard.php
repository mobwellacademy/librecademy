<?php
	$codeyard='active';
	$loginreq = true;
	include_once 'include/header.inc';
?>
 <style type="text/css" media="screen">
 #editor {
	height: 800px;
 }
 </style>
<div class="container">
	<h1>Code Yard</h1>
<pre id="editor">function foo(items) {
    var i;
    for (i = 0; i &lt; items.length; i++) {
        alert("Ace Rocks " + items[i]);
    }
}</pre>
</div>

<script src="components/ace-builds/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
<script>
	var editor = ace.edit("editor");
	editor.setTheme("ace/theme/chrome");
	editor.getSession().setMode("ace/mode/java");
</script>
<?php
	include_once 'include/footer.inc';
?>


