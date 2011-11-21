<?php

Class postController Extends Controller {

	public function index() {
		$posts = new Post($this -> registry);
		$posts -> find();

		$this -> registry -> template -> posts = $posts -> getIterator();
	}

	public function add() {
		$post = new Post($this -> registry);

		if ($this -> registry -> post) {
			$created = $post -> create($this -> registry -> post);

			if ($created) {
				PVRouter::redirect('/post/view/' . $post -> post_id);
			}
		}
	}

	public function view() {
		$id = PVRouter::getRouteVariable('id');
		
		$post = new Post($this -> registry);
		$conditions = array('post_id' => $id);
		$post -> first(compact('conditions'));
		
		$this -> registry -> template -> post = $post;
	}
	
	public function edit() {
		$id = PVRouter::getRouteVariable('id');
		
		$post = new Post($this -> registry);
		$conditions = array('post_id' => $id);
		$post -> first(compact('conditions'));
		
		if ($this -> registry -> post) {
			$success = $post -> update($this -> registry -> post);
			
			if($success)
				PVRouter::redirect('/post/view/' . $post -> post_id);
		}
		
		$this -> registry -> template -> post = $post;
	}

}
?>
