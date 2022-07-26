<?php    
    
    class affiliate {
        private int $aff20;
        private int $aff50;
        private array $userdetailsfor20 = array();
        private array $userdetailsfor50 = array();
        private array $column = ['id' , 'email' , 'name' , 'billetLafo'];


        public function __construct() {
            $this->aff20 = 0;
            $this->aff50 = 0;
        }


        public function getFor20() {
            return $this->aff20;
        }

        public function getFor50() {
            return $this->aff50;
        }

        public function GetUserdetailsfor20() {
            return $this->userdetailsfor20;
        }
        
        public function GetUserdetailsfor50() {
            return $this->userdetailsfor50;
        }

        public function Calculate20( array $data ) {
            if (count($data)>0) {                
                $crud = new CrudClass();
                foreach ($data as $value) {
                    $result = $crud->Select('users', $this->column)
                        ->Where(['addedBy' => $value['id']])
                        ->Execute();
                    $this->userdetailsfor20[] = $value;   
                    $this->aff20 += $value['billetLafo'];
                $this->Calculate20($result );                    
                }
            }
            return $this;
        }

        public function Getaff50(int $at) {
        $crud = new CrudClass();
        $result = $crud->Select('users', $this->column)
                        ->Where(['addedBy' => $at])
                        ->Execute();                
            foreach ($result as $value) {
                $this->aff50 += intval($value['billetLafo']);
                $value['billetLafo'] = 0;
                $this->userdetailsfor50[] = $value;
            }
            return $this;            
        }
        public function Getaff20()
        {   if (count($this->userdetailsfor50) > 0) {
            $this->Calculate20($this->userdetailsfor50);
        }
            return $this;
        }
    };