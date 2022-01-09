<?
// opensea url
//'https://opensea.io/assets/polygon/' . $contract_address . '/' . $token_id;
?>
<style type="text/css">
	body {padding-top:4.5rem;
		background-color:#f8f9fa ;}
		.table th:first-child,
		.table td:first-child {
			position: sticky;
			left: 0;
			background-color:#fff;
		}
		.table td {
			max-width:100px;
			text-overflow:ellipsis;
			overflow: hidden;
			white-space: nowrap;
		}
	</style>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
	<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light shadow">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">Polygon-NFTs.com</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
							<i class="bi-file-richtext"></i> Minting 
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="mint-easy-upload.php"><i class="bi-file-image text-primary"></i> Mint w/upload</a></li>
							<li><a class="dropdown-item" href="mint-easy-url.php"><i class="bi-file-text text-primary"></i> Mint w/url</a></li>
							<li><a class="dropdown-item" href="mint-custom.php"><i class="bi-file-richtext text-primary"></i> Custom Minting <i class="bi-key"></i></a> </li>
							<li><a class="dropdown-item" href="get-minted-nft.php"><i class="bi-file-arrow-down text-success"></i> Get minted NFT</a></li>
							<li><a class="dropdown-item" href="update-minted-nft.php"><i class="bi-file-code text-danger"></i> Update NFT <i class="bi-key"></i></a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
							<i class="bi-journal-text"></i> Contracts
						</a>
						<ul class="dropdown-menu">

							<li><a class="dropdown-item" href="deploy-nft-contract.php"><i class="bi-journal-arrow-up text-primary"></i> Deploy Contract <i class="bi-key"></i></a></li>
							<li><a class="dropdown-item" href="get-deployed-contract.php"><i class="bi-journal-arrow-down text-success"></i> Get deployed Contract</a></li>
							<li><a class="dropdown-item" href="update-deployed-contract.php"><i class="bi-journal-code text-danger"></i> Update Contract <i class="bi-key"></i></a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
							<i class="bi-cloud"></i> Storage
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="upload-file-ipfs.php"><i class="bi-file-arrow-up text-primary"></i> IPFS Upload File</a></li>
							<li><a class="dropdown-item" href="upload-metadata-ipfs.php"><i class="bi-cloud-upload text-primary"></i> IPFS Upload Metadata</a></li>
						</ul>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
							<i class="bi-binoculars"></i> View
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="get-nft-details.php"><i class="bi-file-richtext text-success"></i> View NFT Details</a></li>
							<li><a class="dropdown-item" href="get-contract-nfts.php"><i class="bi-journal-album text-success"></i> View Contract NFTs</a></li>
							<li><a class="dropdown-item" href="get-account-nfts.php"><i class="bi-wallet text-success"></i> View Wallet NFTs</a></li>
							<li><a class="dropdown-item" href="get-nfts.php"><i class="bi-collection text-success"></i> View All NFTs</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
							<i class="bi-search"></i> Search
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="search-nfts.php"><i class="bi-search text-success"></i> NFT Search Engine</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
							<i class="bi-robot"></i> AI 
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="find-similar-nfts-url.php"><i class="bi-terminal text-primary"></i> Similar NFTs w/url</a></li>
							<li><a class="dropdown-item" href="find-similar-nfts-upload.php"><i class="bi-upload text-primary"></i> Similar NFTs w/upload</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item" href="find-duplicate-nfts-url.php"><i class="bi-terminal text-primary"></i> Duplicate NFTs w/url</a></li>
							<li><a class="dropdown-item" href="find-duplicate-nfts-upload.php"><i class="bi-upload text-primary"></i> Duplicate NFTs w/upload</a></li>
							<li><a class="dropdown-item" href="find-duplicate-nfts-token.php"><i class="bi-hash text-primary"></i> Duplicate NFTs  w/token id</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
							<i class="bi-folder"></i> My NFTPORT
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="get-my-nfts.php"><i class="bi-files text-success"></i> My NFTs <i class="bi-key"></i></a></li>
							<li><a class="dropdown-item" href="get-my-contracts.php"><i class="bi-journals text-success"></i> My Contracts <i class="bi-key"></i></a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
