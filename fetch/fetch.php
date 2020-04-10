<?php

$value =  json_decode($_POST['data'], true);
//print_r($value[0]['value']);
//echo $_POST['data'];
//die();
//echo $_POST['download'];

	function url_gen($search,$download_center)
	{
					$urlContent = file_get_contents($search);
					$dom = new DOMDocument();
					@$dom->loadHTML($urlContent);
					$xpath = new DOMXPath($dom);
					$hrefs = $xpath->evaluate("/html/body//a");
					url_fun($hrefs,$download_center);		
	}
		function url_fun($hrefs,$download_center)
			{
					for($i = 0; $i < $hrefs->length; $i++)
					{
						$href = $hrefs->item($i);
						$url = $href->getAttribute('href');
						$url = filter_var($url, FILTER_SANITIZE_URL);

						if(!filter_var($url, FILTER_VALIDATE_URL) === false)					
						{
							if(preg_match('/jpg$/', $url))
							{

							$th = $href->getElementsByTagName('img');
							$thUrl = '';
							if($th->length){
								$thUrl = $th[0]->getAttribute('src');
							}
								if($download_center != null)
								{
									echo '	<div class="col-sm-6 col-md-4">
	                						<a class="lightbox" target="_blank" href='.$url.'>
	                    						<img src='.$url.' alt="ZipiPiz" width="150" height="250">
	                						</a>
	            						</div>';
								}
								else
								{
					      			 echo '	<div class="col-sm-6 col-md-4">
	                						<a class="lightbox" target="_blank" href='.$url.'>
	                    						<img  src='.$thUrl.' alt="ZipiPiz">
	                						</a>
	            						</div>';
								}



							}
						}
					}			
			}	

if(isset($value[0]['value']))
{
			if(isset($_POST['download']))
			{				$download_center = $_POST['download'];				}
			else
			{				$download_center = '';										}	
			
			$get = trim($value[0]['value']);
			$get = preg_replace('/\s+/', '+', $get);
			//echo "<h2>".$get."</h2>";
			$start = 01; $end = 40;
			for ($page=0; $page <$value[1]['value'] ; $page++) { 
				$search = 'http://www.bing.com/images/search?q='.$get.'&qs=n&cc=356&form=QBILPG&adlt=off&first='.$start.'&count='.$end.'&sp=-1&pq='.$get.'&sc=8-5&sk=&cvid=A3C028C3B29248A6AD9B0320E76BC47C';
				//$search = 'http://www.bing.com/images/search?q='.$get.'&qs=n&cc=356&form=QBILPG&first='.$start.'&count='.$end.'&sp=-1&pq='.$get.'&sc=8-5&sk=&cvid=A3C028C3B29248A6AD9B0320E76BC47C';
				url_gen($search,$download_center);
				$start 	= $start 	+ 39;	$end	= $end		+ 39;
			}
				
}

?>