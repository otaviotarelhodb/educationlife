<script type="text/javascript" src="js/jcrop.js"></script>
<script type="text/javascript">
$(function(){
	$('#cropbox').Jcrop({
		aspectRatio: 0,
		onSelect: updateCoords
	});
	
	function updateCoords(c){
		$('#x').val(c.x);
		$('#y').val(c.y);
		$('#w').val(c.w);
		$('#h').val(c.h);
	};
});
</script>
<div id="content-crop">
<?php echo"$cid"; ?>
<img src="uploads/usuario/<?php 
	$imagem=DB::getConn()->prepare("SELECT * FROM instituicao WHERE id=?");
	$imagem->execute(array($cid));
	$resultado=$imagem->fetch(PDO::FETCH_ASSOC);
    $imagem_inst=$resultado['imagem'];
echo $imagem_inst; ?>" id="cropbox">
<form name="recorte" method="post" enctype="multipart/form-data" action="php/file.php">
	<input type="hidden" name="imagem" value="<?php echo $imagem_inst;?>"/>
    <input type="hidden" name="y" id="y">
    <input type="hidden" name="x" id="x">
    <input type="hidden" name="w" id="w">
    <input type="hidden" name="h" id="h">
    <input type="submit" value="salvar" name="salvar">   
</form>
</div>