<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>NFTPort.xyz API PHP SDK by rossxdev</title>
</head>
<body>
	<? include 'nav.php'; ?>
	<div class="container">
		<div class="p-4 text-center rounded-3 bg-white mt-4 mb-4">
			<h1><?=$page_title_name?></h1>
			<p>find-duplicate-nfts-token</p>
		</div>
	</div>
	<div class="container">
		<form method="POST" action="find-duplicate-nfts-token-handle.php" enctype="multipart/form-data">
			<div class="mb-3">
				<label>Chain</label><br />
			    <div class="btn-group" id="chains" role="group">
				  <input type="radio" class="btn-check" name="chain" value="polygon" id="chain1" autocomplete="off" checked="checked">
				  <label class="btn btn-outline-primary" for="chain1">Polygon</label>
				  <input type="radio" class="btn-check" name="chain" value="ethereum" id="chain2" autocomplete="off" >
				  <label class="btn btn-outline-primary" for="chain2">Ethereum</label>
				</div>
			</div>
			<div class="mb-3">
				<label for="contract-address">Contract Address</label>
				<input type="text" name="contract_address" class="form-control" id="contract-address" required>
			</div>
			<div class="mb-3">
				<label for="token-id">Token ID</label>
				<input type="number" name="token_id" class="form-control" id="token-id" required>
			</div>
			<div class="mb-3">
				<label for="page-number">Page Number</label>
				<input type="number" name="page_number" class="form-control" id="page-number" min="1" value="1" required>
			</div>
			<div class="mb-3">
				<label for="page-size">Page Size</label>
				<input type="number" name="page_size" class="form-control" id="page-size" min="1" max="50" value="50" required>
			</div>
			<div class="mb-3">
				<div class="row">
				<div class="col-10">
					<label for="threshold">Threshold <small>(<span id="blah">90</span>% match)</small></label>
					<input type="range" name="threshold" class="form-range" id="threshold" min="0.1" max="1.0" value="0.9" step="0.1" oninput="updateTextInput(this.value);" required>
				</div>
				<div class="col-2">
					<input type="text" id="textInput" value="0.9" class="form-control" oninput="updateRangeInput(this.value);" disabled>
				</div>
			</div>
			</div>
			<div class="mb-3">
				<label for="filter-out-contract-address">Filter out Contract Address</label>
				<input type="text" name="filter_out_contract_address" class="form-control" id="filter-out-contract-address" >
			</div>
			<div class="mb-3">
				<input type="submit" name="submit" class="btn btn-primary btn-lg form-control" id="submit" value="Submit">
			</div>
		</form>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<script type="text/javascript">

		function updateTextInput(val) {
          document.getElementById('textInput').value=val; 
          newval = val*100;
          document.getElementById('blah').innerHTML=newval; 
        }

        function updateRangeInput(val) {
          document.getElementById('threshold').value=val; 
          newval = val*100;
          document.getElementById('blah').innerHTML=newval; 
        }

	</script>
</body>
</html>