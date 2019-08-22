<?php

ini_set('display_errors',1);
error_reporting(E_ALL);

class Collector{
  const ROOT = __DIR__.'/cdn';
  const PUBLIC_CDN_HOST = 'http://0.0.0.0:9000';
  private $name_packet;
  private $version_packet;
  private $min_packet;
  private $URL_LIBRARY = 'http://nodejs.tw1.ru/collector/library.php';
  // private $URL_LIBRARY = 'https://cdnjs.cloudflare.com/ajax/libs';

  // https://cdnjs.cloudflare.com/ajax/libs
  // /vue-chartjs/3.4.2/vue-chartjs.min.js

  function __construct($url=false){

    if($url){
      $this->URL_LIBRARY = $url;
    }

  }

  function js($name, $version, $min=true){
    // $this->console(" $name, $version, $min ");

    $result_link = $this->_controller( __FUNCTION__, $name, $version, $min);
    return '<script src="'.$result_link.'"></script>'."\n";
  }
  
  function css($name, $version, $min=true){
    $result_link = $this->_controller( __FUNCTION__, $name, $version, $min);
    return '<link href="'.$result_link.'"/>'."\n";
  }


  private function _controller($type, $name, $version, $min=true){

    $root_type = self::ROOT.'/'.$type;
    if( !is_dir( $root_type ) ) mkdir( $root_type );
    // $this->console( $root_type );

    $root_library = $root_type.'/'.$name;
    if( !is_dir( $root_library ) ) mkdir( $root_library );
    // $this->console( $root_library );

    $root_version = $root_library.'/'.$version;
    if( !is_dir( $root_version ) ) mkdir( $root_version );
    // $this->console( $root_version );

    $root_file = $root_version.'/'.( $name.($min ? '.min':'').'.'.$type );
    // $this->console( $root_file );

    if( is_file( $root_file ) ){
      // '[CACHE::INTERNAL-LINK::EXISTING]';
      return $this->_createPublicLink( $root_file );
    }

    $query['type'] = $type;
    $query['name'] = $name;
    $query['version'] = $version;
    $query['min'] = $min ? 'true' : 'false';
    $result = $this->_post( $query );

    // $this->console( print_r( $query, true ) );
    // $this->console( print_r( $result, true ) );

    if( $result->code != 200 )
      return $return->data;

    $data = $this->_remove_utf8_bom( $result->data );
    // $this->console( print_r( $data, true ) );

    $json_t = json_decode( $data, true );
    // $this->console( print_r( $json_t, true ) );

    $url = count( $json_t ) ? trim($json_t[0]) : ''; 

    if( !empty($url) ){
      file_put_contents( $root_file, file_get_contents( $url ));
      if( is_file( $root_file ) ){
        // '[CACHE::INTERNAL-LINK::CREATED]';
        return $this->_createPublicLink( $root_file );
      }
    }

    return $url;

  }
  
  /*Ну как же без костылей*/
  private function _remove_utf8_bom($text){
    $bom = pack('H*','EFBBBF');
    $text = preg_replace("/^$bom/", '', $text);
    return $text;
  }

  private function _post( $query ){

    try{

      $curl = curl_init($this->URL_LIBRARY);
      curl_setopt($curl, CURLOPT_HEADER, 0);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $query);
      $result = curl_exec($curl);
      curl_close($curl);

      return (object)['code' => 200, 'msg' => 'OK', 'data' => $result ];

    }catch( Exception $e ){
      return (object)['code' => 500, 'msg' =>  $e->getMessage(), 'data' => '' ];
    }

  }

  private function _createPublicLink( $root_file ){

    // remove all before __public__ path
    $relative_file_link = explode( __DIR__, $root_file)[1];
    $external_file_link = self::PUBLIC_CDN_HOST.''.$relative_file_link;
    // $this->console( $external_file_link );
    return $external_file_link;

  }

  public function console( $data ){
    file_put_contents("php://stdout", "$data\n");
  }

}

