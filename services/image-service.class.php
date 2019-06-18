<?php 
class ImageService {
   public function saveImage($image) {
        $CLIENT_ID = "9744a1494c6651d";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $CLIENT_ID));
        curl_setopt($ch, CURLOPT_POSTFIELDS, array('image' => base64_encode($image)));
        
        $reply = curl_exec($ch);
        curl_close($ch);
        
        return json_decode($reply);
   }
}