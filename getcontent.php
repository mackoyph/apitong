<?php 


			ini_set("allow_url_fopen", 1);
			$j_headermainname = file_get_contents('http://localhost/apitong/admin2/about/jsonserver/header-mainname');
			$headermainname = json_decode($j_headermainname);
			$headermainname = $headermainname->content;

			$j_headertagline = file_get_contents('http://localhost/apitong/admin2/about/jsonserver/header-tagline');
			$headertagline = json_decode($j_headertagline);
			$headertagline = $headertagline->content;

			$j_footercontactnumber = file_get_contents('http://localhost/apitong/admin2/about/jsonserver/footer-contactnumber');
			$footercontactnumber = json_decode($j_footercontactnumber);
			$footercontactnumber = $footercontactnumber->content;

			$j_footercontactemail = file_get_contents('http://localhost/apitong/admin2/about/jsonserver/footer-contactemail');
			$footercontactemail = json_decode($j_footercontactemail);
			$footercontactemail = $footercontactemail->content;

			$j_footercontactaddress = file_get_contents('http://localhost/apitong/admin2/about/jsonserver/footer-contactaddress');
			$footercontactaddress = json_decode($j_footercontactaddress);
			$footercontactaddress = $footercontactaddress->content;

			$j_footertwitter = file_get_contents('http://localhost/apitong/admin2/about/jsonserver/footer-twitter');
			$footertwitter = json_decode($j_footertwitter);
			$footertwitter = $footertwitter->content;

			$j_footerfacebook = file_get_contents('http://localhost/apitong/admin2/about/jsonserver/footer-facebook');
			$footerfacebook = json_decode($j_footerfacebook);
			$footerfacebook = $footerfacebook->content;

			$j_footernote = file_get_contents('http://localhost/apitong/admin2/about/jsonserver/footer-note');
			$footernote = json_decode($j_footernote);
			$footernote = $footernote->content;

			$j_homesecurity = file_get_contents('http://localhost/apitong/admin2/about/jsonserver/home-security');
			$homesecurity = json_decode($j_homesecurity);
			$homesecurity = $homesecurity->content;
 ?>