<?php

Class postController Extends Controller {

	public function index() {
		$posts = new Post($this -> registry);
		$posts -> find();

		$this -> registry -> template -> posts = $posts -> getIterator();
	}

	public function add() {
		$post = new Post();

		if ($this -> registry -> post) {
			$created = $post -> create($this -> registry -> post);

			if ($created) {
				PVTemplate::successMessage('Post has been successfuly created');
				PVRouter::redirect('/post/view/' . $post -> post_id);
			}
		}
		
		$this -> registry -> template -> post = $post;
	}

	public function view() {
		$id = PVRouter::getRouteVariable('id');

		$post = new Post();
		$comment = new Comments();
		
		$conditions = array('post_id' => $id);
		$post -> first(compact('conditions'));
		
		if ($this -> registry -> post) {
			if($comment -> create($this -> registry -> post))
				PVTemplate::successMessage('Comment has been left');
		}

		$comments = new Comments();
		$join = array('users');
		$comments -> find(compact('conditions', 'join'));
		
		$this -> registry -> template -> post = $post;
		$this -> registry -> template -> comment = $comment;
		$this -> registry -> template -> comments = $comments -> getIterator();
	}

	public function edit() {
		$id = PVRouter::getRouteVariable('id');

		$post = new Post($this -> registry);
		$conditions = array('post_id' => $id);
		$post -> first(compact('conditions'));

		if ($this -> registry -> post) {
			$success = $post -> update($this -> registry -> post);

			if ($success){
				PVTemplate::successMessage('Post has been successfuly updated');	
				PVRouter::redirect('/post/view/' . $post -> post_id);
			}
		}

		$this -> registry -> template -> post = $post;
	}
	
	public function rss() {
		$posts = new Post($this -> registry);
		$posts -> find();

		$this->_renderLayout(array('prefix' => 'rss', 'type' => 'xml'));
		$this -> registry -> template -> posts = $posts -> getIterator();
	}

}
?>
