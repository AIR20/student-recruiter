<?php

class UploadController extends BaseController{

	# POST /upload
	public function upload() {
		require VENDOR_PATH.'Upload/Autoloader.php';
		$storage = new \Upload\Storage\FileSystem('upload');
		$file = new \Upload\File('file', $storage);

		// Optionally you can rename the file on upload
		$new_filename = uniqid();
		$file->setName($new_filename);

		// Validate file upload
		// MimeType List => http://www.webmaster-toolkit.com/mime-types.shtml
		$file->addValidations(array(
			new \Upload\Validation\Mimetype(array('image/png', 'image/gif', 'image/jpeg')),
			new \Upload\Validation\Size('2M')
		));

		// Access data about the file that has been uploaded
		$data = array(
			'name'       => $file->getNameWithExtension(),
			'url'    => $this->baseurl().'/upload/'.$file->getNameWithExtension(),
			'extension'  => $file->getExtension(),
			'mime'       => $file->getMimetype(),
			'size'       => $file->getSize(),
			'dimensions' => $file->getDimensions()
		);

		// Try to upload file
		try {
			// Success!
			$file->upload();
			$this->app->response->headers->set('Content-Type', 'application/json');
			echo json_encode($data);
		} catch (\Exception $e) {
			// Fail!
			$errors = $file->getErrors();
			$this->app->response->setStatus(400);
			echo $errors[0];
		}
	}
}