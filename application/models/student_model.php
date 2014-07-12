<?php

class Student_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->db->protect_identifiers("users");
    }
    
    function searchRoll($roll=FALSE) {
        if($roll===FALSE) {
            
        }
        else {
            if(strpos($roll, "-")!==FALSE) {
                $sql="";
                $tempArr=explode(",", $roll);
                foreach($tempArr as $range) {
                    $temp=explode("-", trim($range));
                    $startRoll=trim($temp[0]);
                    $endRoll=trim($temp[1]);
                    $sql=$sql."SELECT * FROM `users` WHERE `roll` BETWEEN ".$startRoll." AND ".$endRoll." UNION ALL ";
                }
                $sql=$sql."SELECT * FROM `users` WHERE `roll`=-1";
                $query=$this->db->query($sql);
                return $query;
            }
            else {
                $roll=str_replace(".",",",$roll);
                $roll=str_replace("&",",",$roll);
                $roll=str_replace("%",",",$roll);
                $roll=str_replace("_",",",$roll);
                $rolls=explode(",", $roll);
                $this->db->where_in('roll',$rolls);
                $query=$this->db->get('users');
                return $query;
            }
        }
    }
    
    function searchMail($email=FALSE) {
        if($email===FALSE) {
            
        }
        else {
            if(stripos($email,"@")) {
                $email=substr($email,0,strlen($email)-11);
            }
            
            $email=str_replace(".",",",$email);
            $email=str_replace("&",",",$email);
            $email=str_replace("%",",",$email);
            $email=str_replace("-",",",$email);
            $email=str_replace("_",",",$email);
            $emails=explode(",", $email);
            
            $this->db->where_in('email',$emails);
            $query=$this->db->get('users');
            return $query;
        }
    }
    
    function search() {
        $hallArr=array(
            array('gh', 'gh1', 'gh-1', 'gh_1', 'gh->1', 'gh=1', 'girlshostel1'),
            array('gh2', 'gh2', 'gh-2', 'gh_2', 'gh->2', 'gh=2', 'girlshostel2'),
            array('hall1', 'hall-1', 'h1', 'hall_1', 'hall->1', 'hall=1', 'hostel1'),
            array('hall2', 'hall-2', 'h2', 'hall_2', 'hall->2', 'hall=2', 'hostel2'),
            array('hall3', 'hall-3', 'h3', 'hall_3', 'hall->3', 'hall=3', 'hostel3'),
            array('hall4', 'hall-4', 'h4', 'hall_4', 'hall->4', 'hall=4', 'hostel4'),
            array('hall5', 'hall-5', 'h5', 'hall_5', 'hall->5', 'hall=5', 'hostel5'),
            array('hall6', 'hall-6', 'h6', 'hall_6', 'hall->6', 'hall=6', 'hostel6'),
            array('hall7', 'hall-7', 'h7', 'hall_7', 'hall->7', 'hall=7', 'hostel7'),
            array('hall8', 'hall-8', 'h8', 'hall_8', 'hall->8', 'hall=8', 'hostel8'),
            array('hall9', 'hall-9', 'h9', 'hall_9', 'hall->9', 'hall=9', 'hostel9'),
            array('hall10', 'hall-10', 'h10', 'hall_10', 'hall->10', 'hall=10', 'hostel10')
        );
        $depArr=array(
            array('aero', 'aero', 'ae', 'aerospace', 'aeronautical'),
            array('bio', 'bsbe', 'bio', 'biological'),
            array('chemical', 'che', 'chemical'),
            array('chemistry', 'chem', 'chemistry'),
            array('civil', 'ce', 'civil'),
            array('comp', 'cse', 'computer', 'computers', 'dabba'),
            array('eco', 'eco', 'economics', 'economic'),
            array('elec', 'ee', 'elec', 'electric', 'electrical', 'batti'),
            array('material', 'mse', 'mme', 'materials', 'material', 'metallurgical', 'mamme', 'masse'),
            array('math', 'mth', 'mathematics', 'math', 'maths'),
            array('mech', 'me', 'mech', 'mechanical', 'mechanicals'),
            array('phy', 'phy', 'physics')
        );
        $progArr=array(
            array('bs'),
            array('btech'),
            array('mtech', 'matke', 'matka'),
            array('mt(dual)', 'mtech(dual)', 'dual', 'mtech-dual'),
            array('msc(int)', 'msc', 'msc_int', 'msc-int')
        );
        
        $params=$this->input->post('search');
        if($params===FALSE) {
            return;
        }
        $paramArr=array();
        $tempArr=explode(" ", $params);
        foreach($tempArr as $tempVal) {
            if(trim($tempVal)!="") {
                array_push($paramArr, strtolower($tempVal));
            }
        }
        
        /*foreach($paramArr as $searchParam) {
            if($sql==="") {
                $sql="SELECT * FROM `users` WHERE prog LIKE '".$searchParam."' OR dep LIKE '".$searchParam."' OR hall LIKE '".$searchParam."' OR blood LIKE '".$searchParam."' OR gender LIKE '".$searchParam."' OR city LIKE '".$searchParam."' OR state LIKE '".$searchParam."'";
            }
            else {
                $sql=$sql." OR prog LIKE '".$searchParam."' OR dep LIKE '".$searchParam."' OR hall LIKE '".$searchParam."' OR blood LIKE '".$searchParam."' OR gender LIKE '".$searchParam."' OR city LIKE '".$searchParam."' OR state LIKE '".$searchParam."'";
            }
        }*/
        for($j=0;$j<count($paramArr);$j++) {
            //check for hall
            for($i=0;$i<count($hallArr);$i++) {
                if(in_array($paramArr[$j], $hallArr[$i])) {
                    $hall=$hallArr[$i][0];
                    $hallArr=array();  //clearing the array so the in next run of outer loop it doesn't enter this inner loop
                    $paramArr[$j]="";
                    continue 2;
                }
            }
            //check for department
            for($i=0;$i<count($depArr);$i++) {
                if(in_array($paramArr[$j], $depArr[$i])) {
                    $dep=$depArr[$i][0];
                    $depArr=array();
                    $paramArr[$j]="";
                    continue 2;
                }
            }
            //check for batch
            if(!isset($roll) && preg_match("/^y\d+/", $paramArr[$j])) {
                if(strpos($paramArr[$j],"1")===1) {
                    $paramArr[$j]=substr($paramArr[$j], 1);
                }
                $roll=$paramArr[$j];
                $paramArr[$j]="";
                continue;
            }
            //check for programme
            for($i=0;$i<count($progArr);$i++) {
                if(in_array($paramArr[$j], $progArr[$i])) {
                    $prog=$progArr[$i][0];
                    $progArr=array();
                    $paramArr[$j]="";
                    continue 2;
                }
            }
            //check for blood group
            if(!isset($blood) && in_array($paramArr[$j], array('o-', 'o', 'o+', 'a-', 'a', 'a+', 'b-', 'b', 'b+', 'ab-', 'ab', 'ab+'))) {
                $blood=$paramArr[$j];
                $paramArr[$j]="";
                continue;
            }
            //check for gender
            if(!isset($gender) && in_array($paramArr[$j], array('m', 'f'))) {
                $gender=$paramArr[$j];
                $paramArr[$j]="";
                continue;
            }
        }
        //check for city, state or country
        //print_r($paramArr);
        $addrArr=array();
        for($j=0;$j<count($paramArr);$j++) {
            if($paramArr[$j]!=="") {
                array_push($addrArr, $paramArr[$j]);
            }
        }
        //print_r($addrArr);
        //$this->db->where("(state='".$this->db->escape()."' OR city='".$this->db->escape()."' OR country='".$this->db->escape()."')");
        for($j=0;$j<count($addrArr);$j++) {
            $addr="(`state` = ".$this->db->escape($addrArr[$j])." OR `city` = ".$this->db->escape($addrArr[$j])." OR `country` = ".$this->db->escape($addrArr[$j]).")";
        }
        
        $stateArr=array('A.P.', 'U.P.', 'Delhi', 'Rajasthan', 'Himachal Pradesh', 'Bihar', 'Madhya Pradesh', 'Chhattisgarh', 'Haryana', 'W.B.', 'J & K', 'Karnataka', 'Chandigarh', 'Punjab', 'Maharashtra', 'Jharkhand', 'Gujarat', 'Uttarakhand', 'Orissa', 'Meghalaya', 'Assam', 'Tamil Nadu', 'Kerala', 'Arunachal P.', ' Madhya Pradesh', 'Manipur', 'Other');
        
        //construct the query
        if(isset($hall)) {
            $this->db->where('hall', $hall);
        }
        if(isset($dep)) {
            $this->db->like('dep', $dep); //CI automatically adds % around $dep;
        }
        if(isset($roll)) {
            $this->db->like('roll', $roll, 'after');
        }
        if(isset($addr)) {
            $this->db->where($addr);
        }
        if(isset($prog)) {
            $this->db->where('prog', $prog);
        }
        if(isset($blood)) {
            $this->db->where('blood', $blood);
        }
        if(isset($gender)) {
            $this->db->where('gender', $gender);
        }
        $query=$this->db->get('users');
        return $query;
    }
}

?>