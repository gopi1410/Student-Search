<?php
//10109, 10154, 10185, 10320, 10327, 10328, 10338, 10532, 10745, 10782, 10787
//9037,9222,9254,9282,9331,9346,9543,9549,9559,9562
//8043,8069,8153,8161,8199,8330,8344
//7013,7033,7120,7162,7182,7212,7217,7300,7308,7309,7342,7517
$file=fopen("test.txt","w+") or die("can't open file");
$file1=fopen("data.txt","a+") or die("can't open file");

for($i=7296;$i<=7521;$i++)
{
	//if($i==10109||$i==10154||$i==10185||$i==10320||$i==10327||$i==10328||$i==10338||$i==10532||$i==10745||$i==10782||$i==10787)
	//	continue;
	//if($i==9037||$i==9222||$i==9254||$i==9282||$i==9331||$i==9346||$i==9543||$i==9549||$i==9559||$i==9562)
	//	continue;
	if($i==8043||$i==8069||$i==8153||$i==8161||$i==8199||$i==8330||$i==8344)
		continue;
	$rollno=$i;
	$ch=curl_init();
	curl_setopt($ch,CURLOPT_URL,'http://oa.cc.iitk.ac.in:8181/Oa/Jsp/OAServices/IITk_SrchRes.jsp?typ=stud&numtxt=Y'.$rollno.'&sbm=Y');
	curl_setopt($ch, CURLOPT_FILE, $file);
	curl_setopt($ch, CURLOPT_HEADER, 0);

	curl_exec($ch);
	if (curl_errno($ch))
		{
		   print curl_error($ch);
		} 
	curl_close($ch); 
	$contents = file_get_contents("test.txt");
	$p1=strpos($contents,"Name: ");
	$p2=strpos($contents,"Program: ");
	$p3=strpos($contents,"Department: ");
	$p4=strpos($contents,"Hostel Info: ");
	$p5=strpos($contents," E-Mail: ");
	$p13=strpos($contents,"@iitk.ac.in\">");
	$p6=strpos($contents," Blood Group:");
	$p7=strpos($contents," Category:");
	$p8=strpos($contents," Gender:");
	$p9=strpos($contents," CountryOfOrigin:");
	$p10=strpos($contents,"Local Address :");
	$p11=strpos($contents,"Permanent Address :");
	$p12=strpos($contents,"<a href=\"S");
	$name=substr($contents,$p1+30,$p2-$p1-98);
	$prog=substr($contents,$p2+33,$p3-$p2-101);
	$dep=substr($contents,$p3+36,$p4-$p3-104);
	$hostel=substr($contents,$p4+37,$p5-$p4-148);
	$email=substr($contents,$p5+29,$p13-$p5-29);
	$blood=substr($contents,$p6+37,2);
	if($blood=='AB')
		$blood=substr($contents,$p6+37,3);
	$categ=substr($contents,$p7+14,2);
	$gender=substr($contents,$p8+32,1);
	$country=substr($contents,$p9+41,$p10-$p9-117);
	$addr=substr($contents,$p11+23,$p12-$p11-48);
	$name1=str_replace("  "," ",$name);
	$disp="Y".$rollno."  ".$name1.")  ".$prog." &  ".$dep." %  ".$hostel." (  ".$email." @  ".$blood." #  ".$categ." _  ".$gender." ^  ".$country."\n*".$addr."**\n\n";
	fwrite($file1,$disp);
}
fclose($file1);
fclose($file);

?>