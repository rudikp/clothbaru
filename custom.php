<?php include 'header.php'; ?>
<?php
  $result_pertanyaan = mysql_query ("SELECT * FROM pertanyaan ORDER BY id_tanya");
  $total_pertanyaan = mysql_num_rows($result_pertanyaan);
?>

<div class="jumbotron">
  	<div class="container">
		<H2>Question</h2>
			
		<ul class="pager">
		  	<li class="previous"><a href="#" class="disabled" id="prev">&larr; Previous Question</a></li>
		  	<li class="next"><a href="#" id="next">Next Question &rarr;</a></li>
		</ul>
		
		<form method="post" action="proses.php">

			<div class="cycle-slideshow" id="slide-pertanyaan" data-cycle-loop="0" data-cycle-fx="scrollHorz" data-cycle-allow-wrap="false" data-cycle-auto-height="container" data-cycle-timeout="0" data-cycle-slides="> div">
		  		<?php $slide_index = 0; ?>
		  		<?php while ($row = mysql_fetch_array($result_pertanyaan)) { ?>
		  		<?php $slide_index++; ?>
		  		<div class="question-item">
					<!-- Pertanyaan Pertama -->
			 		<h3><?php echo $row['pertanyaan'] ?></h3>

			 		<?php
			 			$id_pertanyaan = $row['id_tanya'];
			 			$result_jawaban = mysql_query ("SELECT * FROM pertanyaan_jawaban WHERE id_tanya='$id_pertanyaan'");
			 		?>

			 		<fieldset id="jawaban-pertanyaan-<?php echo $slide_index; ?>">
				 		<?php while ($row2 = mysql_fetch_array($result_jawaban)) { ?>

						<div class="radio">
					  		<label>
								<input type="radio" name="jawaban[<?php echo $id_pertanyaan; ?>]" value="<?php echo $row2['jawaban']; ?>" required>
								<?php echo $row2['jawaban']; ?>
					  		</label>
						</div>

						<?php } // Endwhile Jawaban ?>
					</fieldset>

			  		<?php if ( --$total_pertanyaan=== 0 ) { // If it the last pertanyaan ?>

			  		<button type="submit" class="btn btn-success btn-large pull-right">Get your result</button>

			  		<? } ?>

		  		</div>

	   			<?php } // Endwhile Pertanyaan ?>

	   			<div id="total-slide" data-value="<?php echo $slide_index; ?>">

		  	</div>
	  	
	  	</form>

  	</div>
</div>
</div>
<?php include 'footer.php'; ?>
