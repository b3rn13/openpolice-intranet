<? /* Image and article buttons needs this in order to work */ ?>
<?= @helper('behavior.modal') ?>

<style src="media://com_editors/css/default.css" />

<? if ($options['toggle']) : ?>
    <style src="media://com_editors/css/form.css" />
    <script src="media://com_editors/js/Fx.Toggle.js" />
<? endif ?>

<script src="media://com_editors/tinymce/tiny_mce<?= KDEBUG ? '_src.js' : '.js' ?>" />
<script src="media://com_editors/js/Editor.js" />

<? if($codemirror) : ?>
<script src="media://com_editors/codemirror/js/codemirror.js" />

<script>	
var quicktagsL10n = 
{
	quickLinks: "(Quick Links)",
	wordLookup: "Enter a word to look up:",
	dictionaryLookup: "Dictionary lookup",
	lookup: "lookup",
	closeAllOpenTags: "Close all open tags",
	closeTags: "close tags",
	enterURL: "Enter the URL",
	enterImageURL: "Enter the URL of the image",
	enterImageDescription: "Enter a description of the image"
};

try { convertEntities(quicktagsL10n);} catch(e) { };
</script>
<? endif ?>
		
<script>

Editor.baseurl = <?= json_encode(JURI::root()); ?>;

new Editor(<?= json_encode($id) ?>, <?= json_encode($options) ?>, <?= json_encode($settings) ?>);</script>