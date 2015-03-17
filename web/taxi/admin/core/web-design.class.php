<?php

class Web_Design extends Controller {


	public function getWebDesign()
	{
		$query = 'SELECT * FROM web_design';
		$this->select($query);

		return $this->fetch();
	}

	public function updateWebDesign()
	{
	    $file_directory = "../images";
		if($_FILES["background_image"]["name"]) 
		{
			move_uploaded_file($_FILES["background_image"]["tmp_name"], $file_directory . "/site_bg.jpg");

		    // update database banner
		    $bg_array = array(
			    'background_image' => 'images/site_bg.jpg'
		    );
		
		    $this->update('UPDATE web_design SET background_image = ?', $bg_array);
		}

        $file_directory = "../assets/img";
		if($_FILES["title_image"]["name"]) 
		{
			move_uploaded_file($_FILES["title_image"]["tmp_name"], $file_directory . "/" . $_FILES['title_image']['name']);

		    // update database banner
		    $bg_array = array(
			    'title_image' => 'assets/img/' . $_FILES['title_image']['name']
		    );
		
		    $this->update('UPDATE web_design SET title_image = ?', $bg_array);
		}

		// set up a success message
		$this->set_flashdata('Success', '<div class="update-nag">Homepage Settings Updated</div>');
		$this->redirect('settings/web-design');
	}


}