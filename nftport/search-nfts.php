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
			<p>search-nfts</p>
		</div>
	</div>
	<div class="container">
		<form method="POST" action="search-nfts-handle.php" enctype="multipart/form-data">
			<div class="mb-3">
				<label for="text">Search/Text</label>
				<input type="search" name="text" class="form-control" id="text" required>
			</div>
			<div class="mb-3">
				<label for="filter-by-contract-address">Filter by Contract Address</label>
				<input type="text" name="filter_by_contract_address" class="form-control" id="filter-by-contract-address">
			</div>
			<div class="mb-3">
				<label for="chain">Chain</label>
				<select name="chain" class="form-select" id="chain">
					<option value="polygon">Polygon</option>
					<option value="ethereum">Ethereum</option>
					<option value="all">All</option>
				</select>
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
				<label for="order-by">Order by</label>
				<select name="order_by" class="form-select" id="order-by">
					<option value="relevance">Relevance</option>
					<option value="mint_date">Mint Date</option>
				</select>
			</div>
			<div class="mb-3">
				<label for="sort-order">Sort order</label>
				<select name="sort_order" class="form-select" id="sort-order">
					<option value="asc">Ascending</option>
					<option value="desc">Descending</option>
				</select>
			</div>
			<div class="mb-3">
				<input type="submit" name="submit" class="btn btn-success btn-lg form-control" id="submit" value="Submit">
			</div>
		</form>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>