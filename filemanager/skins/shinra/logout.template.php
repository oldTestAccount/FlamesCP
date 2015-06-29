<?php defined("NET2FTP") or die("Direct access to this location is not allowed."); ?>
<!-- Template /skins/shinra/logout.php begin -->

	<!-- WRAPPER -->
	<div id="wrapper">
			
		<!-- HEADER -->
		<div id="header">

<?php require_once($net2ftp_globals["application_skinsdir"] . "/" . $net2ftp_globals["skin"] . "/google_ad_top.template.php"); ?>

			<img id="logo" src="skins/shinra/img/logo.png" alt="net2ftp" />

		</div>
		<!-- ENDS HEADER -->
			
		<!-- MAIN -->
		<div id="main">

			<!-- content -->
			<div id="content">
				
				<!-- title -->
				<div id="page-title">
					<span class="title"><?php echo $net2ftp_globals["ftpserver"]; ?></span>
				</div>
				<!-- ENDS title -->

				<!-- Posts -->
				<div id="posts">

					<!-- post -->
					<div class="post">
						<h3>Logged out successfully - redirecting...</h3>
<meta http-equiv="refresh" content="3; url=https://cp.flameshost.com/account">

					</div>
					<!-- ENDS post -->
			
				</div>
				<!-- ENDS Posts -->

<?php require_once($net2ftp_globals["application_skinsdir"] . "/" . $net2ftp_globals["skin"] . "/google_ad_bottom.template.php"); ?>

<?php require_once($net2ftp_globals["application_skinsdir"] . "/" . $net2ftp_globals["skin"] . "/footer.template.php"); ?>

<!-- Template /skins/shinra/logout.php end -->
