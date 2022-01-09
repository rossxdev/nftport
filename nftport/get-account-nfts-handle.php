<?php

include 'nftport.php';
if($_POST['submit'] == 'Submit') {
	// nftport
	$response_array = get_account_nfts($_POST['account_address'],$_POST['chain'],'metadata',$_POST['page_number'],$_POST['page_size']);
}

//printR($response_array);exit;
/*
$response_array['response'];
$response_array['chain'];
$response_array['contract_address'];
$response_array['transaction_hash'];
$response_array['transaction_external_url'];
$response_array['mint_to_address'];
$response_array['name'];
$response_array['description'];
*/
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
	<?include 'nav.php'; ?>
	<?if($response_array['response']=='OK') {?>
		<div class="container">
			<div class="p-4 text-center rounded-3 bg-white mt-4 mb-4">
				<h1><?=$_POST['account_address']?></h1>
				<p></p>
			</div>
			<div class="row">
			<?foreach($response_array['nfts'] as $result_num=>$nft) {
				if($nft['cached_file_url']=='') {continue;}?>
				<div class="col-3">
					<div class="card shadow-md mt-3">
						<img src="<?=$nft['cached_file_url']?>" loading="lazy"/>
						<div class="card-body">
							<p class="card-text" style="font-weight:bold;"><?=$nft['metadata']['name']?></p>
							<p class="card-text"><?=$name?></p>
							<div class="d-flex justify-content-between align-items-center">
								<div class="btn-group">
								<a href="get-nft-details?contract_address=<?=$nft['contract_address']?>&token_id=<?=$nft['token_id']?>&chain=<?=$nft['chain']?>" type="button" class="btn  btn-primary">View Details</a>
								<?if($nft['external_url'] !=''){?>
								<a href="<?=$nft['metadata']['external_url']?>" target="_blank" type="button" class="btn btn-sm btn-primary">External URL</a><?}?>
							</div>
							</div>
						</div>
					</div>
				</div>
			<?}?>
			</div>
		</div>
	<?} else {?>
		<div class="container">
			<div class="p-4 text-center rounded-3 bg-white mt-4 mb-4">
				<h1>Error</h1>
				<p><?=$response_array['detail']?> <?=$response_array['error']?></p>
				<p><button class="btn btn-light" onclick="window.history.back();">Go Back</button></p>
			</div>
		</div>
	<?}?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	</body>
</html>