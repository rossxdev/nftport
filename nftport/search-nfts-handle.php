<?php

include 'nftport.php';
if($_POST['submit'] == 'Submit') {
	$response_array = search_nfts($_POST['text'],$_POST['chain'],$_POST['filter_by_contract_address'],$_POST['order_by'],$_POST['page_number'],$_POST['page_size'],$_POST['sort_order']);
}
//printR($response_array);
/*
[chain] => polygon
[contract_address] => 0x47c7ff137d7a6644a9a96f1d44f5a6f857d9023f
[token_id] => 9303
[cached_file_url] => https://storage.googleapis.com/sentinel-nft/raw-assets/c_0x47c7ff137d7a6644a9a96f1d44f5a6f857d9023f_t_9303_raw_asset.jpeg
[name] => Lemonade+test
[description] => test
[mint_date] => 
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
				<h1><?=$page_title_name?></h1>
				<p>search-nfts response</p>
			</div>
			<div class="container">
				<div id="search-container" class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-3">
					<?
				    foreach($response_array['search_results'] as $nft_array) {
				      $token_address = $nft_array['contract_address'];
				      $token_id = $nft_array['token_id'];
				      $image = $nft_array['cached_file_url'];
				      $name = $nft_array['name'];
				      $description = $nft_array['description'];
				      ?>
				      <div class="col">
				        <div class="card shadow-sm">
				          <img class="card-img-top" style="max-height:350px;object-fit:cover;" src="<?=$image?>" loading="lazy">

				          <div class="card-body">
				            <p class="card-text"><?=$name?></p>
				            <div class="d-flex justify-content-between align-items-center">
				              <div class="btn-group">
				                <a target="_blank" href="get-nft-details?contract_address=<?=$token_address?>&token_id=<?=$token_id?>&chain=<?=$_POST['chain']?>" type="button" class="btn btn-sm btn-outline-secondary">NFT</a>

						<a target="_blank" href="get-contract-nfts?contract_address=<?=$token_address?>&chain=<?=$_POST['chain']?>" type="button" class="btn btn-sm btn-outline-secondary">Contract</a>
				              </div>
				              <small class="text-muted">9 mins</small>
				            </div>
				          </div>
				        </div>
				      </div>

						
					<?}?>
				</div>
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
	    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
        
        
        <script type="text/javascript">

    </script>
	</body>
</html>