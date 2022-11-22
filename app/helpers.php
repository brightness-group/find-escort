<?php
function socialLinkUsername($url)
{
	// Regex for verifying an URL
	$regex = '/(?:(?:http|https):\/\/)?(?:www\.)?(?:instagram\.com|instagr\.am|creators\.mym\.fans|ismygirl\.com|onlyfans\.com)\/([A-Za-z0-9-_\.]+)/im';

	if ( preg_match( $regex, $url, $matches ) ) {
	    $username = $matches[1];
	    return $username;
	}
    
    return NULL;
}