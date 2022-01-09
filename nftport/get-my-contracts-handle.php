<?php

include 'nftport.php';
if($_POST['submit'] == 'Submit') {
	$response_array = get_my_nft_contracts();
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
				<h1>Your NFT Contracts</h1>
				<p>You have <b><?=count($response_array['contracts'])?></b> Contracts</p>
			</div>
			<div class="container bg-white p-4 rounded-3 mt-4 mb-4">
				<div class="table-responsive">
				<table class="table table-bordered">
			        <thead>
			          <tr>
			            <th>symbol</th>
			            <th>name</th>
			            
			            <th>transaction_hash</th>
			            <th>chain</th>
			            <th>address</th>
			            <th>creation_date</th>
			            <th>metadata_frozen</th>
			          </tr>
			        </thead>
			        <tbody>
					<?
				    foreach($response_array['contracts'] as $num=>$contract_details) {
						$name=$contract_details['name'];
						$symbol=$contract_details['symbol'];
						$transaction_hash = $contract_details['transaction_hash'];
						$chain = $contract_details['chain'];
						$address = $contract_details['address'];
						$creation_date = $contract_details['creation_date'];
						$metadata_frozen = $contract_details['metadata_frozen'];
						//
						$metadata_url = str_replace("ipfs://","https://ipfs.io/ipfs/",$metadata_uri);
				      ?>
				          <tr>
				          	<th><?=$contract_details['symbol']?></th>
				            <td><?=$contract_details['name']?></td>
				            
				            <td><?=$contract_details['transaction_hash']?></td>
				            <td><?=$contract_details['chain']?></td>
				            <td><?=$contract_details['address']?></td>
				            <td><?=$contract_details['creation_date']?></td>
				            <td><?if($contract_details['metadata_frozen']==true){echo '<i class="bi-lock text-dark"></i>';}?><?if($contract_details['metadata_frozen']==false){echo '<i class="bi-unlock text-success"></i>';}?></td>
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