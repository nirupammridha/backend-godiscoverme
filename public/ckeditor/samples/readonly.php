<!DOCTYPE html>
<!--
Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.md or http://ckeditor.com/license
-->
<html>
<head>
	<meta charset="utf-8">
	<title>Using the CKEditor Read-Only API &mdash; CKEditor Sample</title>
	<script src="../ckeditor.js"></script>
	<link rel="stylesheet" href="sample.css">
	<script>

		var editor;

		// The instanceReady event is fired, when an instance of CKEditor has finished
		// its initialization.
		CKEDITOR.on( 'instanceReady', function( ev ) {
			editor = ev.editor;

			// Show this "on" button.
			document.getElementById( 'readOnlyOn' ).style.display = '';

			// Event fired when the readOnly property changes.
			editor.on( 'readOnly', function() {
				document.getElementById( 'readOnlyOn' ).style.display = this.readOnly ? 'none' : '';
				document.getElementById( 'readOnlyOff' ).style.display = this.readOnly ? '' : 'none';
			});
		});

		function toggleReadOnly( isReadOnly ) {
			// Change the read-only state of the editor.
			// http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-setReadOnly
			editor.setReadOnly( isReadOnly );
		}

	</script>
</head>
<body>

	
			<textarea class="ckeditor" id="editor1" name="editor1" cols="100" rows="10">&lt;p&gt;This is some &lt;strong&gt;sample text&lt;/strong&gt;. You are using &lt;a href="http://ckeditor.com/"&gt;CKEditor&lt;/a&gt;.&lt;/p&gt;</textarea>
		
	
</body>
</html>
