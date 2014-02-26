<?php
	class OrderClothDao extends RSIL_Model
	{
		public function Loader(){
			$this->load->library('RSILClause');
			$this->load->library('rsil_filter');
		}
		public function __construct(){
			parent::__construct();
			$this->Loader();
			parent::setTableName('order_cloth');
			$fields = array('order_cloth_id', 'customer_id','date_order','stat','redeem_code');
			parent::setFields($fields);
			parent::setPK('order_cloth_id');
			parent::setAutoIncrement('TRUE');
			$this->load->model('Model/Order/OrderCloth');
		}
                public function insert($OrderCloth){
			return parent::insert($OrderCloth);
		}
		public function update($id, $OrderCloth){
			return parent::update($id, $OrderCloth);
		}
		public function delete($id){
			return parent::delete($id);
		}
		public function GetOrderCloth($id){
			return parent::GetObject($id);
		}
		public function GetOrderCloths($OrderCloth = NULL, $limit = NULL, $offset = NULL, $order = NULL, $sort = 'asc'){
			$criteria = $this->CreateCriteria($OrderCloth);
			return parent::GetObjects($criteria, $limit, $offset, $order, $sort);
		}

		public function GetCount($OrderCloth = NULL){
			$criteria = $this->CreateCriteria($OrderCloth);
			return parent::GetCount($criteria);
		}
		public function CreateCriteria($OrderCloth){
            $this->load->model('Model/Cloth/Cloth');
			if($OrderCloth == NULL) return NULL;
                        $OrderCloth = new OrderCloth();
			$criteria = NULL;
			$this->rsil_filter->ResetClause();

			if($OrderCloth->GetId() != NULL || $OrderCloth->GetId() != ''){
                            $this->rsil_filter->Where('order_cloth_id', $OrderCloth->GetId());
			}
                        if($OrderCloth->GetRedeemCode() != NULL || $OrderCloth->GetRedeemCode() != ''){
                            $this->rsil_filter->Where('redeem_code', $OrderCloth->GetRedeemCode());
                        }
                        if($OrderCloth->GetStat() != NULL || $OrderCloth->GetStat() != ''){
                            $this->rsil_filter->Where('stat', $OrderCloth->GetStat());
                        }
                        
			$criteria = $this->rsil_filter->Extract();
			return $criteria;
		}


            public function ToObject($result){
                $this->load->model('Model/Cloth/Cloth');
                $OrderCloth = new OrderCloth();
                $OrderCloth->SetId($result['order_cloth_id']);
            
                $Customer = new Customer();
                $Customer->SetId($result['customer_id']);
                $OrderCloth->SetCustomer($Customer);
            
                $OrderCloth->SetDateOrder($result['date_order']);
                $OrderCloth->SetStat($result['stat']);
                $OrderCloth->SetRedeemCode($result['redeem_code']);
            
                return $OrderCloth;
            }
        }
	?>