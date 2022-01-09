<?php
// php functions for nftport.xyz api.
// by rob ross. twitter @funjibles instagram @polygon-nfts

// put your api key here
define("API_KEY",'pl@c3-y0u4-@p1-k3y-h3r3'); // api key



//======================================================================
// MULTI-CHAIN DATA
//======================================================================

//-----------------------------------------------------
// Contracts, Metadata & Assests
//-----------------------------------------------------

/* Retrieve all NFTs */

function get_nfts($chain=false,$continuation='',$include='default',$page_size=50)
{
	$url = "nfts?chain=$chain&continuation=$continuation&include=$include&page_size=$page_size";
	$response_array = nftport_curl_get($url);
	return $response_array;
}

/* Retrieve NFT Details */

function get_nft_details($contract_address=false,$token_id=false,$chain=false)
{
	$url = "nfts/$contract_address/$token_id?chain=$chain";
	$response_array = nftport_curl_get($url);
	return $response_array;
}

/* Retrieve Contract NFTs */

function get_contract_nfts($chain=false,$contract_address=false,$page_number=1,$page_size=50,$include='default',$refresh_metadata=true)
{
	$url = "nfts/$contract_address?chain=$chain&page_number=$page_number&page_size=$page_size&include=$include&refresh_metadata=$refresh_metadata";
	$response_array = nftport_curl_get($url);
	return $response_array;
}

//-----------------------------------------------------
// Ownership
//-----------------------------------------------------

/* Retrieve NFTs Owned by an Account */

function get_account_nfts($account_address=false,$chain=false,$include='default',$page_number=1,$page_size=50)
{
	$url = "accounts/$account_address?chain=$chain&page_number=$page_number&page_size=$page_size&include=$include";
	$response_array = nftport_curl_get($url);
	return $response_array;
}

//======================================================================
// MINTING, CONTRACTS & STORAGE
//======================================================================

//-----------------------------------------------------
// Minting
//-----------------------------------------------------

/* Customizable Minting */

function mint_custom($chain=false,$contract_address=false,$metadata_uri=false,$mint_to_address=false,$token_id=false)
{

}

/* Easy Minting with URL */

function mint_easy_url($post=false)
{

}

/* Easy Minting with File Upload */

function mint_easy_upload($post=false,$files=false)
{

}

/* Retrieve a Minted NFT */

function get_minted_nft($transaction_hash=false,$chain=false)
{
	$url = "mints/$transaction_hash?chain=$chain";
	$response_array = nftport_curl_get("mints/$transaction_hash?chain=$chain");
	return $response_array;
}

/* Update a Minted NFT */

function update_minted_nft($chain=false,$contract_address=false,$token_id,$metadata_uri=false,$freeze_metadata=false)
{

}

//-----------------------------------------------------
// Contracts
//-----------------------------------------------------

/* Retrieve a Deployed Contract */

function get_deployed_nft_contract($chain=false,$transaction_hash=false)
{
	$url =  "contracts/$transaction_hash?chain=$chain";
	$response_array = nftport_curl_get($url);
	return $response_array;
}

/* Deploy an NFT Contract */

function deploy_nft_contract($chain=false,$name=false,$symbol=false,$owner_address=false,$metadata_updatable='true')
{

}

/* Update a Deployed Contract */

function update_deployed_contract($chain=false,$contract_address=false,$freeze_metadata=false)
{

}

//-----------------------------------------------------
// Storage
//-----------------------------------------------------

/* Upload a File to IPFS */

function upload_file_ipfs($files=false)
{
	$input_name = key($files);
	$file = ['file' => curl_file_create($files[$input_name]['tmp_name'], $files[$input_name]['type'], $files[$input_name]['name'])];

	$url = "files";
	$postfields = $file;
	$content_type = 'multi';
	$response_array = nftport_curl_post($url,$postfields,$content_type);
	return $response_array;
}

/* Upload Metadata to IPFS */

function upload_metadata_ipfs($post=false)
{
	$allowed_top_level_array=array('name', 'description', 'file_url', 'external_url','animation_url');
	foreach($allowed_top_level_array as $key=>$top_level) {
		if(array_key_exists($top_level,$post) AND $post[$top_level] !='') {
			$metadata_array[$top_level]=$post[$top_level];
		}
	}

	foreach($post['attributes'] as $num=>$attributes) {
		foreach($attributes as $key=>$value) {
			if($value!='') {
				$attribute_array[$key]=$value;
			}
		}
		if(isset($attribute_array)) {
			$metadata_array['attributes'][$num] = $attribute_array;
		}
		unset($attribute_array);
	}

	foreach($post['custom_fields'] as $num=>$custom) {
		foreach($custom as $key=>$value) {
			if($value!='') {
				$metadata_array['custom_fields'][$key] = $value;
			}
		}
	}

	$url = "metadata";
	$postfields = json_encode($metadata_array);
	$content_type = 'json';
	$response_array = nftport_curl_post($url,$postfields,$content_type);
	return $response_array;
}

//-----------------------------------------------------
// User
//-----------------------------------------------------

/* List all your Minted NFTs */

function get_my_nfts($chain=false,$page_number=1,$page_size=50)
{
	$url = "me/mints?chain=$chain&page_number=$page_number&page_size=$page_size";
	$response_array = nftport_curl_get($url);
	return $response_array;
}

/* List all your Deployed Contracts */

function get_my_nft_contracts()
{
	$url = "me/contracts";
	$response_array = nftport_curl_get($url);
	return $response_array;
}

//======================================================================
// ENHANCED APIS
//======================================================================

//-----------------------------------------------------
// Search
//-----------------------------------------------------

/* Multi-chain NFT Search */

function search_nfts($text=false,$chain='all',$filter_by_contract_address='',$order_by='relevance',$page_number=1,$page_size=50,$sort_order='desc')
{
	$append = '';
	if(!empty($filter_by_contract_address)) {
		$append = "&filter_by_contract_address=$filter_by_contract_address";
	}
	$text = urlencode($text);
	$url = "search?text=$text&chain=$chain&order_by=$order_by&page_number=$page_number&page_size=$page_size&sort_order=$sort_order".$append;
	$response_array = nftport_curl_get($url);
	return $response_array;
}

//-----------------------------------------------------
// Recommendations AI
//-----------------------------------------------------

/* Find Similar NFTs with URL */

function find_similar_nfts_url($url=false,$page_number=1,$page_size=50)
{
	$postfields_array = array(
		'url'=>$url,
		'page_number'=>$page_number,
		'page_size'=>$page_size
	);

	$url = "recommendations/similar_nfts/urls";
	$postfields = json_encode($postfields_array);
	$content_type = 'json';
	$response_array = nftport_curl_post($url,$postfields,$content_type);
	return $response_array;
}

/* Find Similar NFTs with File Upload */

function find_similar_nfts_upload($files=false,$page_number=1,$page_size=50)
{
	$input_name = key($files);
	$file = ['file' => curl_file_create($files[$input_name]['tmp_name'], $files[$input_name]['type'], $files[$input_name]['name'])];

	$url = "recommendations/similar_nfts/files?page_number=$page_number&page_size=$page_size";
	$postfields = $file;
	$content_type = 'multi';
	$response_array = nftport_curl_post($url,$postfields,$content_type);
	return $response_array;
}

//-----------------------------------------------------
// Duplicate detection AI
//-----------------------------------------------------

/* Find Counterfeit NFTs with URL */

function find_duplicate_nfts_url($url=false,$page_number='1',$page_size='50',$threshold='0.9',$filter_out_contract_address='')
{
	$postfields_array = array(
		'url'=>$url,
		'page_number'=>$page_number,
		'page_size'=>$page_size,
		'threshold'=>$threshold
	);
	$url = "duplicates/urls";
	$postfields = json_encode($postfields_array);
	$content_type = 'json';
	$response_array = nftport_curl_post($url,$postfields,$content_type);
	return $response_array;
}

/* Find Counterfeit NFTs with Token ID */

function find_duplicate_nfts_token($chain=false,$contract_address=false,$token_id=false,$page_number='1',$page_size='50',$threshold='0.9',$filter_out_contract_address='')
{
	$postfields_array = array(
		'chain'=>$chain,
		'contract_address'=>$contract_address,
		'token_id'=>$token_id,
		'page_number'=>$page_number,
		'page_size'=>$page_size,
		'threshold'=>$threshold
	);
	$url = "duplicates/tokens";
	$postfields = json_encode($postfields_array);
	$content_type = 'json';
	$response_array = nftport_curl_post($url,$postfields,$content_type);
	return $response_array;
}

/* Find Counterfeit NFTs with File Upload */

function find_duplicate_nfts_upload($files=false,$page_number='1',$page_size='50',$threshold='0.9',$filter_out_contract_address='')
{
	$input_name = key($files);
	$file = ['file' => curl_file_create($files[$input_name]['tmp_name'], $files[$input_name]['type'], $files[$input_name]['name'])];

	$url = "duplicates/files?page_number=$page_number&page_size=$page_size&threshold=$threshold";
	$postfields = $file;
	$content_type = 'multi';
	$response_array = nftport_curl_post($url,$postfields,$content_type);
	return $response_array;
}

//======================================================================
// CURL FUNCTIONS
//======================================================================

//-----------------------------------------------------
// Curl Functions
//-----------------------------------------------------

/* Curl Post */

function nftport_curl_post($url=false,$postfields=false,$content_type='json')
{
	if($content_type=='multi') {
		$curl_content_type = 'multipart/form-data';
	} else {
		$curl_content_type = 'application/json';
	}
	$curl = curl_init();
	curl_setopt_array($curl, [
	  CURLOPT_URL => 'https://api.nftport.xyz/v0/' . $url,
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => $postfields,
	  CURLOPT_HTTPHEADER => [
	    "Authorization: " . API_KEY,
	    "Content-Type: " . $curl_content_type,
	  ],
	]);
	$response = curl_exec($curl);
	//echo $response;
	$err = curl_error($curl);
	curl_close($curl);
	if ($err) {
		echo "cURL Error #:" . $err;
	} else {
		$response_array = json_decode($response, true);
		return $response_array;
	}
}

/* Curl Get */

function nftport_curl_get($url=false)
{
	$curl = curl_init();
 	curl_setopt_array($curl, [
 	  CURLOPT_URL => 'https://api.nftport.xyz/v0/' . $url,
 	  CURLOPT_RETURNTRANSFER => true,
 	  CURLOPT_ENCODING => "",
 	  CURLOPT_MAXREDIRS => 10,
 	  CURLOPT_TIMEOUT => 30,
 	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 	  CURLOPT_CUSTOMREQUEST => "GET",
 	  CURLOPT_HTTPHEADER => [
 	    "Authorization: " . API_KEY,
 	    "Content-Type: application/json"
 	  ],
 	]);
 	$response = curl_exec($curl);
 	$err = curl_error($curl);
 	curl_close($curl);
 	if ($err) {
 		echo "cURL Error #:" . $err;
 	} else {
 		$response_array = json_decode($response, true);
 		return $response_array;
 	}
}

/* Curl Put */

function nftport_curl_put($url=false,$postfields=false,$content_type='json')
{
	if($content_type=='multi') {
		$curl_content_type = 'multipart/form-data';
	} else {
		$curl_content_type = 'application/json';
	}
	$curl = curl_init();
	curl_setopt_array($curl, [
	  CURLOPT_URL => 'https://api.nftport.xyz/v0/' . $url,
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "PUT",
	  CURLOPT_POSTFIELDS => $postfields,
	  CURLOPT_HTTPHEADER => [
	    "Authorization: " . API_KEY,
	    "Content-Type: " . $curl_content_type,
	  ],
	]);
	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);
	if ($err) {
		echo "cURL Error #:" . $err;
	} else {
		$response_array = json_decode($response, true);
		return $response_array;
	}
}









/// unused 
/* Curl Get Check Status*/

function nftport_check_status()
{
	$curl = curl_init();

 	curl_setopt_array($curl, [
 	  CURLOPT_URL => 'https://api.nftport.xyz/v0/',
 	  CURLOPT_RETURNTRANSFER => true,
 	  CURLOPT_ENCODING => "",
 	  CURLOPT_MAXREDIRS => 10,
 	  CURLOPT_TIMEOUT => 30,
 	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 	  CURLOPT_CUSTOMREQUEST => "GET",
 	  CURLOPT_HTTPHEADER => [
 	    "Authorization: " . API_KEY,
 	    "Content-Type: application/json"
 	  ],
 	]);

 	$response = curl_exec($curl);
 	$err = curl_error($curl);

 	if ($err) {
 		echo "cURL Error # :" . $err;
 	} else { // extra error checking added as it happened
	 	if (empty($response)) {
		    // some kind of error
		     die("Empty response.");
		     curl_close($curl);
		} else {
			// we received a response (it was empty null or blank or space)
			// todo: if happens again get response length
		    $info = curl_getinfo($curl);
		    curl_close($curl);
		    // the response isn't empty but there is no http_code?!
		    if (empty($info['http_code'])) {
		    	// wtf weird
		       	die("No HTTP code was returned");
		    } else { // 200 hopefully or an error code etc
		        echo "The server responded: " . $info['http_code'] . '<br />';
		    }
		}
 		$response_array = json_decode($response, true);
 		echo "<pre>";
 		print_r($response_array);
 		echo "</pre>";
 		return $response_array;
 	}
 	/*
 	(
 	    [title] => 0.1
 	    [description] => NFTPort API version 0.1
 	    [version] => 0.1
 	)
 	*/
}
//nftport_check_status();

//$where possible wallet, contract
function get_number_of_nfts($location,$address) {
	if($location == 'wallet') {
		$response = get_account_nfts($address,'polygon','default',1,50);
		return $response;
	}
	if($location == 'contract') {
		get_contract_nfts();
	}
}

function refresh_nft_metadata($contract_address=false,$token_id=false,$chain=false,$refresh_metadata=true)
{
	$url = "nfts/$contract_address/$token_id?chain=$chain&refresh_metadata=true";
	$response_array = nftport_curl_get($url);
	return $response_array;
}


// this will read the metadata from an ipfs url directly
// I use this when nftport doesn't return an image, to doublecheck
function parse_image_from_ipfs($url) {
	$headers = get_headers($url,true);
	if($headers['Content-Type']=='application/json') {
		$contents = file_get_contents($url);
		$php_array = json_decode($contents,true);
		return $php_array['image'];
	}
}