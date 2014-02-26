<?php
	class rsil_menu{
	    private $url = "x_cloth/catalog";

		private function CreateShowAll(){
			$CI = & get_instance();
			$CI->load->helper('url');
			echo '<div class="text-title" style="color:gold"><a href="' . base_url()  . $this->url . '?page=0"><b>SHOW ALL ITEM</b></a></div>';
		}

		private function CreateCategory($category){
			echo '<div class="text-title"><a href="' . base_url()  . $this->url . '?page=0&category_id='.
			$category->GetId() .'">' . $category->GetName() . '</a></div>';
		}

		private function CreateStyle($style, $category){
			echo '<div class="text-label"><a href="' . base_url()  . $this->url . '?page=0&category_id='.
			$category->GetId() .'
			&style_id=' . $style->GetId() . '
			">' . $style->GetName() . '</a></div><div class="line"></div>';
		}

		public function CreateMenu(){
			$CI = & get_instance();

            $CI->load->model('Dao/Cloth/CategoryDao');
            $CI->load->model('Model/Cloth/Category');
            $CI->load->model('Dao/Cloth/StyleDao');
            $CI->load->model('Model/Cloth/Style');
            $CI->load->model('Dao/Cloth/ClothDao');
            $CI->load->model('Model/Cloth/Cloth');
            $CI->load->model('Dao/Menu/MenuClothDao');
            $CI->load->model('Model/Menu/MenuCloth');

            $categorys = $CI->CategoryDao->GetCategorys();
            $this->CreateShowAll();
            foreach($categorys as $item){
                $MenuCloth = new MenuCloth();
                $MenuCloth->SetCategory($item);
                $counter = $CI->MenuClothDao->GetCount($MenuCloth);

                if($counter > 0){
                    $this->CreateCategory($item);
                    $MenuCloths = $CI->MenuClothDao->GetMenuCloths($MenuCloth);
                    foreach($MenuCloths as $item2){
                        $Style = $CI->StyleDao->GetStyle($item2->GetStyle()->GetId());
                        $this->CreateStyle($Style, $item);
                    }
                }
            }
		}
	}
?>