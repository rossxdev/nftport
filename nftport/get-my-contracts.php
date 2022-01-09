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
			<p>get-my-contracts</p>
		</div>
	</div>
	<div class="container">
		<form method="POST" action="get-my-contracts-handle.php" enctype="multipart/form-data">
			<div class="mb-3">
				<input type="submit" name="submit" class="btn btn-success btn-lg form-control" id="submit" value="Submit">
			</div>
		</form>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	</body>
</html>