<?php

include 'nftport.php';
if($_POST['submit'] == 'Submit') {
	$response_array = get_my_nfts($_POST['chain'],$_POST['page_number'],$_POST['page_size']);
}
//printR($_POST);
//printR($response_array);exit;
/*
    {
      "chain": "polygon",
      "transaction_hash": "0x124141or0f10140112381381dd",
      "contract_name": "My NFTPort contract",
      "contract_address": "0xb47e3cd837ddf8e4c57f05d70ab865de6e193bbb",
      "token_id": "6473",
      "mint_to_address": "0xc155f9bd6b71e9f71d0236b689ad7c2c5d16febf",
      "metadata_uri": "ipfs://QmTz7dGHvXghNuh3V64QBwHPXva4chpMR7frpfxCaxvhd4",
      "metadata_frozen": true,
      "mint_date": "2021-08-23T17:25:03.501703"
    }

    //https://ipfs.io/ipfs/QmRModSr9gQTSZrb
    //
    $metadata_url = str_replace("ipfs://","https://ipfs.io/ipfs/",$response_array['metadata_uri']);

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
				<h1>Your minted NFTs</h1>
				<p>You have minted <b><?=$response_array['total']?></b> NFTs</p>
			</div>
			<div class="container"">
				<div class="table-responsive" style="max-height:300px;">
				<table class="table table-striped table-responsive">
			        <thead>
			          <tr>
			            <th>chain</th>
			            <th>transaction_hash</th>
			            <th>contract_address</th>
			            <th>contract_name</th>
			            <th>token_id</th>
			            <th>mint_to_address</th>
			            <th>metadata_uri</th>
			            <th>metadata_frozen</th>
			            <th>mint_date</th>
			          </tr>
			        </thead>
			        <tbody>
					<?
				    foreach($response_array['minted_nfts'] as $nft_array) {
						$chain=$nft_array['chain'];
						$transaction_hash=$nft_array['transaction_hash'];
						$contract_address = $nft_array['contract_address'];
						$contract_name = $nft_array['contract_name'];
						$token_id = $nft_array['token_id'];
						$mint_to_address = $nft_array['mint_to_address'];
						$metadata_uri = $nft_array['metadata_uri'];
						$metadata_frozen = $nft_array['metadata_frozen'];
						$mint_date = $nft_array['mint_date'];
						//
						$metadata_url = str_replace("ipfs://","https://ipfs.io/ipfs/",$metadata_uri);
				      ?>
				          <tr>
				            <th><?=$nft_array['chain']?></th>
				            <td><?=$nft_array['transaction_hash']?></td>
				            <td><?=$nft_array['contract_address']?></td>
				            <td><?=$nft_array['contract_name']?></td>
				            <td><?=$nft_array['token_id']?></td>
				            <td><?=$nft_array['mint_to_address']?></td>
				            <td><?=$nft_array['metadata_uri']?></td>
				            <td><?=$nft_array['metadata_frozen']?></td>
				            <td><?=$nft_array['mint_date']?></td>
				          </tr>


					<?}?>
					</tbody>
				</table>
				</div>
			</div>
		</div>
	<?} else {?>
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