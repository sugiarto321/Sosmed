<?php
	class OrderDetailDao extends RSIL_Model
	{
		public function Loader(){
			$this->load->library('RSILClause');
			$this->load->library('rsil_filter');
		}
		public function __construct(){
			parent::__construct();
			$this->Loader();
			parent::setTableName('order_detail');
			$fields = array('order_detail_id', 'order_cloth_id','cloth_id','size_id','color_id','qty','price');
			parent::setFields($fields);
			parent::setPK('order_detail_id');
			parent::setAutoIncrement('TRUE');
			$this->load->model('Model/Order/OrderCloth');
                        
		}
		public function insert($OrderDetail){
			return parent::insert($OrderDetail);
		}
		public function update($id, $OrderDetail){
			return parent::update($id, $OrderDetail);
		}
		public function delete($id){
			return parent::delete($id);
		}
		public function GetOrderDetail($id){
			return parent::GetObject($id);
		}
		public function GetOrderDetails($OrderDetail = NULL, $limit = NULL, $offset = NULL, $order = NULL, $sort = 'asc'){
			$criteria = $this->CreateCriteria($OrderDetail);
			return parent::GetObjects($criteria, $limit, $offset, $order, $sort);
		}

		public function GetCount($OrderDetail = NULL){
			$criteria = $this->CreateCriteria($OrderDetail);
			return parent::GetCount($criteria);
		}
		public function CreateCriteria($OrderDetail){
			if($OrderDetail == NULL) return NULL;
                        //$OrderDetail = new OrderDetail();
                        
			$criteria = NULL;
			$this->rsil_filter->ResetClause();

			if($OrderDetail->GetId() != NULL || $OrderDetail->GetId() != ''){
                            $this->rsil_filter->Where('order_detail_id', $OrderDetail->GetId());
			}
            if($OrderDetail->GetOrderCloth() != NULL || $OrderDetail->GetOrderCloth()->GetId() != ''){
                $this->rsil_filter->Where('order_cloth_id', $OrderDetail->GetOrderCloth()->GetId());
            }
            if($OrderDetail->GetCloth() != NULL || $OrderCloth->GetCloth()->GetId() != ''){
                $this->rsil_filter->Where('cloth_id', $OrderDetail->GetCloth()->GetId());
            }

			$criteria = $this->rsil_filter->Extract();
			return $criteria;
		}


        public function ToObject($result){
            $this->load->model('Model/Cloth/Cloth');
            $this->load->model('Model/Cloth/Size');
            $this->load->model('Model/Order/OrderDetail');
            $this->load->model('Model/Cloth/Color');
            
            $OrderDetail = new OrderDetail();
            
            $OrderDetail->SetId($result['order_detail_id']);
            
            $OrderCloth = new OrderCloth();
            $OrderCloth->SetId($result['order_cloth_id']);
            $OrderDetail->SetOrderCloth($OrderCloth);
            
            $Cloth = new Cloth();
            $Cloth->SetId($result['cloth_id']);
            $OrderDetail->SetCloth($Cloth);
            
            $Size = new Size();
            $Size->SetId($result['size_id']);
            $OrderDetail->SetSize($Size);
            
            $Color = new Color();
            $Color->SetId($result['color_id']);
            $OrderDetail->SetColor($Color);
            
            $OrderDetail->SetPrice($result['price']);
            $OrderDetail->SetQty($result['qty']);
            
            return $OrderDetail;
        }
			
	}
	?>