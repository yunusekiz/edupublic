<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// bu controller, login formundan gelen post datalarını alır,veritabanındaki admin kayıtlarıyla karşılaştırıp, admin paneline oturum açar.
class ddd extends CI_Controller {

	protected $parser_data;
	
	// login formundan gelen post datalarına atanacak değişken isimleri
	protected $post_email,$post_pass;
	
	// veritabanındaki admin tablosundaki kayıtlara atanacak değişken isimleri
	protected $admin_email,$admin_pass;
	
	// index() metodu, "login_controller" isimli controller çağırıldığı zaman ilk olarak devreye girer, bi nevi constructor görevi görür.
	public function index()
	{
		$this->load->model('promo_slider_model');

		$denek = $this->promo_slider_model->readRow();

		$this->parser_data['promo_slider_parser'] = $denek;

		$this->parser->parse('frontend_views/sss', $this->parser_data);	
	}
	
	
}
