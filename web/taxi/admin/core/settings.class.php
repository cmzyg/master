<?php

class Settings extends Controller {


    // ============ UPDATE GENERAL SETTINGS  ============ >>>

	public function updateSettings($lat, $lon)
	{
        // PUT POST VALUES INTO AN ARRAY
		$array_settings = array(
			'contact_name'          => $this->filter($_POST['contact_name']),
			'email_address'         => $this->filter($_POST['email_address']), 
			'website_phone'         => $this->filter($_POST['website_phone']), 
			'company_name'          => $this->filter($_POST['company_name']),
			'operator_licence'      => $this->filter($_POST['operator_licence']),
			'timezone'              => $this->filter($_POST['timezone']),
			'company_address'       => $this->filter($_POST['company_address']),
			'website_email_address' => $this->filter($_POST['website_email_address']),
			'licencing_authority'   => $this->filter($_POST['licencing_authority']),
			'latitude'              => $lat,
			'longitude'             => $lon
		);

        // UPDATE SETTINGS
        $query = 'UPDATE settings SET contact_name = ?, email_address = ?, website_phone = ?, company_name = ?, operator_licence = ?, timezone = ?, company_address = ?, website_email_address = ?, licencing_authority = ?, latitude = ?, longitude = ?';
		$this->update($query, $array_settings);

		// SET UP A SUCCESS MESSAGE
		$this->set_flashdata('Success', '<div class="update-nag">Settings Updated</div>');

		// REDIRECT
		$this->redirect('settings/business-settings');		
	}


	// ============ END GENERAL SETTINGS UPDATE ============ >>>


	// ============ UPDATE LOCAL AREA SETTINGS  ============ >>>

	public function updateLocalAreaSettings($latitude, $longitude)
	{
		$main_area = $this->filter($_POST['main_area']);
		$area2     = $this->filter($_POST['area2']);
		$area3     = $this->filter($_POST['area3']);
		$area4     = $this->filter($_POST['area4']);
		$area5     = $this->filter($_POST['area5']);
		$area6     = $this->filter($_POST['area6']);
		
		// GENERATE SEO FOR EACH AREA
		$meta_keywords_main_area = "$main_area taxi, taxi $main_area, $main_area taxis, $main_area cab, $main_area cabs, cab $main_area, cabs $main_area, taxi to $main_area, cab to $main_area";
		$meta_keywords_area2     = "$area2 taxi, taxi $area2, $area2 taxis, $area2 cab, $area2 cabs, cab $area2, cabs $area2, taxi to $area2, cab to $area2";
		$meta_keywords_area3     = "$area3 taxi, taxi $area3, $area3 taxis, $area3 cab, $area3 cabs, cab $area3, cabs $area3, taxi to $area3, cab to $area3";
		$meta_keywords_area4     = "$area4 taxi, taxi $area4, $area4 taxis, $area4 cab, $area4 cabs, cab $area4, cabs $area4, taxi to $area4, cab to $area4";
		$meta_keywords_area5     = "$area5 taxi, taxi $area5, $area5 taxis, $area5 cab, $area5 cabs, cab $area5, cabs $area5, taxi to $area5, cab to $area5";
		$meta_keywords_area6     = "$area6 taxi, taxi $area6, $area6 taxis, $area6 cab, $area6 cabs, cab $area6, cabs $area6, taxi to $area6, cab to $area6";


        // PUT POST VALUES INTO AN ARRAY
		$array_settings = array(
			'main_area'               => $main_area,
			'area2'                   => $this->filter($_POST['area2']),
			'area3'                   => $this->filter($_POST['area3']),
			'area4'                   => $this->filter($_POST['area4']),
			'area5'                   => $this->filter($_POST['area5']),
			'area6'                   => $this->filter($_POST['area6']),
			'meta_keywords_main_area' => $meta_keywords_main_area,
			'meta_keywords_area2'     => $meta_keywords_area2,
			'meta_keywords_area3'     => $meta_keywords_area3,
			'meta_keywords_area4'     => $meta_keywords_area4,
			'meta_keywords_area5'     => $meta_keywords_area5,
			'meta_keywords_area6'     => $meta_keywords_area6,
			'latitude'                => $latitude,
			'longitude'               => $longitude
		);

		// INSERT SETTINGS INTO THE DATABASE
		$query = 'UPDATE settings SET main_area = ?, area2 = ?, area3 = ?, area4 = ?, area5 = ?, area6 = ?, meta_keywords_main_area = ?, meta_keywords_area2 = ?, meta_keywords_area3 = ?, meta_keywords_area4 = ?, meta_keywords_area5 = ?, meta_keywords_area6 = ?, latitude = ?, longitude = ?';
		$this->update($query, $array_settings);

		// SET UP A SUCCESS MESSAGE
		$this->set_flashdata('Success', '<div class="update-nag">Settings Updated</div>');

		// REDIRECT
		$this->redirect('settings/local-areas');
	}

	// ============ END LOCAL AREA SETTINGS UPDATE ============ >>>



	public function updateHomepageSettings()
	{
		// put all values into an array
		$array_settings = array(
			'homepage_title'                => $this->filter($_POST['homepage_title']),
		    'homepage_subtitle'             => $this->filter($_POST['homepage_subtitle']),
		    'homepage_text'                 => $this->filter($_POST['homepage_text']),
		    'homepage_testimonial'          => $this->filter($_POST['homepage_testimonial']),
		    'homepage_testimonial_author'   => $this->filter($_POST['homepage_testimonial_author']),
		    'homepage_testimonial_2'        => $this->filter($_POST['homepage_testimonial_2']),
		    'homepage_testimonial_author_2' => $this->filter($_POST['homepage_testimonial_author_2']),
		    'banner_1_status'               => $_POST['banner_1_status'],
		    'banner_2_status'               => $_POST['banner_2_status'],
		    'banner_3_status'               => $_POST['banner_3_status'],
		    'banner_4_status'               => $_POST['banner_4_status'],
		    'banner_5_status'               => $_POST['banner_5_status'],
		    'signature'                     => $_POST['signature'],
		    'logo_width'                    => $_POST['logo_width'],
		    'logo_height'                   => $_POST['logo_height'],
		    'header_title'                  => $_POST['header_title'],
		    'header_subtitle'               => $_POST['header_subtitle'],
		    'header_status'                 => $_POST['header_status']   
		);

        $array_free_text = array('free_text' => $_POST['header_freetext']);

        // update settings in the database
		$query = 'UPDATE settings SET free_text = ?';
		$this->update($query, $array_free_text);
        
        // update settings in the database
		$query = 'UPDATE settings_homepage SET homepage_title = ?, homepage_subtitle = ?, homepage_text = ?, homepage_testimonial = ?, homepage_testimonial_author = ?, homepage_testimonial_2 = ?, homepage_testimonial_author_2 = ?, banner_1_status = ?, banner_2_status = ?, banner_3_status = ?, banner_4_status = ?, banner_5_status = ?, signature = ?, logo_width = ?, logo_height = ?, header_title = ?, header_subtitle = ?, header_status = ?';
		$this->update($query, $array_settings);

		// logo
		$file_directory = "../assets/img/logos";

		if($_FILES["logo"]["name"]) 
		{
			move_uploaded_file($_FILES["logo"]["tmp_name"], $file_directory . "/" . $_FILES["logo"]["name"]);

		    // update database banner
		    $logo_array = array(
			    'logo' => 'assets/img/logos/' . $_FILES['logo']['name']
		    );
		
		    $this->update('UPDATE settings_homepage SET logo = ?', $logo_array);
		}

		// set up a success message
		$this->set_flashdata('Success', '<div class="update-nag">Homepage Settings Updated</div>');

		return $this;
	}



	public function uploadBanners()
	{
		$file_directory = "../assets/img/banners";

		if($_FILES["file1"]["name"]) 
		{
			move_uploaded_file($_FILES["file1"]["tmp_name"], $file_directory . "/" . $_FILES["file1"]["name"]);

		    // update database banner
		    $banners_array = array(
			    'banner_1' => 'assets/img/banners/' . $_FILES['file1']['name']
		    );
		
		    $this->update('UPDATE settings_homepage SET banner_1 = ?', $banners_array);
		}

		if($_FILES["file2"]["name"]) 
		{
			move_uploaded_file($_FILES["file2"]["tmp_name"], $file_directory . "/" . $_FILES["file2"]["name"]);

		    // update database banner
		    $banners_array = array(
			    'banner_2' => 'assets/img/banners/' . $_FILES['file2']['name']
		    );
		
		    $this->update('UPDATE settings_homepage SET banner_2 = ?', $banners_array);
		}

		if($_FILES["file3"]["name"]) 
		{
			move_uploaded_file($_FILES["file3"]["tmp_name"], $file_directory . "/" . $_FILES["file3"]["name"]);

		    // update database banner
		    $banners_array = array(
			    'banner_3' => 'assets/img/banners/' . $_FILES['file3']['name']
		    );
		
		    $this->update('UPDATE settings_homepage SET banner_3 = ?', $banners_array);
		}

		if($_FILES["file4"]["name"]) 
		{
			move_uploaded_file($_FILES["file4"]["tmp_name"], $file_directory . "/" . $_FILES["file4"]["name"]);

		    // update database banner
		    $banners_array = array(
			    'banner_4' => 'assets/img/banners/' . $_FILES['file4']['name']
		    );
		
		    $this->update('UPDATE settings_homepage SET banner_4 = ?', $banners_array);
		}

		if($_FILES["file5"]["name"]) 
		{
			move_uploaded_file($_FILES["file5"]["tmp_name"], $file_directory . "/" . $_FILES["file5"]["name"]);

		    // update database banner
		    $banners_array = array(
			    'banner_5' => 'assets/img/banners/' . $_FILES['file5']['name']
		    );
		
		    $this->update('UPDATE settings_homepage SET banner_5 = ?', $banners_array);
		}

        // static images
        $file_directory = "../assets/img/sidebar";
		
		if($_FILES["image1"]["name"]) 
		{
			move_uploaded_file($_FILES["image1"]["tmp_name"], $file_directory . "/" . $_FILES["image1"]["name"]);

		    // update database banner
		    $sidebar_array = array(
			    'image1' => 'assets/img/sidebar/' . $_FILES['image1']['name']
		    );
		
		    $this->update('UPDATE settings_homepage SET image_1 = ?', $sidebar_array);
		}

	    if($_FILES["image2"]["name"]) 
		{
			move_uploaded_file($_FILES["image2"]["tmp_name"], $file_directory . "/" . $_FILES["image2"]["name"]);

		    // update database banner
		    $sidebar_array = array(
			    'image1' => 'assets/img/sidebar/' . $_FILES['image2']['name']
		    );
		
		    $this->update('UPDATE settings_homepage SET image_2 = ?', $sidebar_array);
		}

		// redirect
		$this->redirect('settings/homepage');
			
	}


	// ============ UPDATE METER SETTINGS  ============ >>>

	public function updateMeterRates()
	{
		// put all values into an array
		$array_settings = array(
			'minimum_booking_notice'         => $this->filter($_POST['minimum_booking_notice']),
		    'day_rate_hour_start'            => $this->filter($_POST['day_rate_hour_start']),
		    'day_rate_hour_end'              => $this->filter($_POST['day_rate_hour_end']),
		    'standard_day_rate'              => $this->filter($_POST['standard_day_rate']),
		    'night_rate_uplift'              => $this->filter($_POST['night_rate_uplift']),
		    'sunday_rate_uplift'             => $this->filter($_POST['sunday_rate_uplift']),
		    'bank_holiday_uplift'            => $this->filter($_POST['bank_holiday_uplift']),
		    'apply_night_rate_uplift'        => $this->filter($_POST['apply_night_rate_uplift']),
		    'apply_sunday_rate_uplift'       => $this->filter($_POST['apply_sunday_rate_uplift']),
		    'apply_bank_holiday_rate_uplift' => $this->filter($_POST['apply_bank_holiday_rate_uplift']),
		    'minimum_fare_amount'            => $this->filter($_POST['minimum_fare_amount']),
		    'minimum_fare_miles'             => $this->filter($_POST['minimum_fare_miles']),
		    'long_distance_fare_amount'      => $this->filter($_POST['long_distance_fare_amount']),
		    'long_distance_fare_miles'       => $this->filter($_POST['long_distance_fare_miles']),
		    'meet_and_greet'                 => $this->filter($_POST['meet_and_greet']),
		    'pound_or_percentage'            => $this->filter($_POST['pound_or_percentage']),
		    'sunday_pound_or_percentage'     => $this->filter($_POST['sunday_pound_or_percentage']),
		    'bank_pound_or_percentage'       => $this->filter($_POST['bank_pound_or_percentage'])
		);
        
        // update settings in the database
		$query = 'UPDATE rates SET minimum_booking_notice = ?, day_rate_hour_start = ?, day_rate_hour_end = ?, standard_day_rate = ?, night_rate_uplift = ?, sunday_rate_uplift = ?, bank_holiday_uplift = ?, apply_night_rate_uplift = ?, apply_sunday_rate_uplift = ?, apply_bank_holiday_rate_uplift = ?, minimum_fare_amount = ?, minimum_fare_miles = ?, long_distance_fare_amount = ?, long_distance_fare_miles = ?, meet_and_greet = ?, night_rate_uplift_units = ?, sunday_rate_uplift_units = ?, bank_holiday_uplift_units = ?';
		$this->update($query, $array_settings);

		// set up a success message
		$this->set_flashdata('Success', '<div class="update-nag">Meter Rates Updated</div>');

		// redirect
		$this->redirect('settings/meter-rates');
	}

	// ============ UPDATE METER RATE SETTINGS UPDATE  ============ >>>



	public function updateFixedPrices($fixed_lat_1, $fixed_lon_1, $fixed_lat_2, $fixed_lon_2, $fixed_lat_3, $fixed_lon_3, $fixed_lat_4, $fixed_lon_4, $fixed_lat_5, $fixed_lon_5, $fixed_lat_6, $fixed_lon_6, $fixed_lat_7, $fixed_lon_7, $fixed_lat_8, $fixed_lon_8, $fixed_lat_9, $fixed_lon_9, $fixed_lat_10, $fixed_lon_10, $fixed_lat_11, $fixed_lon_11, $fixed_lat_12, $fixed_lon_12)
	{
		// upload background images
		$this->upload_file('../assets/img/fixed', $_FILES['file1']['tmp_name'], $_FILES['file1']['name']);
		$this->upload_file('../assets/img/fixed', $_FILES['file2']['tmp_name'], $_FILES['file2']['name']);
		$this->upload_file('../assets/img/fixed', $_FILES['file3']['tmp_name'], $_FILES['file3']['name']);
		$this->upload_file('../assets/img/fixed', $_FILES['file4']['tmp_name'], $_FILES['file4']['name']);
		$this->upload_file('../assets/img/fixed', $_FILES['file5']['tmp_name'], $_FILES['file5']['name']);
		$this->upload_file('../assets/img/fixed', $_FILES['file6']['tmp_name'], $_FILES['file6']['name']);
		$this->upload_file('../assets/img/fixed', $_FILES['file7']['tmp_name'], $_FILES['file7']['name']);
		$this->upload_file('../assets/img/fixed', $_FILES['file8']['tmp_name'], $_FILES['file8']['name']);
		$this->upload_file('../assets/img/fixed', $_FILES['file9']['tmp_name'], $_FILES['file9']['name']);
		$this->upload_file('../assets/img/fixed', $_FILES['file10']['tmp_name'], $_FILES['file10']['name']);
		$this->upload_file('../assets/img/fixed', $_FILES['file11']['tmp_name'], $_FILES['file11']['name']);
		$this->upload_file('../assets/img/fixed', $_FILES['file12']['tmp_name'], $_FILES['file12']['name']);

		if($_FILES['file1']['name'])
		{
			$bg_array = array(
				"image" => "assets/img/fixed/" . $_FILES['file1']['name'],
			);
			$this->update('UPDATE fixed_prices SET fixed_price_1_img = ?', $bg_array);
		}

		if($_FILES['file2']['name'])
		{
			$bg_array = array(
				"image" => "assets/img/fixed/" . $_FILES['file2']['name'],
			);
			$this->update('UPDATE fixed_prices SET fixed_price_2_img = ?', $bg_array);
		}

		if($_FILES['file3']['name'])
		{
			$bg_array = array(
				"image" => "assets/img/fixed/" . $_FILES['file3']['name'],
			);
			$this->update('UPDATE fixed_prices SET fixed_price_3_img = ?', $bg_array);
		}

		if($_FILES['file4']['name'])
		{
			$bg_array = array(
				"image" => "assets/img/fixed/" . $_FILES['file4']['name'],
			);
			$this->update('UPDATE fixed_prices SET fixed_price_4_img = ?', $bg_array);
		}

		if($_FILES['file5']['name'])
		{
			$bg_array = array(
				"image" => "assets/img/fixed/" . $_FILES['file5']['name'],
			);
			$this->update('UPDATE fixed_prices SET fixed_price_5_img = ?', $bg_array);
		}

		if($_FILES['file6']['name'])
		{
			$bg_array = array(
				"image" => "assets/img/fixed/" . $_FILES['file6']['name'],
			);
			$this->update('UPDATE fixed_prices SET fixed_price_6_img = ?', $bg_array);
		}

		if($_FILES['file7']['name'])
		{
			$bg_array = array(
				"image" => "assets/img/fixed/" . $_FILES['file7']['name'],
			);
			$this->update('UPDATE fixed_prices SET fixed_price_7_img = ?', $bg_array);
		}

		if($_FILES['file8']['name'])
		{
			$bg_array = array(
				"image" => "assets/img/fixed/" . $_FILES['file8']['name'],
			);
			$this->update('UPDATE fixed_prices SET fixed_price_8_img = ?', $bg_array);
		}

		if($_FILES['file9']['name'])
		{
			$bg_array = array(
				"image" => "assets/img/fixed/" . $_FILES['file9']['name'],
			);
			$this->update('UPDATE fixed_prices SET fixed_price_9_img = ?', $bg_array);
		}
		
		if($_FILES['file10']['name'])
		{
			$bg_array = array(
				"image" => "assets/img/fixed/" . $_FILES['file10']['name'],
			);
			$this->update('UPDATE fixed_prices SET fixed_price_10_img = ?', $bg_array);
		}

		if($_FILES['file11']['name'])
		{
			$bg_array = array(
				"image" => "assets/img/fixed/" . $_FILES['file11']['name'],
			);
			$this->update('UPDATE fixed_prices SET fixed_price_11_img = ?', $bg_array);
		}

		if($_FILES['file12']['name'])
		{
			$bg_array = array(
				"image" => "assets/img/fixed/" . $_FILES['file12']['name'],
			);
			$this->update('UPDATE fixed_prices SET fixed_price_12_img = ?', $bg_array);
		}

		// put all values into an array
		$array_settings = array(
			$this->filter($_POST['fixed_price_intro']),
			$this->filter($_POST['fixed_location_1']),
			$this->filter($_POST['fixed_location_2']),
			$this->filter($_POST['fixed_location_3']),
			$this->filter($_POST['fixed_location_4']),
			$this->filter($_POST['fixed_location_5']),
			$this->filter($_POST['fixed_location_6']),
			$this->filter($_POST['fixed_location_7']),
			$this->filter($_POST['fixed_location_8']),
			$this->filter($_POST['fixed_location_9']),
			$this->filter($_POST['fixed_location_10']),
			$this->filter($_POST['fixed_location_11']),
			$this->filter($_POST['fixed_location_12']),
			$this->filter($_POST['fixed_price_1']),
			$this->filter($_POST['fixed_price_2']),
			$this->filter($_POST['fixed_price_3']),
			$this->filter($_POST['fixed_price_4']),
			$this->filter($_POST['fixed_price_5']),
			$this->filter($_POST['fixed_price_6']),
			$this->filter($_POST['fixed_price_7']),
			$this->filter($_POST['fixed_price_8']),
			$this->filter($_POST['fixed_price_9']),
			$this->filter($_POST['fixed_price_10']),
			$this->filter($_POST['fixed_price_11']),
			$this->filter($_POST['fixed_price_12']),
			$fixed_lat_1,
			$fixed_lon_1,
			$fixed_lat_2,
			$fixed_lon_2,
			$fixed_lat_3,
			$fixed_lon_3,
			$fixed_lat_4,
			$fixed_lon_4,
			$fixed_lat_5,
			$fixed_lon_5,
			$fixed_lat_6,
			$fixed_lon_6,
			$fixed_lat_7,
			$fixed_lon_7,
			$fixed_lat_8,
			$fixed_lon_8,
			$fixed_lat_9,
			$fixed_lon_9,
			$fixed_lat_10,
			$fixed_lon_10,
			$fixed_lat_11,
			$fixed_lon_11,
			$fixed_lat_12,
			$fixed_lon_12,
			$_POST['fixed_1_status'],
			$_POST['fixed_2_status'],
			$_POST['fixed_3_status'],
			$_POST['fixed_4_status'],
			$_POST['fixed_5_status'],
			$_POST['fixed_6_status'],
			$_POST['fixed_7_status'],
			$_POST['fixed_8_status'],
			$_POST['fixed_9_status'],
			$_POST['fixed_10_status'],
			$_POST['fixed_11_status'],
			$_POST['fixed_12_status'],
			$_POST['free_text_1'],
			$_POST['free_text_2'],
			$_POST['free_text_3'],
			$_POST['free_text_4'],
			$_POST['free_text_5'],
			$_POST['free_text_6'],
			$_POST['free_text_7'],
			$_POST['free_text_8'],
			$_POST['free_text_9'],
			$_POST['free_text_10'],
			$_POST['free_text_11'],
			$_POST['free_text_12'],
		);
        
        // update settings in the database
		$query = 'UPDATE fixed_prices SET fixed_price_intro = ?, fixed_location_1 = ?, fixed_location_2 = ?, fixed_location_3 = ?, fixed_location_4 = ?, fixed_location_5 = ?, fixed_location_6 = ?, fixed_location_7 = ?, fixed_location_8 = ?, fixed_location_9 = ?, fixed_location_10 = ?, fixed_location_11 = ?, fixed_location_12 = ?, fixed_price_1 = ?, fixed_price_2 = ?, fixed_price_3 = ?, fixed_price_4 = ?, fixed_price_5 = ?, fixed_price_6 = ?, fixed_price_7 = ?, fixed_price_8 = ?, fixed_price_9 = ?, fixed_price_10 = ?, fixed_price_11 = ?, fixed_price_12 = ?, fixed_lat_1 = ?, fixed_lon_1 = ?, fixed_lat_2 = ?, fixed_lon_2 = ?, fixed_lat_3 = ?, fixed_lon_3 = ?, fixed_lat_4 = ?, fixed_lon_4 = ?, fixed_lat_5 = ?, fixed_lon_5 = ?, fixed_lat_6 = ?, fixed_lon_6 = ?, fixed_lat_7 = ?, fixed_lon_7 = ?, fixed_lat_8 = ?, fixed_lon_8 = ?, fixed_lat_9 = ?, fixed_lon_9 = ?, fixed_lat_10 = ?, fixed_lon_10 = ?, fixed_lat_11 = ?, fixed_lon_11 = ?, fixed_lat_12 = ?, fixed_lon_12 = ?, fixed_1_status = ?, fixed_2_status = ?, fixed_3_status = ?, fixed_4_status = ?, fixed_5_status = ?, fixed_6_status = ?, fixed_7_status = ?, fixed_8_status = ?, fixed_9_status = ?, fixed_10_status = ?, fixed_11_status = ?, fixed_12_status = ?, free_text_1 = ?, free_text_2 = ?, free_text_3 = ?, free_text_4 = ?, free_text_5 = ?, free_text_6 = ?, free_text_7 = ?, free_text_8 = ?, free_text_9 = ?, free_text_10 = ?, free_text_11 = ?, free_text_12 = ?';
		$this->update($query, $array_settings);

		// set up a success message
		$this->set_flashdata('Success', '<div class="update-nag">Fixed Prices Updated</div>');

		// redirect
		$this->redirect('settings/fixed-prices');
	}


	public function updateSeo()
	{
		$array_settings = array(
			$this->filter($_POST['meta_title']),
			$this->filter($_POST['meta_description']),
			$this->filter($_POST['meta_keywords']),
			$this->filter($_POST['meta_title_booking']),
			$this->filter($_POST['meta_description_booking']),
			$this->filter($_POST['meta_keywords_booking']),
			$this->filter($_POST['meta_title_other']),
			$this->filter($_POST['meta_description_other']),
			$this->filter($_POST['meta_keywords_other']),
		    $this->filter($_POST['meta_title_about_us']),
			$this->filter($_POST['meta_description_about_us']),
			$this->filter($_POST['meta_keywords_about_us']),
		    $this->filter($_POST['meta_title_contact_us']),
			$this->filter($_POST['meta_description_contact_us']),
			$this->filter($_POST['meta_keywords_contact_us']),
		    $this->filter($_POST['meta_title_faq']),
			$this->filter($_POST['meta_description_faq']),
			$this->filter($_POST['meta_keywords_faq'])
		);

		$this->update('UPDATE seo set meta_title = ?, meta_description = ?, meta_keywords = ?, meta_title_booking = ?, meta_description_booking = ?, meta_keywords_booking = ?, meta_title_other = ?, meta_description_other = ?, meta_keywords_other = ?, meta_title_about_us = ?, meta_description_about_us = ?, meta_keywords_about_us = ?, meta_title_contact_us = ?, meta_description_contact_us = ?, meta_keywords_contact_us = ?, meta_title_faq = ?, meta_description_faq = ?, meta_keywords_faq = ?', $array_settings);

		$main_area = $this->filter($_POST['main_area']);
		$area2     = $this->filter($_POST['area2']);
		$area3     = $this->filter($_POST['area3']);
		$area4     = $this->filter($_POST['area4']);
		$area5     = $this->filter($_POST['area5']);
		$area6     = $this->filter($_POST['area6']);
		
		// GENERATE SEO FOR EACH AREA
		$meta_keywords_main_area = "$main_area taxi, taxi $main_area, $main_area taxis, $main_area cab, $main_area cabs, cab $main_area, cabs $main_area, taxi to $main_area, cab to $main_area";
		$meta_keywords_area2     = "$area2 taxi, taxi $area2, $area2 taxis, $area2 cab, $area2 cabs, cab $area2, cabs $area2, taxi to $area2, cab to $area2";
		$meta_keywords_area3     = "$area3 taxi, taxi $area3, $area3 taxis, $area3 cab, $area3 cabs, cab $area3, cabs $area3, taxi to $area3, cab to $area3";
		$meta_keywords_area4     = "$area4 taxi, taxi $area4, $area4 taxis, $area4 cab, $area4 cabs, cab $area4, cabs $area4, taxi to $area4, cab to $area4";
		$meta_keywords_area5     = "$area5 taxi, taxi $area5, $area5 taxis, $area5 cab, $area5 cabs, cab $area5, cabs $area5, taxi to $area5, cab to $area5";
		$meta_keywords_area6     = "$area6 taxi, taxi $area6, $area6 taxis, $area6 cab, $area6 cabs, cab $area6, cabs $area6, taxi to $area6, cab to $area6";


        // PUT POST VALUES INTO AN ARRAY
		$array_settings = array(
			'main_area'               => $main_area,
			'area2'                   => $this->filter($_POST['area2']),
			'area3'                   => $this->filter($_POST['area3']),
			'area4'                   => $this->filter($_POST['area4']),
			'area5'                   => $this->filter($_POST['area5']),
			'area6'                   => $this->filter($_POST['area6']),
			'meta_keywords_main_area' => $meta_keywords_main_area,
			'meta_keywords_area2'     => $meta_keywords_area2,
			'meta_keywords_area3'     => $meta_keywords_area3,
			'meta_keywords_area4'     => $meta_keywords_area4,
			'meta_keywords_area5'     => $meta_keywords_area5,
			'meta_keywords_area6'     => $meta_keywords_area6,
			'latitude'                => $latitude,
			'longitude'               => $longitude
		);

		// INSERT SETTINGS INTO THE DATABASE
		$query = 'UPDATE settings SET main_area = ?, area2 = ?, area3 = ?, area4 = ?, area5 = ?, area6 = ?, meta_keywords_main_area = ?, meta_keywords_area2 = ?, meta_keywords_area3 = ?, meta_keywords_area4 = ?, meta_keywords_area5 = ?, meta_keywords_area6 = ?, latitude = ?, longitude = ?';
		$this->update($query, $array_settings);

		$this->set_flashdata('Success', '<div class="update-nag">Settings Updated</div>');

		$this->redirect('settings/SEO');
	}


	public function updateOtherPages()
	{
		// update FAQs
		$array_settings = array(
			$this->filter($_POST['faqq1']),
			$this->filter($_POST['faqq2']),
			$this->filter($_POST['faqq3']),
			$this->filter($_POST['faqq4']),
			$this->filter($_POST['faqq5']),
			$this->filter($_POST['faqq6']),
			$this->filter($_POST['faqq7']),
			$this->filter($_POST['faqq8']),
			$this->filter($_POST['faqq9']),
			$this->filter($_POST['faqq10']),
			$this->filter(nl2br($_POST['faqa1'])),
			$this->filter(nl2br($_POST['faqa2'])),
			$this->filter(nl2br($_POST['faqa3'])),
			$this->filter(nl2br($_POST['faqa4'])),
			$this->filter(nl2br($_POST['faqa5'])),
			$this->filter(nl2br($_POST['faqa6'])),
			$this->filter(nl2br($_POST['faqa7'])),
			$this->filter(nl2br($_POST['faqa8'])),
			$this->filter(nl2br($_POST['faqa9'])),
			$this->filter(nl2br($_POST['faqa10']))
		);

		$this->update('UPDATE faq SET faqq1 = ?, faqq2 = ?, faqq3 = ?, faqq4 = ?, faqq5 = ?, faqq6 = ?, faqq7 = ?, faqq8 = ?, faqq9 = ?, faqq10 = ?, faqa1 = ?, faqa2 = ?, faqa3 = ?, faqa4 = ?, faqa5 = ?, faqa6 = ?, faqa7 = ?, faqa8 = ?, faqa9 = ?, faqa10 = ?', $array_settings);


		// update footer
		$array_footer = array(
			$this->filter($_POST['footer_about_us_text']),
			$this->filter(nl2br($_POST['footer_stay_in_touch_text'])),
			$this->filter(nl2br($_POST['contact_get_in_touch_text'])),
			$_POST['about_us_text'],
			$_POST['terms_text']
		);

		$this->update('UPDATE other_pages SET footer_about_us_text = ?, footer_stay_in_touch_text = ?, contact_get_in_touch_text = ?, about_us_text = ?, terms_text = ?', $array_footer);

		$file_directory = "../assets/img/footer";
		if($_FILES["file1"]["name"]) 
		{
			move_uploaded_file($_FILES["file1"]["tmp_name"], $file_directory . "/" . $_FILES["file1"]["name"]);

		    // update database banner
		    $image_array = array(
			    'banner_1' => 'assets/img/footer/' . $_FILES['file1']['name']
		    );
		
		    $this->update('UPDATE other_pages SET footer_fully_licenced_service_image = ?', $image_array);
		}

		// about us image
		$file_directory = "../assets/img/about";

		if($_FILES["file_about"]["name"]) 
		{
			move_uploaded_file($_FILES["file_about"]["tmp_name"], $file_directory . "/" . $_FILES["file_about"]["name"]);

		    // update database banner
		    $about_array = array(
			    'about_image' => 'assets/img/about/' . $_FILES['file_about']['name']
		    );
		
		    $this->update('UPDATE other_pages SET about_us_image = ?', $about_array);
		}


		// finish and redirect
		$this->set_flashdata('Success', '<div class="update-nag">Settings Updated</div>');
		$this->redirect('settings/other-pages');
	}


	public function updateSaloon()
	{
		$array_vehicles = array(
			$this->filter($_POST['saloon_uplift_percentage']),
			$this->filter($_POST['saloon_seats']),
			$this->filter($_POST['saloon_large_bags']),
			$this->filter($_POST['saloon_small_bags']),
			$this->filter($_POST['saloon_status'])
		);

		$this->update('UPDATE vehicles SET uplift = ?, seats = ?, large_bags = ?, small_bags = ?, status = ? WHERE type = "Saloon"', $array_vehicles);

		return $this;
	}

	public function updateEstate()
	{
		$array_vehicles = array(
			$this->filter($_POST['estate_uplift_percentage']),
			$this->filter($_POST['estate_seats']),
			$this->filter($_POST['estate_large_bags']),
			$this->filter($_POST['estate_small_bags']),
			$this->filter($_POST['estate_status'])
		);

		$this->update('UPDATE vehicles SET uplift = ?, seats = ?, large_bags = ?, small_bags = ?, status = ? WHERE type = "Estate"', $array_vehicles);

		return $this;
	}


	public function updateExecutive()
	{
		$array_vehicles = array(
			$this->filter($_POST['executive_uplift_percentage']),
			$this->filter($_POST['executive_seats']),
			$this->filter($_POST['executive_large_bags']),
			$this->filter($_POST['executive_small_bags']),
			$this->filter($_POST['executive_status'])
		);

		$this->update('UPDATE vehicles SET uplift = ?, seats = ?, large_bags = ?, small_bags = ?, status = ? WHERE type = "Executive"', $array_vehicles);

		return $this;

	}


	public function updateMPV()
	{
		$array_vehicles = array(
			$this->filter($_POST['mpv_uplift_percentage']),
			$this->filter($_POST['mpv_seats']),
			$this->filter($_POST['mpv_large_bags']),
			$this->filter($_POST['mpv_small_bags']),
			$this->filter($_POST['mpv_status'])
		);

		$this->update('UPDATE vehicles SET uplift = ?, seats = ?, large_bags = ?, small_bags = ?, status = ? WHERE type = "MPV"', $array_vehicles);

		return $this;

	}


	public function updateMinibus()
	{
		$array_vehicles = array(
			$this->filter($_POST['minibus_uplift_percentage']),
			$this->filter($_POST['minibus_seats']),
			$this->filter($_POST['minibus_large_bags']),
			$this->filter($_POST['minibus_small_bags']),
			$this->filter($_POST['minibus_status'])
		);

		$this->update('UPDATE vehicles SET uplift = ?, seats = ?, large_bags = ?, small_bags = ?, status = ? WHERE type = "Minibus"', $array_vehicles);

		return $this;
	}


	public function updateMinicoach()
	{
		$array_vehicles = array(
			$this->filter($_POST['minicoach_uplift_percentage']),
			$this->filter($_POST['minicoach_seats']),
			$this->filter($_POST['minicoach_large_bags']),
			$this->filter($_POST['minicoach_small_bags']),
			$this->filter($_POST['minicoach_status'])
		);

		$this->update('UPDATE vehicles SET uplift = ?, seats = ?, large_bags = ?, small_bags = ?, status = ? WHERE type = "Minicoach"', $array_vehicles);

		// finish and redirect
		$this->set_flashdata('Success', '<div class="update-nag">Settings Updated</div>');
		$this->redirect('settings/vehicles-and-uplifts');
	}


	public function updatePaymentOptions()
	{
		$array_payment_options = array(
			'fixed_booking_fee'          => $this->filter($_POST['fixed_booking_fee']),
			'percentage_credit_card_fee' => $this->filter($_POST['percentage_credit_card_fee']),
			'pay_on_day'                 => $_POST['pay_on_day'],
			//'test_secret_key'            => $_POST['test_secret_key'],
			//'test_publishable_key'       => $_POST['test_publishable_key']
			'paypal_account'             => $this->filter($_POST['paypal_account']),
			'paypal_status'              => $_POST['paypal_status']
		);

		$this->update('UPDATE payment_options SET fixed_booking_fee = ?, percentage_credit_card_fee = ?, pay_on_day = ?, paypal_account = ?, paypal_status = ?', $array_payment_options);

		// finish and redirect
		$this->set_flashdata('Success', '<div class="update-nag">Settings Updated</div>');
		$this->redirect('settings/payment-options');
	}


	public function updateSocialMedia()
	{
		$count = 1;

		// update URL
		foreach($_POST['url'] as $url)
		{
			$this->update("UPDATE social_media SET url = '$url' WHERE id = $count");
			$count++; 
		}


		$count = 1;

        // update status
		foreach($_POST['status'] as $status)
		{
			$this->update("UPDATE social_media SET status = '$status' WHERE id = $count");
			$count++; 
		}

		// update google analytics
		$analytics = array(
			'google_analytics_code' => stripslashes($_POST['google_analytics_code']),
			'gapi_id'               => $_POST['gapi_id'],
			'gapi_email'            => $_POST['gapi_email'],
			'gapi_password'         => $_POST['gapi_password']
		);
		$this->update('UPDATE analytics SET google_analytics_code = ?, gapi_id = ?, gapi_email = ?, gapi_password = ?', $analytics);

        // set success message and redirect
		$this->set_flashdata('Success', '<div class="update-nag">Settings Updated</div>');
		$this->redirect('website-integration');
	}



	public function getSettings()
	{
		// GET ALL SETTINGS FROM THE DATABASE
		$query = 'SELECT * FROM settings';
		$this->select($query);
		
		return $this->fetch();
	}


	public function getHomepageSettings()
	{
		// get homepage settings and content
		$query = 'SELECT * FROM settings_homepage';
		$this->select($query);

		return $this->fetch();
	}


	public function getOtherPages()
	{
		// get homepage settings and content
		$query = 'SELECT * FROM other_pages';
		$this->select($query);

		return $this->fetch();
	}
	


}