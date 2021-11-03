<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Createpdf extends CI_Controller {
    function __construct()
	{
		parent:: __construct();

		$this->load->model('M_createpdf');
	}

    public function cetak_spp(){
    	$NIS = $this->uri->segment(3);
    	$id_spp = $this->uri->segment(4);
    	$data['spp'] = $this->M_createpdf->spp($NIS,$id_spp);
    	$this->load->view('PDF/cetak_spp',$data);
        
        // Get output html
        $html = $this->output->get_output();
        
        // Load pdf library
        $this->load->library('pdf');
        
        // Load HTML content
        $this->dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation
        $this->dompdf->setPaper('A4', 'landscape');
        
        // Render the HTML as PDF
        $this->dompdf->render();
        
        // Output the generated PDF (1 = download and 0 = preview)
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
    }
    public function cetak_iuran(){
        $NIS = $this->uri->segment(3);
        $id_iuran = $this->uri->segment(4);
        $data['iuran'] = $this->M_createpdf->iuran($NIS,$id_iuran);
        
        $this->load->view('PDF/cetak_iuran',$data);
        
        // Get output html
        $html = $this->output->get_output();
        
        // Load pdf library
        $this->load->library('pdf');
        
        // Load HTML content
        $this->dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation
        $this->dompdf->setPaper('A4', 'landscape');
        
        // Render the HTML as PDF
        $this->dompdf->render();
        
        // Output the generated PDF (1 = download and 0 = preview)
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
    }
    
}