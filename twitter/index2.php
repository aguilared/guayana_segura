<?php
function sendTweet($mensaje){
        ini_set('display_errors', 1);
        require_once('TwitterAPIExchange.php');
        /** Set access tokens here - see: https://dev.twitter.com/apps/ **/ 
        $settings = array(
            'oauth_access_token' => "14279434-VXqwExpy1FV9b83tBqRgPNBeoMnOy2k9sxDZ9g802",
            'oauth_access_token_secret' => "54wEQjnsRQT41DHIt43f5MgBXJNMtDsa51YgDFpz1dAbJ",
            'consumer_key' => "iVk7TnhHyvlniWHE1AJ2Gw8mq",
            'consumer_secret' => "hkZgaORdnB9l7Cbwmu7ZIXYFhI0l7r2yhrP2P6TBw1nyyYLYM2"
        );
       
        $url = 'https://api.twitter.com/1.1/statuses/update.json';
        $requestMethod = 'POST';
        /** POST fields required by the URL above. See relevant docs as above **/
        $postfields = array( 'status' => $mensaje, );
        /** Perform a POST request and echo the response **/
        $twitter = new TwitterAPIExchange($settings);
        return $twitter->buildOauth($url, $requestMethod)->setPostfields($postfields)->performRequest();
}

$mensaje = "Tutorial realizado con éxito en @GeekyTheory. #PHP + #Twitter: Cómo enviar tweets desde PHP |  http://geekytheory.com/php-twitter-como-enviar-tweets-desde-php";
$respuesta = sendTweet($mensaje);
$json = json_decode($respuesta);

echo '<meta charset="utf-8">';
echo "Tweet Enviado por: ".$json->user->name." (@".$json->user->screen_name.")";
echo "<br>";
echo "Tweet: ".$json->text;
echo "<br>";
echo "Tweet ID: ".$json->id_str;
echo "<br>";
echo "Fecha Envio: ".$json->created_at;
?>