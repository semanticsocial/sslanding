<?php

	// load in mailchimp library
	include('MailChimp.php');

	// namespace defined in MailChimp.php
	use \DrewM\MailChimp\MailChimp;

	// connect to mailchimp
	$MailChimp = new MailChimp('ac185368691e4a654265c45daa9e759b-us18'); // put your API key here
	$list_id = '5ebcea91a5'; // put your list ID here
	$email = $_GET['EMAIL']; // Get email address from form
  $ighandle = $_GET['IGHANDLE']; // Get email address from form

	$id = md5(strtolower($email)); // Encrypt the email address
	// setup th merge fields
	$mergeFields = array(
		// *** YOUR FIELDS GO HERE ***
    'IGHANDLE'=>$_GET['IGHANDLE'],
		);

	// remove empty merge fields
	$mergeFields = array_filter($mergeFields);

	$result = $MailChimp->post("lists/$list_id/members", [
									'email_address'     => $email,
									'status'            => 'subscribed',
									'merge_fields'      => $mergeFields,
							]);

              if ($MailChimp->success()) {
            	print_r($result);
            } else {
            	echo $MailChimp->getLastError();
            }

	echo json_encode($result);
