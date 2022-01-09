<?php

include 'nftport.php';
if(isset($_POST['submit'])) {
	$response_array = get_nft_details($_POST['contract_address'],$_POST['token_id'],$_POST['chain']);
} //printR($response_array);
?>
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
			<?if($response_array['response']=='OK') {?>
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="card" style="background:#fff;">
						<img src="<?=$response_array['nft']['cached_file_url']?>" class="img-fluid" loading="lazy">
						</div>
					</div>
					<div class="col-md-6">
						<div class="card mb-3">
						  <div class="card-header"><a href="get-contract-nfts?contract_address=<?=$response_array['nft']['contract_address']?>"><?=$response_array['nft']['contract_address']?></a></div>
						  <div class="card-body">
						  	<h2 class="card-text text-center"><?=$response_array['nft']['metadata']['name']?></h2>
						    <p class="card-text"><?=$response_array['nft']['metadata']['description'];?></p>
						    <div class="card-footer"></div>
						  </div>
						</div>
					</div>
				</div>
			</div>
			<?
			//echo 'https://opensea.io/assets/matic/'.$response_array['nft']['contract_address'] . '/' . $response_array['nft']['token_id'];
			?>
			<?} else {?>
				<div class="container col-xxl-8 px-4 py-5 d-none">
				    <div class="row flex-lg align-items-center g-5 py-5">
				      <div class="col-10 col-sm-8 col-lg-6">
				        <img src="<?=$response_array['nft']['cached_file_url']?>" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" loading="lazy">
				      </div>
				      <div class="col-lg-6">
				        <h1 class="display-5 fw-bold lh-1 mb-3"><?=$response_array['nft']['metadata']['name']?></h1>
				        <p class="lead"><?=$response_array['nft']['metadata']['description'];?></p>
				        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
				          <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Primary</button>
				          <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
				        </div>
				      </div>
				    </div>
				  </div>
				<div class="container">
					<div class="p-4 text-center rounded-3 bg-white mt-4 mb-4">
						<h1>Error</h1>
						<p><?=$response_array['detail']?> <?=$response_array['error']?> <?=$response_array['status']?> <?=$response_array['status_message']?></p>
						<p><button class="btn btn-light" onclick="window.history.back();">Go Back</button></p>
					</div>
				</div>
			<?}?>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	</body>
</html>