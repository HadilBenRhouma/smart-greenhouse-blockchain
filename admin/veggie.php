<?php
include("../header.php");

?>
<style>
	.product-labels {
		list-style: none;
		margin: 10;
		padding: 20;
		text-align: center;
	}

	.product-labels li {
		display: inline-block;
		background-color: #1ABC9C;
		/* Couleur de fond */
		color: #FFF;
		/* Couleur du texte */
		font-size: 30px;
		padding: 20px 15px;
		margin: 30 5px;
		border-radius: 35px;
	}
</style>

<!-- START MAIN CONTAIN -->
<section class="home-main-contant-style3 col-grid-style bg-white">
	<div class="container">
		<div class="widget">
			<h6 class="text-uppercase bottom-line">Our promotions !</h6>
		</div>
		<div class="row">
			<div class="new-product slider">
				<?php


				$sql6 = "SELECT ID,nam,price,DiscPrice,DiscRate FROM promotions ";


				$result2 = $con->query($sql6);
				if ($result2->num_rows > 0) {
					foreach ($result2 as $row) {
						$ID = $row["ID"];
						$nam = $row["nam"];
						$price = $row["price"];
						$DiscPrice = $row["DiscPrice"];
						$DiscRate = $row["DiscRate"];

						?>
						<div class="col-md-4 item">
							<div class="products grid-product">
								<div class="product-grid-inner">
									<div class="product-grid-img">
										<ul class="product-labels">
											<ul class="product-labels">
												<h5>
													<?= $DiscRate
														?>
												</h5>
											</ul>
											<li>
												<?php date_default_timezone_set("Africa/Tunis");

												$nowDate = date("Y-m-d");

												?>
											</li>
										</ul>
										<img style="width: 335px; height: 190px; "
											src="../img/promotion/<?php echo $nam; ?>.jpg" alt="product-image"
											class="img-responsive" />

									</div>
									<div class="product-grid-caption text-center">
										<h6><a class="p-grid-title">
												<?= $nam ?>
											</a>
										</h6>

										<h4>Original Price:
												<h2 id="price">
													<?= $price ?> TND
												</h2>
					</h4>
										<h4>Discounted Price:
												<h2 id="Disprice">
													<?= $DiscPrice ?> TND
												</h2>
											</h4>
										
									</div>



								</div>


							</div>
						</div>


						<?php
					}
				}


				?>

			</div>
		


			<?php
			include("../footer.php");
			?>