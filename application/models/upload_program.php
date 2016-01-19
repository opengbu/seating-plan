<?php
/*
 *  Created on :Nov 25, 2015, 2:24:49 AM
 *  Author     :Rishabh Ahuja <rishabhahuja279@gmail.com>

  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program.  If not, see <http://www.gnu.org/licenses/>.

 */
class upload_program extends CI_Model
 {
function __construct()
{
				
parent::__construct();
				
		 
}
 function upload_sampledata_csv()
 {
		   
  $fp = fopen($_FILES['userfile']['tmp_name'],'r') or die("can't open file");
					  while($csv_line = fgetcsv($fp,1024)) 
					  {
					for ($i = 0, $j = count($csv_line); $i < $j; $i++) 
					  {
			
					
					   $insert_csv = array();
					   // $insert_csv['id'] = $csv_line[0];
					   $insert_csv['program'] = $csv_line[0];
					   $insert_csv['branch'] = $csv_line[1];
					   $insert_csv['semester'] = $csv_line[2];
					   $insert_csv['subject'] = $csv_line[3];
					   
					  }
	 
					  $data = array(
					   
					   'program' => $insert_csv['program'] ,
					   'branch' => $insert_csv['branch'],
					   'semester'=>$insert_csv['semester']);
						'branch' => $insert_csv['subject'],
					   
	      $data['crane_features']=$this->db->insert('program_details', $data);
				     }
                   fclose($fp) or die("can't close file");
	       $data['success']="success";
	       return $data;
	
	          }
function get_car_features_info()
		   {
		      $get_cardetails=$this->db->query("select * from student_details");
			   return $get_cardetails;
		   
		   }
}