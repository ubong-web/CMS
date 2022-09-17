           

<?php
/*PHP program to build a class and store the data of the mobile phones with screen size,ram,company and processor along with Constructor and function to estimate cost of phone based on conditions
samsung:7000(pr)
moto:5999
lenovo:4000
nokia:6100
est cost = pr*(scr size/4.0)+pr*(ram/1.0)+pr*(proc/1.0)+0.05*pr

Input
enter screen size:5
enter ram:3
enter company name:moto
enter processor:3

Output
price:43792
*/
class Mobile {
 var $screen_size;
 var $ram;
 var $company;
 var $processor;
 var $ss;
 var $r;
 var $pr;
 var $proc;
 //initializes the value of screensize,ram,company and processor
 function Mobile($screen_size,$ram,$processor,$company)
 {
  $this->screen_size=$screen_size;
  $this->ram = $ram;
  $this->processor=$processor;
  $this->company =$company;
 }
 //calculates the price of the mobile according to the features
 function set_price()
 {
  $s=$this->screen_size;
  $r=$this->ram;
  $proc=$this->processor;
  $pr1=$this->company;
  //converts the company name to lower case
  $pr=strtolower($pr1);
  //this block gets executed if the user enters the valid company i.e available in our catalog
  if($pr=="samsung" || $pr=="moto" || $pr=="lenovo" || $pr=="nokia" )
  {
   if($pr=="samsung")
   {
     $cost=7000*($s/4.0)+7000*($r/1.0)+7000*($proc/1.0)+0.05*7000;
   }
   elseif($pr=="moto")
   {
     $cost=5999*($s/4.0)+5999*($r/1.0)+5999*($proc/1.0)+0.05*5999;
   }
   elseif($pr=="lenovo")
   {
     $cost=4000*($s/4.0)+4000*($r/1.0)+4000*($proc/1.0)+0.05*4000;
   }
   elseif($pr=="nokia")
   {
     $cost=6100*($s/4.0)+6100*($r/1.0)+6100*($proc/1.0)+0.05*6100;
   }
   //displays the cost
   echo "price:".(int)$cost."\n";
  }
  else
   echo "specified company not available in our catalog\n";
 }
}
echo "enter screen size:";
$ss = trim(fgets(STDIN, 1024));
echo "enter ram:";
$rr = trim(fgets(STDIN, 1024));
echo "enter company name:";
$cc = trim(fgets(STDIN, 1024));
echo "enter processor:";
$pp = trim(fgets(STDIN, 1024));
//calls the mobile function
$mobile1=new Mobile($ss,$rr,$pp,$cc);
//calls the function set_price
$mobile1->set_price();

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              ?>
