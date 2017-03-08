<?php 
$curl = curl_init();
$curl2 = curl_init();

if(!empty($_GET['user'])){
	curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => 'https://api.github.com/users/' . urlencode($_GET['user']),
			CURLOPT_USERAGENT => $_GET['user']
		));

	$github_user_json = curl_exec($curl);
	$github_user_array = json_decode($github_user_json, true);
	curl_close($curl);

	curl_setopt_array($curl2, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => 'https://api.github.com/users/' . urlencode($_GET['user']) . '/repos',
			CURLOPT_USERAGENT => $_GET['user']
		));
	$github_repos_json = curl_exec($curl2);
	$github_repos_array = json_decode($github_repos_json, true);
	curl_close($curl2);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>github</title>
</head>
<body>
<form action="">
	<input type="text" name="user">
	<button type="submit">submit</button>
	<br/>
	Gebruiker locatie: <?php echo $github_user_array['location']; ?><br/>
	Gebruiker email: <?php echo $github_user_array['email'];?><br/>
	Repos:<br/>
	<?php 
	foreach($github_repos_array as $repo){
		echo $repo['name'] . '<br/>';
	}

	?>
</form>
</body>
</html>