<?php

include 'nftport.php';
if(isset($_POST['submit'])) {
	$response_array = upload_file_ipfs($_FILES);
}
//printR($response_array);
/*
{
  "response": "OK",
  "ipfs_url": "https://ipfs.io/ipfs/QmRModSr9gQTSZrbfbLis6mw21HycZyqMA3j8YMRD11nAQ",
  "file_name": "name.jpeg",
  "content_type": "image/jpeg",
  "file_size": 85138,
  "file_size_mb": 0.0812
}
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
					<p class="text-primary">Your IPFS url is <b><?=$response_array['ipfs_url'];?></b></p>
					<p class="text-secondary">Continue to <a href="upload-metadata-ipfs?ipfs_url=<?=urlencode($response_array['ipfs_url']);?>">upload a metadata file</a> to IPFS. (this image will be included)</p>

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