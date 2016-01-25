<?php
$directory = dirname(__FILE__);
$version = file_get_contents("$directory/version");
$released = file_get_contents("$directory/released");

$isExample = false;
if(strpos(getcwd(), "/examples") !== false)
	$isExample = true;

$stylesheet = "style.css";
$examplePath = "examples/";	
$indexPath = "";
if($isExample) {
	$stylesheet = "../" . $stylesheet;
	$examplePath = "";
	$indexPath = "../index.php";
}	

echo <<<HTML
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<title>PHP Form Build Class</title>
		<link href="$stylesheet" rel="stylesheet" type="text/css"/>
		<script type="text/javascript">var switchTo5x=true;</script><script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script><script type="text/javascript">stLight.options({publisher:'ede2d672-d545-4685-8978-6b080bc4769f'});</script>
	</head>
	<body>
		<div id="header">
            <div id="links">
                <a href="http://groups.google.com/group/php-form-builder-class/">Mailing List - Google Groups</a>
                <a href="http://code.google.com/p/php-form-builder-class/">Homepage - Google Code Project Hosting</a>
                <a href="http://php-form-builder-class.googlecode.com/files/pfbc$version-php5.zip">
				Download Version $version</a>
            </div>
            <h2>PHP Form Builder Class</h2>
            <ul>
                <li>Version: $version</li>
                <li>Released: $released</li>
            </ul>
            <div style="clear: both;"></div>
			<div id="sharethis">
				<span  class='st_facebook_large' ></span><span  class='st_twitter_large' ></span><span  class='st_gbuzz_large' ></span><span  class='st_slashdot_large' ></span><span  class='st_linkedin_large' ></span><span  class='st_email_large' ></span><span  class='st_sharethis_large' ></span>
			</div>
        </div>

		<div id="content">
			<div id="left">
				<h2 class="first">Table of Contents</h2>
				<ul>
					<li><a href="$indexPath#project-overview">Project Overview</a></li>
					<li><a href="$indexPath#system-requirements">System Requirements</a></li>
					<li><a href="$indexPath#whats-new-different-in-version-2x">What's New/Different in Version 2.x</a></li>
					<li><a href="$indexPath#getting-started">Getting Started</a></li>
					<li><a href="$indexPath#">Examples</a></li>
					<li class="indent-l1"><a href="{$examplePath}elements.php">Elements</a></li>
					<li class="indent-l1"><a href="{$examplePath}views.php">Views</a></li>
					<li class="indent-l1"><a href="{$examplePath}validation.php">Validation</a></li>
					<li class="indent-l1"><a href="{$examplePath}setting-element-values.php">Setting Element Values</a></li>
					<li class="indent-l1"><a href="{$examplePath}ajax.php">Ajax</a></li>
					<li class="indent-l1"><a href="{$examplePath}conditions.php">Conditions</a></li>
				</ul>
				<h2>Sponsored By</h2>
				<a href="http://www.imavex.com/"><img src="http://www.imavex.com/schemes/IMAVEX08/Main/images/header_logo.png" alt="Imavex" title="Imavex" border="0" width="100%"/></a>
			</div>
			<div id="right">
HTML;
