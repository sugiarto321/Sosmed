<?php
	class rsil_paging{
		private $last_page;

		public function __construct(){
			$CI = & get_instance();
			$CI->load->helper('url');
		}

		///////////////////////////////////////////////////////////////////////////////

		public function create_links(){
			$link = '';
			$link .= $this->CreateFirst();
			$link .= $this->CreatePrev();
			$link .= $this->CreateLinkNumber();
			$link .= $this->CreateNext();
			$link .= $this->CreateLast();
			return $link;
		}

		///////////////////////////////////////////////////////////////////////////////

		private $OrderBy;
		private $Order;

		public function GetOrderBy(){
			$CI = & get_instance();
			$sort = $CI->input->get('orderby');
			return $sort;
		}
		public function GetOrder(){
			$CI = & get_instance();
			$order = $CI->input->get('order');
			return $order;
		}
		/*public function setOrderBy($orderby, $order){
			$this->OrderBy = $orderby;
			$this->Order = $order;
		}*/

		public function CreateOrderLinks($label, $property){
			$CI = & get_instance();
			$sort = $CI->input->get('order');
			if($sort == 'asc'){
				$sort = 'desc';
			}else{
				$sort = 'asc';
			}
			$uri = $this->createUri($this->getCurrentPage()) . $this->createOrder($property, $sort);
			$link = '<a href="' . $uri . '">' . $label . '</a>';
			return $link;
		}

		///////////////////////////////////////////////////////////////////////////////

		private $tagOpen;
		private $tagClose;

		public function setTag($open, $close){
			$this->tagOpen = $open;
			$this->tagClose = $close;
		}

 		///////////////////////////////////////////////////////////////////////////////
		private $counter;
		private $limit;
		private $display;
		private $NamePagePosition;
		private $filter;
		private $offset;

		public function getOffset(){
			$CurrentUrl = $this->getCurrentPage();
			$this->offset = $CurrentUrl * $this->limit;

			return $this->offset;
		}
		public function setOffset($value){
			$this->offset = $value;
		}

		public function setFilter($value){
			$this->filter = $value;
		}
		public function getFilter(){
			return $this->filter;
		}

		public function setNamePagePosition($value){
			$this->NamePagePosition = $value;
		}

		public function getNamePagePosition($value){
			return $this->NamePagePosition;
		}

		public function getCurrentPage(){
			$CI = & get_instance();
			$current = 0;
			if($this->NamePagePosition != NULL){
				$current = $CI->input->get($this->NamePagePosition);
			}else{
				$current = $CI->input->get('page');
			}
			return $current;
		}


		public function setDisplay($value){
			$this->display = $value;
		}
		public function getDisplay(){
			return $this->display;
		}

		public function setCount($value){
			$this->counter = $value;
		}

		public function getCount(){
			return $this->counter;
		}

		public function setLimit($value){
			$this->limit = $value;
		}
		public function getLimit(){
			return $this->limit;
		}


		private function getTotalUrl(){
			$total = $this->counter / $this->limit;
			return $total;
		}
		////////////////////////////////////////////////////////////////////////////////////


		private function createOrder($orderby, $order){
			$link = '&orderby=' . $orderby . '&order=' . $order;
			return $link;
		}

		private function createUri($position = 0){
			$uri_filter = '';
			$filter = $this->filter;

			foreach($filter as $key => $value) {
				if($uri_filter != ''){
					$uri_filter .= '&' . $key . '=' . $value;
				}else{
					$uri_filter .= $key . '=' . $value;
				}
			}

			if($this->NamePagePosition != NULL){
				$url = $this->get_uri() . '?' . $this->NamePagePosition . '=' . $position;
			}else{
				$url = $this->get_uri() . '?' . 'page' . '=' . $position;
			}
			$url .= '&' . $uri_filter;
			return $url;
		}

		private function CreateUriPage($position){
			$CI = & get_instance();
			$this->OrderBy = $CI->input->get('orderby');
			$this->Order = $CI->input->get('order');

			$url = $this->createUri($position) . $this->createOrder($this->OrderBy, $this->Order);
			return $url;
		}

		///////////////////////////////////////////////////////////////////////////////
 		private $first_symbol;
		private $last_symbol;
		private $prev_symbol;
		private $next_symbol;

		public function setFirstSymbol($value){
			$this->first_symbol = $value;
		}
		public function getFirstSymbol(){
			return $this->first_symbol;
		}

		public function setLastSymbol($value){
			$this->last_symbol = $value;
		}
		public function getLastSymbol(){
			return $this->last_symbol;
		}

		public function setPrevSymbol($value){
			$this->prev_symbol = $value;
		}
		public function getPrevSymbol($value){
			return $this->prev_symbol;
		}

		public function setNextSymbol($value){
			$this->next_symbol = $value;
		}
		public function getNextSymbol(){
			return $this->next_symbol;
		}

 		private function get_uri(){
			return current_url();
		}
		////////////////////////////////////////////////////////////////////////////////
		private function CreateFirst(){
			$position = 0;
			if($this->getCurrentPage() > 0){
				if($this->first_symbol != NULL){
					return $this->CreateLink($position, $this->first_symbol);
				}else{
					return $this->CreateLink($position, '&laquo');
				}
			}
		}



		private function CreatePrev(){
			if($this->getCurrentPage() > 0){
				$position = $this->getCurrentPage() - 1;
				if($this->prev_symbol != NULL){
					return $this->CreateLink($position, $this->prev_symbol);
				}else{
					return $this->CreateLink($position, '&lt');
				}
			}else{
				return '';
			}
		}

		private function CreateNext(){
			$last_post = ($this->getCurrentPage() + 1) * $this->limit;
			if($last_post < $this->counter){
				$position = $this->getCurrentPage() + 1;
				if($this->next_symbol != NULL){
					return $this->CreateLink($position, $this->next_symbol);
				}else{
					return $this->CreateLink($position, '&gt');
				}
			}else{
				return '';
			}
		}



		private function CreateLinkNumber(){
			$link_number = 1;
			$counter = $this->counter;
			$limit = $this->limit;
			$link = '';
			$display = $this->display;
			$batas = $display / 2;
			$bb = $this->getCurrentPage() - $batas;
			$ba = $this->getCurrentPage() + $batas;

			for($i = 0 ; $i < $counter ; $i++){
				$limiter = $i * $limit;
				if($limiter < $counter){
					if(($i > $bb) && ($i < $ba) ){
						$temp = $this->getCurrentPage() + 1;
						if($temp == $link_number){
							$link .= ' <a style="background:red">' . $link_number . '</a> ';
						}else{
							$link .= $this->CreateLink($i, $link_number);
						}
					}
					$link_number = $link_number + 1;
				}else{
					break;
				}
			}
			$this->last_page = $i - 1;
			return $link;
		}



		private function CreateLink($position = NULL, $symbol){
			$link = '';

			if($this->tagOpen != NULL){
				$link .= $this->tagOpen;
			}

			$link .= '<a href="' . $this->CreateUriPage($position) . '" >' . $symbol . '</a>';

			if($this->tagClose != NULL){
				$link .= $this->tagClose;
			}
			return $link;
		}

		private function CreateLast(){
			$position = $this->last_page;

            if($position < 0){
                $position = 0;
            }

			if(($this->getCurrentPage()) <= $position - 1 && $this->limit < $this->counter){
				if($this->last_symbol != NULL){
					return $this->CreateLink($position, $this->last_symbol);
				}else{
					return $this->CreateLink($position, '&raquo');
				}
			}else{
				return '';
			}
		}
		///////////////////////////////////////////////////////////////////////////////
	}
?>