	<?php header('Content-Type: text/html; charset=iso-8859-1');?>
	<?php
	$conecta = mysql_connect("localhost", "root", "") or die("Erro ao conectar no MySQL!");
	$banco = mysql_select_db("buscaajax") or die("Erro ao selecionar a DB");
	
	$palavra = $_POST['palavra'];
	
	$sql = "SELECT * FROM pessoas WHERE nome LIKE '%$palavra%'";
	$query = mysql_query($sql);
	$qtd = mysql_num_rows($query);
	?>
	<section class="panel col-lg-9">
	
		<header class="panel-heading">
		<br>
			Dados da busca:
		</header>
		<?php
		if($qtd>0){
		?>
		<table class="table table-striped table-advance table-hover">
			<tbody>
				<tr>
					<th><i class="icon_profile"></i> ID</th>
					<th><i class="icon_profile"></i> Nome</th>
					<th><i class="icon_mail_alt"></i> E-Mail</th>
				</tr>
				<?php
				while($linha = mysql_fetch_assoc($query)){
				?>
				<tr>
					<td><?=$linha['id'];?></td>
					<td><?=$linha['nome'];?></td>
					<td><?=$linha['email'];?></td>
				</tr>
					<?php } ?>
			</tbody>
		</table>
		<?php }else{ ?>
		<div class="alert alert-danger">
		<h4>Sem resultados encontrados para esta palavra.</h4>
		</div>
		<?php }?>
	</section>