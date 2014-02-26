<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    class MessageDao extends RSIL_Model{
        public function Loader(){
            $this->load->library('RSILClause');
            $this->load->library('rsil_filter');
        }
        public function __construct() {
            parent::__construct();
            $this->Loader();
            parent::setTableName('pesan');
            parent::setFields('id_pengirim','id_penerima','pesan','tgal');
            $this->load->model('Model/User/User');
            $this->load->model('Dao/User/UserDao');
            $this->load->model('Model/Message/Message');
        }
        public function insert($Message){
                return parent::insert($Message);
        }
        public function update($id, $Message){
                return parent::update($id, $Message);
        }
        public function delete($id){
                return parent::delete($id);
        }
        public function getUser($id){
                return parent::getObject($id);
        }
        public function getUsers($Message = NULL, $limit = NULL, $offset = NULL, $order = NULL, $sort = 'asc'){
                $criteria = $this->CreateCriteria($Message);
                return parent::getObjects($criteria, $limit, $offset, $order, $sort);
        }
        public function getCount($Message = NULL){
                $criteria = $this->CreateCriteria($Message);
                return parent::getCount($criteria);
        }

		//////////////////////////////////////////////////////////
        public function CreateCriteria($Message){
            if($Message == NULL) return NULL;

            $criteria = NULL;
            $this->rsil_filter->ResetClause();

            if($Message->getId() != NULL || $Message->getId() != ''){
                $this->rsil_filter->Where('id_pengirim', $Message->getId());
		$criteria = $this->rsil_filter->Extract();
            }

            if($Message->getUserName() != NULL || $Message->getUserName() != ''){
                $this->rsil_filter->Where('pesan', $Message->getUserName());
                $criteria = $this->rsil_filter->Extract();
            }

            if($Message->getPassword() != NULL || $Message->getPassword() != ''){
                $this->rsil_filter->Where('password', $Message->getPassword());
                $criteria = $this->rsil_filter->Extract();
            }
            $criteria = $this->rsil_filter->Extract();

            return $criteria;
	}
        public function ToObject($result){
            $Message = new Message();
        }
    }
?>
