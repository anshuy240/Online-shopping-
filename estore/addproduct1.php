
<?php
     include "db.php";
	 $pro_cate=$_POST["category"];
	 $x=0;
	 $y=0;
	 switch($pro_cate)
	 {
		 case "electronics":
		                    $x=1;
							break;
         case "ladies wear":
                 $x=2;
                 break;
         case "men wear":
                 $x=3;
                 break;
         case "kids wear":
                $x=4;
                break;
         case "Furniture":
                $x=5;
                break;
         case "Home Appliance":
                $x=6;
                break;
         case "electronics gadgets":
                $x=7;
                break;				
	 }
	 $pro_brand=$_POST["brand"];
	 switch($pro_brand)
	 {
		 case "HP":
		           $y=1;
				   break;
	     case "Samsung":
                   $y=2;
                    break;
         case "Apple":
                   $y=3;
                    break;
         case "LG":
                  $y=4;
                  break;
         case "Sony":
                 $y=5;
                 break;
         case "Clothe Brand":
                 $y=6;
                 break;				 
	 }
	 if($x==0 || $y==0)
	 {
		 echo "Dikkat h kuch bhai";
		 exit();
	 }
	 echo $x;
	 echo $y;
	 $pro_tittle=$_POST["title"];
	 $pro_price=$_POST["price"];
	 $pro_desc=$_POST["desc"];
	 $pro_key=$_POST["keyword1"];
	 $file = $_POST["file1"];
		  $sql = "INSERT INTO `products` 
		          (`product_id`, `product_cat`, `product_brand`, `product_title`, 
		          `product_price`, `product_desc`,`product_image`, `product_keywords`) 
		           VALUES (NULL, '$x', '$y', '$pro_tittle', 
		          '$pro_price', '$pro_desc','$file','$pro_key')";
	  if(mysqli_query($con,$sql))
	  {
		  echo "add_success";
		  exit();
	  }
	  else
	  {
		  echo "nahi hua";
		  exit();
	  }
?>
