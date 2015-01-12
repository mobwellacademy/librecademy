<link rel="stylesheet" href="css/post_insert.css" type="text/css">
<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "h4.editable",
    inline: true,
    toolbar: "undo redo",
    menubar: false
});

tinymce.init({
    selector: "div.editable",
    inline: true,
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>

<div >
<h4 class="editable text-muted inserttitle">Insert Title</h4>
<div class="editable insertbody col-md-11">
Write something about it...
</div>
<div class="col-md-1" style="background: blue"></div>
</div>
