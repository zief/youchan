<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if(!function_exists('ci_instance')) {
        function ci_instance() {
            return get_instance();
        }
    }

if ( ! function_exists('cekPoin'))
{
	function cekPoin($id){
		ci_instance() ->load->model("modelyouchan");
		return ci_instance()->modelyouchan->cek_poin($id);
	}



}

if ( ! function_exists('cekPoin'))
{
	function addPoin($id){
		$poin = ci_instance()->modelyouchan->cek_poin($id);
		$p = intval($poin);

		$tempPoin = intval($this->input->post('poin'));

		$jumpoin = $p + $tempPoin;

		$this->modelyouchan->update_poin($jumpoin, $id);
	}
}

?>