<?php
class Modelyouchan extends CI_Model
{
	function konek_db(){
		//ambil data dari tabel video
		$video = $this->db->get('video');
		return $video;
		
	}
	function linkvideo($iduser){
		return $this->db->get_where('video',array('iduser'=>$iduser));

	}

	function product($idvideo){
 		return $this->db->get_where('video',array('idvideo'=>$idvideo));
 	}

 	function count_video($id){
 		// //$this->db->from('video');
 		// $this->db->where('iduser='.$id);
 		// return $this->db->count_all('video');

 		  	$query = $this->db->query("
   						SELECT * FROM video WHERE iduser=
  						".$id);
  			return $query->num_rows();
 	}

  function tonton_video($id){
   $query = $this->db->query("
              SELECT * FROM `video` WHERE `iduser`!=".$id." && `banned`='Tidak'");
        
    if($query->num_rows()>0){
      return $query->result();

    }
    else{
      // harus pake return $query->result();  untuk jaga jaga kalo db kosong
      return $query->result(); 
    }
 }

 	public function fetch_video($limit, $offset, $id){
 		$this->db->limit($limit, $offset);

 		

 		//pilih idvideo, linkvideo dari database video dimana iduser adalah user yg sedang login dan link tidak di banned
 		// $this->db->select('idvideo,linkvideo');
 		//$this->db->where('iduser='.$id);
 		//$this->db->limit($limit, $offset);
 		
 		//$query = $this->db->get();
 		$query = $this->linkvideo($id);			
 					
 		if($query->num_rows()>0){
 			return $query->result();

 		}
 		else{
 			// harus pake return $query->result();  untuk jaga jaga kalo db kosong
 			return $query->result(); 
 		}

 	}

 	function count_user(){
 		
 		return $this->db->count_all('user_login');
 		  
 	}

 	public function fetch_user($limit, $offset){
 		$this->db->limit($limit, $offset);

 	
 		$query = $this->db->get('user_login');		
 					
 		if($query->num_rows()>0){
 			return $query->result();

 		}
 		else{
 			// harus pake return $query->result();  untuk jaga jaga kalo db kosong
 			return $query->result(); 
 		}
 	}

 	function cek_video($id){

 		  	$query = $this->db->query("
   						SELECT * FROM video WHERE iduser=
  						".$id );
  			return $query->num_rows();
 	}

 	function cek_video_unbanned($id){

 		  	$query = $this->db->query("
   						SELECT * FROM video WHERE iduser=
  						".$id."and banned='tidak'");
  			return $query->num_rows();
 	}

 	function cek_video_banned($id){

 		  	$query = $this->db->query("
   						SELECT * FROM video WHERE iduser=
  						".$id." and banned='ya'");
  			return $query->num_rows();
 	}
 
  function banned_video($idvideo){
    $query = $this->db->query("UPDATE `video` SET `banned`='Ya' WHERE `idvideo`=".$idvideo);


  }

  function unbanned_video($idvideo){
    $query = $this->db->query("UPDATE `video` SET `banned`='Tidak' WHERE `idvideo`=".$idvideo);


  }

  function cek_poin($id){
    $query = $this->db->query("
              SELECT * FROM poin WHERE iduser=
              ".$id );

    $row = $query->row();
    return $row->jmlpoint;

    }

  function cek_jum_poin($id){

     $condition = "iduser=" . "'" . $id . "'";
    $this->db->select('*');
    $this->db->from('poin');
    $this->db->where($condition);

    $query = $this->db->get();

    $row = $query->row();


    if ($query->num_rows() == 1) {  
      return $query->result();
    } else {
      return $query->result();
    }
  }

  function update_poin($jum_poin, $id){
    $query= $this->db->query("UPDATE `poin` SET `jmlpoint`=$jum_poin WHERE `iduser`=".$id);
  }

  





}
?>