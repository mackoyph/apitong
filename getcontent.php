<?php 


			ini_set("allow_url_fopen", 1);
			$contents = file_get_contents('http://localhost/apitong/admin2/about/jsonserver/AllContents');
			$contents = json_decode($contents, TRUE);
			
			
			//$j_headermainname = file_get_contents('http://localhost/apitong/admin2/about/jsonserver/header-mainname');
			//$headermainname = json_decode($j_headermainname);
			//$headermainname = $headermainname->content;
			$headermainname = $contents['header-mainname'];

			//$j_headertagline = file_get_contents('http://localhost/apitong/admin2/about/jsonserver/header-tagline');
			//$headertagline = json_decode($j_headertagline);
			//$headertagline = $headertagline->content;
			$headertagline = $contents['header-tagline'];

			//$j_footercontactnumber = file_get_contents('http://localhost/apitong/admin2/about/jsonserver/footer-contactnumber');
			//$footercontactnumber = json_decode($j_footercontactnumber);
			//$footercontactnumber = $footercontactnumber->content;
			$footercontactnumber = $contents['footer-contactnumber'];

			//$j_footercontactemail = file_get_contents('http://localhost/apitong/admin2/about/jsonserver/footer-contactemail');
			//$footercontactemail = json_decode($j_footercontactemail);
			//$footercontactemail = $footercontactemail->content;
			$footercontactemail = $contents['footer-contactemail'];

			//$j_footercontactaddress = file_get_contents('http://localhost/apitong/admin2/about/jsonserver/footer-contactaddress');
			//$footercontactaddress = json_decode($j_footercontactaddress);
			//$footercontactaddress = $footercontactaddress->content;
			$footercontactaddress = $contents['footer-contactaddress'];

			//$j_footertwitter = file_get_contents('http://localhost/apitong/admin2/about/jsonserver/footer-twitter');
			//$footertwitter = json_decode($j_footertwitter);
			//$footertwitter = $footertwitter->content;
			$footertwitter = $contents['footer-twitter'];

			//$j_footerfacebook = file_get_contents('http://localhost/apitong/admin2/about/jsonserver/footer-facebook');
			//$footerfacebook = json_decode($j_footerfacebook);
			//$footerfacebook = $footerfacebook->content;
			$footerfacebook = $contents['footer-facebook'];

			//$j_footernote = file_get_contents('http://localhost/apitong/admin2/about/jsonserver/footer-note');
			//$footernote = json_decode($j_footernote);
			//$footernote = $footernote->content;
			$footernote = $contents['footer-note'];

			//$j_homesecurity = file_get_contents('http://localhost/apitong/admin2/about/jsonserver/home-security');
			//$homesecurity = json_decode($j_homesecurity);
			//$homesecurity = $homesecurity->content;
			$homesecurity = $contents['home-security'];

			//$j_homedesign = file_get_contents('http://localhost/apitong/admin2/about/jsonserver/home-design');
			//$homedesign = json_decode($j_homedesign);
			//$homedesign = $homedesign->content;
			$homedesign = $contents['home-design'];

			//$j_homelocated = file_get_contents('http://localhost/apitong/admin2/about/jsonserver/home-located');
			//$homelocated = json_decode($j_homelocated);
			//$homelocated = $homelocated->content;
			$homelocated = $contents['home-located'];

			//$j_homemoney = file_get_contents('http://localhost/apitong/admin2/about/jsonserver/home-money');
			//$homemoney = json_decode($j_homemoney);
			//$homemoney = $homemoney->content;
			$homemoney = $contents['home-money'];

			//$j_homeheader = file_get_contents('http://localhost/apitong/admin2/about/jsonserver/home-header');
			//$homeheader = json_decode($j_homeheader);
			//$homeheader = $homeheader->content;
			$homeheader = $content['home-header'];

			//$j_hometagline = file_get_contents('http://localhost/apitong/admin2/about/jsonserver/home-tagline');
			//$hometagline = json_decode($j_hometagline);
			//$hometagline = $hometagline->content;
			$hometagline = $contents['home-tagline'];
 ?>