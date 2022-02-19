<!-- header -->
  	<section >
  		<div class="carousel slide">
	        <div class="carousel-inner">
	          <div class="carousel-item active" style="height: 477px;">
	          	<div class="blackblock"></div>
	            <div style="background:url('<?php echo URL::getBase() ?>images/banner1.jpg') no-repeat;" class="backheader"></div>
		            <div class="container">
		              <div class="carousel-caption text-center">
		                <h1>MINISTRAÇÕES</h1>
		                <p>Fique por dentro e não perca nenhuma ministração.</p>
		              </div>
		            </div>
	        	</div>
	        </div>
	    </div>

	</section>
<!--  -->

<?php if (URL::getURL(0) == 'ministracao'): ?>
	<?php 
	if (URL::getURL(1) && URL::getURL(1) != ''){ ?>
		
		<?php 
	}
	else{
		
	}
	?>
<?php endif ?>