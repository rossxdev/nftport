<?
if($_GET['ipfs_url']) {
	$ipfs_url = urldecode($_GET['ipfs_url']);
}
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
	<div class="container">
		<div class="p-4 text-center rounded-3 bg-white mt-4 mb-4">
			<h1><?=$page_title_name?></h1>
			<p>upload-metadata-ipfs</p>
		</div>
	</div>
	<div class="container">
		<form method="POST" action="upload-metadata-ipfs-handle.php" enctype="multipart/form-data">
			
			<div class="mb-3">
				<label for="name">Name<span class="text-danger">*</span></label>
				<input type="text" name="name" class="form-control" id="name" required>
			</div>
			<div class="mb-3">
				<label for="description">Description<span class="text-danger">*</span></label>
				<textarea name="description" class="form-control" id="description" rows="3" required></textarea>
			</div>
			<div class="mb-3">
				<label for="file-url">File URL<span class="text-danger">*</span></label>
				<input type="url" name="file_url" class="form-control" id="file-url" value="<?=$ipfs_url?>" required>
			</div>
			<div class="mb-3">
				<label for="external-url">External URL</label>
				<input type="url" name="external_url" class="form-control" id="external-url">
			</div>
			<div class="mb-3">
				<label for="animation-url">Animation URL</label>
				<input type="url" name="animation_url" class="form-control" id="animation-url">
			</div>
		
			<div class="mb-3">
				<!-- ajax get with num increase -->
				<label>Attributes</label>

				<div class="row">
					<div class="col-3"><label class="text-info">Trait type</label>
						<input type="text" class="form-control" name="attributes[0][trait_type]"/>
					</div>
					<div class="col-3"><label class="text-info">Trait value</label>
						<input type="text" class="form-control" name="attributes[0][value]"/>
					</div>
					<div class="col-3"><label class="text-info">Max value</label>
						<input type="text" class="form-control" name="attributes[0][max_value]"/>
					</div>
					<div class="col-3"><label class="text-info">Display</label>
						<select class="form-select" name="attributes[0][display_type]" id="display_type">
							<option value="">Text/Default</option>
							<option value="boost_number">Boost Number</option>
							<option value="boost_percentage">Boost Percentage</option>
							<option value="number">Number</option>
							<option value="date">Date</option>
						</select>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-3">
						<input type="text" class="form-control" name="attributes[1][trait_type]"/>
					</div>
					<div class="col-3">
						<input type="text" class="form-control" name="attributes[1][value]"/>
					</div>
					<div class="col-3">
						<input type="text" class="form-control" name="attributes[1][max_value]"/>
					</div>
					<div class="col-3">
						<select class="form-select" name="attributes[1][display_type]" id="display_type">
							<option value="">Text/Default</option>
							<option value="boost_number">Boost Number</option>
							<option value="boost_percentage">Boost Percentage</option>
							<option value="number">Number</option>
							<option value="date">Date</option>
						</select>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-3">
						<input type="text" class="form-control" name="attributes[2][trait_type]"/>
					</div>
					<div class="col-3">
						<input type="text" class="form-control" name="attributes[2][value]"/>
					</div>
					<div class="col-3">
						<input type="text" class="form-control" name="attributes[2][max_value]"/>
					</div>
					<div class="col-3">
						<select class="form-select" name="attributes[2][display_type]" id="display_type">
							<option value="">Text/Default</option>
							<option value="boost_number">Boost Number</option>
							<option value="boost_percentage">Boost Percentage</option>
							<option value="number">Number</option>
							<option value="date">Date</option>
						</select>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-3">
						<input type="text" class="form-control" name="attributes[3][trait_type]"/>
					</div>
					<div class="col-3">
						<input type="text" class="form-control" name="attributes[3][value]"/>
					</div>
					<div class="col-3">
						<input type="text" class="form-control" name="attributes[3][max_value]"/>
					</div>
					<div class="col-3">
						<select class="form-select" name="attributes[3][display_type]" id="display_type">
							<option value="">Text/Default</option>
							<option value="boost_number">Boost Number</option>
							<option value="boost_percentage">Boost Percentage</option>
							<option value="number">Number</option>
							<option value="date">Date</option>
						</select>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-3">
						<input type="text" class="form-control" name="attributes[4][trait_type]"/>
					</div>
					<div class="col-3">
						<input type="text" class="form-control" name="attributes[4][value]"/>
					</div>
					<div class="col-3">
						<input type="text" class="form-control" name="attributes[4][max_value]"/>
					</div>
					<div class="col-3">
						<select class="form-select" name="attributes[4][display_type]" id="display_type">
							<option value="">Text/Default</option>
							<option value="boost_number">Boost Number</option>
							<option value="boost_percentage">Boost Percentage</option>
							<option value="number">Number</option>
							<option value="date">Date</option>
						</select>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-3">
						<input type="text" class="form-control" name="attributes[5][trait_type]"/>
					</div>
					<div class="col-3">
						<input type="text" class="form-control" name="attributes[5][value]"/>
					</div>
					<div class="col-3">
						<input type="text" class="form-control" name="attributes[5][max_value]"/>
					</div>
					<div class="col-3">
						<select class="form-select" name="attributes[5][display_type]" id="display_type">
							<option value="">Text/Default</option>
							<option value="boost_number">Boost Number</option>
							<option value="boost_percentage">Boost Percentage</option>
							<option value="number">Number</option>
							<option value="date">Date</option>
						</select>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-3">
						<input type="text" class="form-control" name="attributes[6][trait_type]"/>
					</div>
					<div class="col-3">
						<input type="text" class="form-control" name="attributes[6][value]"/>
					</div>
					<div class="col-3">
						<input type="text" class="form-control" name="attributes[6][max_value]"/>
					</div>
					<div class="col-3">
						<select class="form-select" name="attributes[6][display_type]" id="display_type">
							<option value="">Text/Default</option>
							<option value="boost_number">Boost Number</option>
							<option value="boost_percentage">Boost Percentage</option>
							<option value="number">Number</option>
							<option value="date">Date</option>
						</select>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-3">
						<input type="text" class="form-control" name="attributes[7][trait_type]"/>
					</div>
					<div class="col-3">
						<input type="text" class="form-control" name="attributes[7][value]"/>
					</div>
					<div class="col-3">
						<input type="text" class="form-control" name="attributes[7][max_value]"/>
					</div>
					<div class="col-3">
						<select class="form-select" name="attributes[7][display_type]" id="display_type">
							<option value="">Text/Default</option>
							<option value="boost_number">Boost Number</option>
							<option value="boost_percentage">Boost Percentage</option>
							<option value="number">Number</option>
							<option value="date">Date</option>
						</select>
					</div>
				</div>



				

			</div>

			<div class="mb-3">
				<!-- ajax get with num increase -->
				<label>Custom Fields</label>

				<div class="row" id="custom-fields1">
					<div class="col-6"><label class="text-info">Key</label>
						<input type="text" class="form-control" name="custom_fields[0][key]"/>
					</div>
					<div class="col-6"><label class="text-info">Value</label>
						<input type="text" class="form-control" name="custom_fields[0][value]"/>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-6">
						<input type="text" class="form-control" name="custom_fields[1][key]"/>
					</div>
					<div class="col-6">
						<input type="text" class="form-control" name="custom_fields[1][value]"/>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-6">
						<input type="text" class="form-control" name="custom_fields[2][key]"/>
					</div>
					<div class="col-6">
						<input type="text" class="form-control" name="custom_fields[2][value]"/>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-6">
						<input type="text" class="form-control" name="custom_fields[3][key]"/>
					</div>
					<div class="col-6">
						<input type="text" class="form-control" name="custom_fields[3][value]"/>
					</div>
				</div>
			</div>
				
			<div class="mb-3">
				<label></label>
				<input type="submit" name="submit" class="btn btn-primary btn-lg form-control" id="submit" value="Submit">
			</div>
		</form>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script type="text/javascript">
		function demoDisplay(theid) {
		  document.getElementById(theid).style.display = "block";
		}

		function demoHide(theid) {
		  document.getElementById(theid).style.display = "none";
		}
	</script>
</body>
</html>
