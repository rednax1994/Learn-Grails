<?php 
$curl = curl_init();
$curl2 = curl_init();

if(!empty($_GET['user'])){
	curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => 'https://api.bitbucket.org/2.0/users/' . urlencode($_GET['user']),
			CURLOPT_USERAGENT => $_GET['user']
		));

	$bitbucket_user_json = curl_exec($curl);
	$bitbucket_user_array = json_decode($bitbucket_user_json, true);
	curl_close($curl);

	curl_setopt_array($curl2, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => 'https://api.bitbucket.org/2.0/repositories/' . urlencode($_GET['user']) . '',
			CURLOPT_USERAGENT => $_GET['user']
		));
	$bitbucket_repos_json = curl_exec($curl2);
	$bitbucket_repos_array = json_decode($bitbucket_repos_json, true);
	curl_close($curl2);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>bitbucket</title>
</head>
<body>
<form action="">
	<input type="text" name="user">
	<button type="submit">submit</button>
	<br/>
	Gebruiker locatie: <?php echo $bitbucket_user_array['location']; ?><br/>
	Gebruiker display name: <?php echo $bitbucket_user_array['display_name'];?><br/>
	Repos:<br/>
	<?php 
	foreach($bitbucket_repos_array['values'] as $repo){
		echo $repo['full_name'] . '<br/>';
	}

	?>
</form>
</body>
</html>