<style>
	.h5 {
		color: white;
	}
</style>
<?php include("../header.php");
if (isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"] == false) {
	?>
	<script>
		alert("Please login first...");
		location.href = "<?= $_SESSION["directory"] ?>login.php";
	</script>
	<?php
}
?>



<?php
if (isset($_POST["submit"])) {
	$userID = $_SESSION["userid"];
	$from = $_POST["payment"];
	$account = $_POST["account"];
	$amount = $_POST["amount"];
	
	$sql = "INSERT INTO `deposit` (`userID`, `paymentFrom`, `account`, `amount`, `role`) 
	VALUES ('$userID','$from','$account','$amount',0)";
						
	if ($con->query($sql)) {
		$msg = "Deposit information successfully submitted";
	} else {
		$msg = "Database error";
	}

}



?>



<div class="container">
	<div>
		<?php if (isset($msg)) { ?>
			<div class="alert alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
						aria-hidden="true">&times;</span></button>
				<strong>
					<?= $msg ?>
				</strong>
			</div>
			<script>
				window.setTimeout(function () {
					$(".alert").fadeTo(500, 0).slideUp(500, function () {
						$(this).remove();
					});
				}, 8000);
			</script>

			<?php

		}

		?>
	</div>
	<table>
		<tr>
			<td width="20%">
				<div class="row">
					<div>

						<h5>Payment information</h5>
						<form class="form-horizontal" action="" method="post">
							<div class="form-group">
								<label class="control-label col-sm-3" for="payment">Payment from: </label>
								<div class="col-sm-4">
									<select name="payment" id="payment" class="form-control" style="font-size: 14px; width: 400px; height: 40px;">
										<option value="DBBL">SBI</option>
										<option value="DBBL online banking">HDFC</option>
										<option value="NexusPay">ICICI</option>
										<option value="Other">Other</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="acc">Account No:</label>
								<div class="col-sm-4">
									<input type="number" class="form-control" id="acc"
										placeholder="Enter your account number" name="account" style="font-size: 14px; width: 400px; height: 40px;">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="amount">Amount:</label>
								<div class="col-sm-4">
									<input type="number" class="form-control" id="amount"
										placeholder="Enter total amount (INR)" name="amount" style="font-size: 14px; width: 400px; height: 40px;">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-10">
									<button type="submit" class="btn btn-info" name="submit">Submit</button>
								</div>
							</div>
						</form>

			</td>
			<td width="60%">

				<div style="text-align:center;">
					<?php
					if (isset($_SESSION['total'])) {
						echo 'Total to pay: ' . $_SESSION['total'].' TND'; ?>
						</br>
						
					
						

						<a href="#" id="clearCart"><button>Empty Cart</button></a>
					</div>
					<script>
						// Récupérer le lien "Vider Panier"
						var clearCartLink = document.querySelector('#clearCart');

						// Ajouter un écouteur d'événement pour le clic sur le lien "Vider Panier"
						clearCartLink.addEventListener('click', function () {
							// Envoyer une requête AJAX à la page PHP pour mettre à jour la session
							var xhr = new XMLHttpRequest();
							xhr.open('POST', '../clear_cart.php');
							xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
							xhr.onload = function () {
								// Rediriger l'utilisateur vers la page d'accueil
								window.location.href = '../index.php';
							};
							xhr.send();
						});
					</script>


					<?php
					} else {
						echo 'Total = 0 TND';
					}
					?>



			</td>
			<td width="20%">
				<script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
				<lord-icon src="https://cdn.lordicon.com/cllunfud.json" trigger="hover"
					colors="outline:#121331,primary:#646e78,secondary:#ebe6ef" stroke="100"
					style="width:250px;height:250px">
				</lord-icon>


			</td>
		</tr>
	</table>
</div>
</div>
</div>










<!-- Footer Section -->
<?php

include("../footer.php");
?>
<!-- Footer Section /- -->