<script>
	function searchFocus(){
		if(document.sform.stext.value=='Search...'){
			document.sform.stext.value='';
		}
	}
	function searchBlur(){
		if(document.sform.stext.value==''){
			document.sform.stext.value='Search...';
		}
	}
</script>
<!-- search -->
<div id="search" class="col-md-4 col-sm-12 col-xs-12">
    <form method="post" name="sform" action="index.php?page_layout=danhsachtimkiem">
        <input type="submit" name="submit" value="">
        <input onfocus="searchFocus();" onblur="searchBlur();" type="text" name="stext" value="Search...">
    </form>
</div>
<!-- end search -->