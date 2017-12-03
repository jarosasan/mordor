<?php
	/**
	 * Created by PhpStorm.
	 * User: jaroslavlomecki
	 * Date: 11/27/17
	 * Time: 9:42 AM
	 */
	
	use uFrame\Controller;
	
	class UserPosts extends Controller {
		
		public function index()
		{
			$this -> myList();
		}
		
		public function myList()
		{
			// show all blog records
			
			$perPage = 20;
			$user    = $_SESSION['username'];
			
			$blogModel = $this -> model( "BlogModel" );
			$count     = $blogModel -> getUserPostCount( $user );
			
			$totalPages    = ceil( $count[0]['count'] / $perPage );
			$data['total'] = $totalPages;
			if ( isset( $_GET['page'] ) ) {
				$page = $_GET['page'];
			} else {
				$page = 1;
			}
			$data['page'] = $page;
			
			if ( $page ) {
				$data['start'] = ( $page - 1 ) * $perPage;
			} else {
				$data['start'] = 0;
			}
			$data['co']       = $count[0]['count'];
			$data['perPage']  = $perPage;
			$data['postList'] = $blogModel -> getUserPosts( $user, $data['start'], $perPage );
			$data['index']    = "index?";
			$this -> view( "blog/myList", $data );
			
		}
		//Remove post from Db.
		public function removePost()
		{
			$id = $_GET['id'];
			$adminModel = $this -> model( "BlogModel" );
			$images = $adminModel-> getSingle($id);
			$gall = preg_split( '~/~', $images['image']);
			$gal = array_shift($gall);
			$target_dir  = $_SERVER['DOCUMENT_ROOT'] . CONFIG['site_path'] . "/assets/image/";
			foreach ($gall as $i){;
				unlink($target_dir.$i);
			}
			$adminModel -> remove( $id );
			$this -> index();

		}
		
		public function removeFile()
		{
			$id = $_GET['id'];
			$imgR = $_GET['img'];
			
			$target_dir  = $_SERVER['DOCUMENT_ROOT'] . CONFIG['site_path'] . "/assets/image/";;
			$adminModel = $this -> model( "BlogModel" );
			$images = $adminModel-> getSingle($id);
			$gall = preg_split( '~/~', $images['image']);
			array_shift($gall);
			$file = "";
			foreach ($gall as $i){
				if($i !== $imgR){
					$file .= "/".$i;
				}
			}
			unlink($target_dir.$imgR);
			$adminModel = $this -> model( "BlogModel" );
			$adminModel-> updateImage($id, $file);
			
			$this->editPost($id);
			
			
		}
		
		public function addPost()
		{
			$data = [];
			$this -> view( "blog/myAddPost", $data );
		}
		// Post add to Db
		public function savePost()
		{
			if ( isset( $_POST) ) {
				if ( $_POST['title'] === "" ) {
					$data['error'] = "Please write the title of the article";
					$this -> view( "blog/myAddPost", $data );
				} elseif ( $_POST['body'] === "" ) {
					$data['error'] = "Please write article";
					$this -> view( "blog/myAddPost", $data );
				} elseif ( empty($_FILES)) {
					$to = $this -> model( "BlogModel" );
					$to -> savePost( $_SESSION['username'], $_POST, null );
					$data['title']= $_POST['title'];
					$data['body']= $_POST['body'];
					$this -> view( "blog/myAddPost", $data );
				}else {
					$file = "";
					for ( $i = 0; $i < count( $_FILES['image']['name'] ); $i ++ ) {
						$file_tmp  = $_FILES['image']['tmp_name'][ $i ];
						$file_name = $_FILES['image']['name'][ $i ];
						$file_size = $_FILES['image']['size'][ $i ];
						
						// Check file size
						if ( $file_size > 3072000 ) {
							$data['error'] = 'File size must be less than 3 MB';
							$this -> view( "blog/myAddPost", $data );
						}
						//Check file extensions
						$extensions = [ "jpeg", "jpg", "png" ];
						$file_ext = explode( '.', $_FILES['image']['name'][ $i ] );
						$file_ext = end( $file_ext );
						$file_ext = strtolower( $file_ext );
						if ( in_array( $file_ext, $extensions ) === false ) {
							$data['error'] = "File not image.";
							$this -> view( "blog/myAddPost", $data );
						}
						$file .= "/".date( 'Y-m-d-H-i-s' ) . '-'.$file_name ;
						
						//move file to directory
						$target_dir  = $_SERVER['DOCUMENT_ROOT'] . CONFIG['site_path'] . "/assets/image/";
						$target_file = $target_dir . date( 'Y-m-d-H-i-s' ) . '-' . basename( $file_name );
						if ( move_uploaded_file( $file_tmp, $target_file ) ) {
							$data['error'] = "The file " . basename( $file_name ) . " has been uploaded.";
							$this -> view( "blog/myAddPost", $data );
						} else {
							$data['error'] = "Sorry, your file was not uploaded.";
							$this -> view( "blog/myAddPost", $data );
						}
					}
					// Save to Db
					$to = $this -> model( "BlogModel" );
					$to -> savePost( $_SESSION['username'], $_POST, $file );
					$data['title']= $_POST['title'];
					$data['body']= $_POST['body'];
					$data['error'] = 'Your post has been saved.';
					$this -> view( "blog/myAddPost", $data );
				}
			}
		}
		

		
		//Edit post
		Public function editPost()
		{
			$id = $_GET['id'];
			$adminModel = $this -> model( "BlogModel" );
			$data = $adminModel-> getSingle($id);
			
			$this -> view( "blog/myUpdatePost", $data );
		
		}
		
		//Update post
		Public function updatePost()
		{
			$data = $_POST;
			$id = $_GET['id'];
			$data['id'] = $id;
			$to = $this -> model( "BlogModel" );
			$d = $to->getSingle($id);
			$data['image'] = $d['image'];
			
 		
//		print_r($_POST);
//		print_r($_FILES);
//		print_r($data);
//		die();
			if ( isset( $_POST) ) {
				if ( $_POST['title'] === "" ) {
					$data['error'] = "Please write the title of the article";
					$this -> view( "blog/myUpdatePost", $data );
				} elseif ( $_POST['body'] === "" ) {
					$data['error'] = "Please write article";
					$this -> view( "blog/myUpdatePost", $data );
				} elseif (empty( $_FILES['image']['name'][0])) {
					$to = $this -> model( "BlogModel" );
					$to -> updatePost($id, $_POST);
					$data['error'] = "Article saved";
					$this -> view( "blog/myUpdatePost", $data );
				}else {
					for ( $i = 0; $i < count( $_FILES['image']['name'] ); $i ++ ) {
						$file_tmp  = $_FILES['image']['tmp_name'][ $i ];
						$file_name = $_FILES['image']['name'][ $i ];
						$file_size = $_FILES['image']['size'][ $i ];

						// Check file size
						if ( $file_size > 3145728 ) {
							$data['error'] = 'File size must be less than 3 MB';
							$this -> view( "blog/myUpdatePost", $data );
						}
						//Check file extensions
						$extensions = [ "jpeg", "jpg", "png" ];
						$file_ext = explode( '.', $_FILES['image']['name'][ $i ] );
						$file_ext = end( $file_ext );
						$file_ext = strtolower( $file_ext );
						if ( in_array( $file_ext, $extensions ) === false ) {
							$data['error'] = "File not image.";
							$this -> view( "blog/myUpdatePost", $data );
						}

						$data['image'] .= "/".date( 'Y-m-d-H-i-s' ) . '-'.$file_name ;

						//move file to directory
						$target_dir  = $_SERVER['DOCUMENT_ROOT'] . CONFIG['site_path'] . "/assets/image/";
						$target_file = $target_dir . date( 'Y-m-d-H-i-s' ) . '-' . basename( $file_name );
						if ( move_uploaded_file( $file_tmp, $target_file ) ) {
							$data['error'] = "The article and file has been uploaded.";
							$this -> view( "blog/myUpdatePost", $data );
						} else {
							$data['error'] = "Sorry, your file was not uploaded.";
							$this -> view( "blog/myUpdatePost", $data );
						}
					}
					// Save to Db
					$to = $this -> model( "BlogModel" );
					$to -> updatePost( $id, $_POST);
					$to -> updateImage($id, $data['image']);

					$this -> view( "blog/myUpdatePost", $data );
				}
			}
		}
	}