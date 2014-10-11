<?php
class CI_captcha extends CI_Model {
  function __construct()
  {
        parent::__construct();
  }
 
  function make_captcha()
  {
    $this -> load -> helper('captcha');
    $vals = array(
      'img_path' => './/images/captcha/', // PATH for captcha ( *Must mkdir (htdocs)/captcha ) 
      'img_url' => base_url().'/images/captcha/', // URL for captcha img
      'img_width' => 120, // width
      'img_height' => 50, // height
      'font_path'     => '../system/fonts/texb.ttf',
      'expiration' => 3600 ,
      );
    // Create captcha
    $cap = create_captcha( $vals );
    // Write to DB
    if ( $cap ) {
      $data = array(
        'captcha_id' =>'',
        'captcha_time' => $cap['time'],
        'ip_address' => $this -> input -> ip_address(),
        'word' => $cap['word'] ,
        );
      $query = $this -> db -> insert_string( 'captcha', $data );
      $this -> db -> query( $query );
    }else {
      return "Captcha not work" ;
    }
    return $cap['image'] ;
  }
 
  function check_captcha()
  {
    // Delete old data ( 2hours)
    $expiration = time()-3600 ;
    $sql = " DELETE FROM captcha WHERE captcha_time < ? ";
    $binds = array($expiration);
    $query = $this->db->query($sql, $binds);
 
    //checking input
    $sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
    $binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
    $query = $this->db->query($sql, $binds);
    $row = $query->row();
 
  if ( $row -> count > 0 )
    {
      return true;
    }
    return false;
 
  }
 
}//endofclass

?>