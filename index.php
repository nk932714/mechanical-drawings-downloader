<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.responsive {
    width: 100%;
    max-width: 300px;
    height: auto;
}
/*link beautify*/
a.hola:link, a.hola:visited {
    background-color: #f44336;
    color: white;
    padding: 14px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
}


a.hola:hover, a.hola:active {
    background-color: red;
}
</style>
</head>
<body>




<?php  	error_reporting(0);

 $pagea  = $_GET["page"];
            if (!empty($pagea)) { $page1 = $pagea; }
            else{ $page1 = 1; }
 $full_url = $_SERVER['REQUEST_URI']; $qurey_url = '?'.$_SERVER['QUERY_STRING']; $full_url1 = str_replace($qurey_url,'', $full_url); ?>
<center> <a class ="hola" href="<?php echo $full_url1; ?>">Reload</a>&nbsp;&nbsp;&nbsp;<a class ="hola" href="<?php $page2 = $page1 + 1; $next_page = $full_url1.'?word='.$search.'&page='.$page2;  echo $next_page ?>">Next Page</a>&nbsp;&nbsp;&nbsp;<a class ="hola" href="<?php $page3 = $page1 - 1; $prev_page = $full_url1.'?word='.$search.'&page='.$page3; echo $prev_page ?>">Previous Page</a></center> 

<?php    error_reporting(0);
			   $pagea  = $_GET["page"];
            if (!empty($pagea)) { $page1 = $pagea; }
            else{ $page1 = 1; }

		$url2 = 'https://m.blog.naver.com/rego/ThumbnailPostListInfo.nhn?blogId=studycadcam&categoryNo=103&currentPage='.$pagea;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url2);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
		$headers = array();
		$headers[] = "Host: m.blog.naver.com";
		$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:60.0) Gecko/20100101 Firefox/60.0";
		$headers[] = "Accept: application/json, text/plain, */*";
		$headers[] = "Accept-Language: en-US,en;q=0.5";
		$headers[] = "Referer: https://m.blog.naver.com/PostList.nhn?blogId=studycadcam&categoryNo=103&listStyle=style3";
		$headers[] = "Connection: keep-alive";
		$headers[] = "Cache-Control: max-age=0";
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$result = curl_exec($ch);
		if (curl_errno($ch)) {    echo 'Error:' . curl_error($ch); }
		curl_close ($ch);

	$re = '/"logNo":(.*?),.*?"thumbnailUrl":"(.*?)"/sm';
	$re2 = '/<a href="(.*?)\.pdf/';
	$count = preg_match_all($re, $result, $matches);
	$count2 = preg_match_all($re2, $result, $matches2);
	//echo $count;
	
	for ($x = 0; $x < $count; $x++) {
	    /*echo '<a href = "3dnever2.php?word='.$matches[1][$x].'"><img src="'.$matches[2][$x].'" alt="broken img" / ></a><br>';*//*class="responsive" width="600" height="400"*/
echo '<a href = "3dnever2.php?word='.$matches[1][$x].'"><img src="'.$matches[2][$x].'" alt="broken img" class="responsive" width="400" height="300" / ></a>';



					}


/* For next page and previous page */


?>
<center> <a class ="hola" href="<?php echo $full_url1; ?>">Reload</a>&nbsp;&nbsp;&nbsp;<a class ="hola" href="<?php $page2 = $page1 + 1; $next_page = $full_url1.'?word='.$search.'&page='.$page2;  echo $next_page ?>">Next Page</a>&nbsp;&nbsp;&nbsp;<a class ="hola" href="<?php $page3 = $page1 - 1; $prev_page = $full_url1.'?word='.$search.'&page='.$page3; echo $prev_page ?>">Previous Page</a></center> 


         
