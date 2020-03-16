# admin-panel

Here this is the Vali Admin Panel.

1. You just need to download the source code.
2. This is also including SQL(admin-panel->panel.sql) file which we can import to the MYSQL database.
3. Then need to change the settings in database.php (admin-panel->application->config->database.php) to connect with DATABASE.
4. Last thing is we just need to change the base_url in config.php (admin-panel->application->config->config.php).

file upload

$config = [
			        'upload_path'   => './assets/printingRequest',
			        'allowed_types' => 'jpg|JPG|gif|GIF|png|PNG|jpeg|JPEG|AVI|avi|WMV|wmv|MOV|mov|MP4|mp4|mp3|MP3',
			        'max_size'      => '204800',
			    ];

			    $this->load->library('upload', $config);
		        if(!empty($_FILES['printing_prior']['name'])) {
		            $this->upload->do_upload('printing_prior');
		            $file_data = $this->upload->data(); // To Upload the image
		            $file_name = $file_data['raw_name'] . $file_data['file_ext'];
		            $data['printing_prior'] = $file_name; // making file path+name
		        }
https://phppot.com/php/php-ajax-image-upload/
