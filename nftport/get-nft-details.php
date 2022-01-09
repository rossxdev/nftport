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
			<p>get-nft-details</p>
		</div>
	</div>
	<div class="container">
			<form method="POST" action="get-nft-details-handle.php" enctype="multipart/form-data">
				<div class="row">
					<div class="mb-3">
		            	<label for="" class="form-label">Chain</label><br />
                          <div class="btn-group" role="group">
              			  <input type="radio" class="btn-check" name="chain" value="polygon" id="chain1" autocomplete="off" checked="checked">
              			  <label class="btn btn-outline-primary" for="chain1">Polygon</label>
              			  <input type="radio" class="btn-check" name="chain" value="ethereum" id="chain2" autocomplete="off" >
              			  <label class="btn btn-outline-primary" for="chain2">Ethereum</label>
              			</div>
		            </div>
					<div class="mb-3">
		              <label for="contract_address" class="form-label">NFT Contract address</label>
		              <input type="text" name="contract_address" class="form-control" id="contract_address" value="<?=$_GET['contract_address']?>">
		            </div>
		            <div class="mb-3">
		              <label for="token_id" class="form-label">NFT Token id</label>
		              <input type="text" name="token_id" class="form-control" id="token_id" value="<?=$_GET['token_id']?>">
		            </div>
		            
	                <div class="mb-3">
	                	<label></label>
		              <input type="submit" name="submit" class="btn btn-success btn-lg form-control" id="submit" value="Submit">
		            </div>
		        </div>
			</form>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	</body>
</html>