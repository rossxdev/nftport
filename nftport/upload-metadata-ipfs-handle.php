<?php

include 'nftport.php';
if(isset($_POST['submit'])) {
	$response_array = upload_metadata_ipfs($_POST);
}
//printR($response_array);
/*

[response] => OK
[metadata_uri] => ipfs://QmSxHhXvtmsix8qBgtDSHcpQ5bmaUvwi26VpCYrVxkKi5S
[name] => sadff
[description] => adsf
[file_url] => https://ipfs.io/ipfs/QmdWL18Juwm995WThojaTgivQ8FRCfzxk5WboKVt2a5Lzq
[external_url] => 
[animation_url] => 
[custom_fields] => Array
(
    [key] => second
    [value] => me
)

[attributes] => Array
(
    [0] => Array
        (
            [trait_type] => happiness
            [value] => 10
            [max_value] => 10
            [display_type] => boost_number
        )

)

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
					<h2>Your File has been uploaded</h2>
					<p>Your metadata uri is <?=$response_array['metadata_uri'];?></p>
					<p><a href="mint-custom?metadata_uri=<?=urlencode($response_array['metadata_uri'])?>">Mint NFT</a> with this metadata</p>
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