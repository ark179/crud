<?php
/*
*
**
***
****
*****
*/
$n=5;
for($i=0;$i<$n;$i++)
{
	for($j=0;$j<=$i;$j++)
	{
		echo "*";
	}
	echo "<br>";
}
echo "<br>";
/*
    *
   **
  ***
 ****
*****  
*/
for($i=0;$i<=$n;$i++)
{
	for($j=$n;$j>$i;$j--)
	{
		echo "&nbsp;&nbsp;";
	}
	for($k=0;$k<$i;$k++)
	{
		echo "*";
	}
	echo "<br>";
}
echo "<br>";
/*
*****
****
***
**
*
*/
for($i=$n;$i>0;$i--)
{
	for($j=0;$j<$i;$j++)
	{
		echo "*";
	}
	echo "<br>";
}
echo "<br>";
/*
*****
 ****
  ***
   **
    *
*/
for($i=$n;$i>0;$i--)
{
	for($j=$n;$j>$i;$j--)
	{
		echo "&nbsp;&nbsp;";
	}
	for($j=0;$j<$i;$j++)
	{
		echo "*";
	}
	echo "<br>";
}
echo "<br>";
/*
1
22
333
4444
55555
*/
for($i=1;$i<=$n;$i++)
{
	for($j=0;$j<$i;$j++)
	{
		echo $i."&nbsp;";
	}
	echo "<br>";
}
echo "<br>";
/*
0
12
345
6789
*/
$m=0;
for($i=1;$i<$n;$i++)
{
	for($j=0;$j<$i;$j++)
	{
		echo $m;
		$m++;
	}
	echo "<br>";
}
echo "<br>";
/*
0 1 1 2 3 5 8 13 21 34
*/
$prev=0;
$next=1;
echo $prev."&nbsp;";
echo $next."&nbsp;";
for($i=0;$i<10;$i++)
{
	$tot=$prev+$next;
	$prev=$next;
	$next=$tot;
	echo $tot."&nbsp;";
}
echo "<br>";
/*
2 3 5 7 11 13 17
*/
for($i=2;$i<40;$i++)
{
	$count=0;
	for($j=1;$j<=$i;$j++)
	{
		if($i%$j==0)
		{
			$count++;
		}
	}
	if($count<=2)
	{
		echo $i."&nbsp;";
	}
}
echo "<br>";
/*
0
1
1
1
*/
$a=$b=$c=$d=0;	
echo "<br>".$b++;
$a=$b;
echo "<br>".$a;
echo "<br>".++$c;
$d=$c;
echo "<br>".$d;
echo "<br>";

//fibonancy series
// 0 1 1 2 3 5 8 13 21 34 55 89 144 
$prev=0;
$next=1;
$no=13;
echo $prev."&nbsp;";
echo $next."&nbsp;";
for($i=2;$i<$no;$i++)
{
	$sum=$prev+$next;
	$prev=$next;
	$next=$sum;
	echo $sum."&nbsp;";
}

//prime number program
//2 3 5 7 11 13 17 19 23 29
$no=10;
$count=0;
for($j=2;$j<100;$j++)
{
	if($count!=$no)
	{
		$prime=0;
		for($k=$j-1;$k>1;$k--)
		{
			if($j%$k==0)
			{
				$prime++;
			}
		}
		if($prime==0)
		{
			echo $j."&nbsp;";
			$count++;
		}
	}
}

//swapping two value without third variable
$a=10;
$b=20;
$a=[$a,$b];
$b=$a[0];
$a=$a[1];

$a=10;
$b=20;
$a=$a+$b;
$b=$a-$b;
$a=$a-$b;

$a=10;
$b=20;
list($a, $b) = array($b, $a);


/*
1) program to find sum of column elements and multiplication of row elements of all the columns and rows of given matrix
Example
Enter the numbers of rows and columns: 3 3
elemets of the matrix:
1 5 8
2 3 4
6 7 9
sum of elemets of column no 0 is: 9
sum of elemets of column no 1 is: 15
sum of elemets of column no 2 is: 21
multiplication of elemets of rows no 0 is: 40
multiplication of elemets of rows no 1 is: 24
multiplication of elemets of rows no 2 is: 378
*/
//program 
$input="3 3";
$input_arr=explode(" ",$input);
$rows=$input_arr[0];
$column=$input_arr[1];
$no=[1,2,3,4,5,6,7,8,9];
$num;
$mul_arr=[];
for($i=0;$i<$rows;$i++)
{
	$mul=1;
	for($j=0;$j<$column;$j++)
	{
		$n=$no[array_rand($no)];
		echo "&nbsp;&nbsp;".$n;
		$num[$i][]=$n;
		$mul=$mul*$n;
	}
	$mul_arr[]=$mul;
	echo "<br>";
}
//print sum of columns
for($i=0;$i<$column;$i++)
{
	for($j=0;$j<$rows;$j++)
	{
		$sum[$i][]=$num[$j][$i];
	}
	echo "<br>sum of elemets of column no $i is: ".array_sum($sum[$i]);
}
//print multiplication of rows
for($i=0;$i<$rows;$i++)
{
	echo "<br>multiplication of elemets of rows no $i is: ".$mul_arr[$i];
}
/*
2) Sum of divisors of factorial of a number
Example:
input: 4
Output: 60
Factorial of 4 is 24. Divisors of 24 are
1 2 3 4 6 8 12 24
Sum of these is 60
*/
//Program:
$no=4;
$fact=1;
//find factorial of number
for($i=$no;$i>1;$i--)
{
	$fact=$fact*$i;
}
echo "Factorial of $no is $fact. Divisors of $fact are";
echo "<br>";
$sum=0;
//print divisors of factorial and sum of it
for($j=1;$j<=$fact;$j++)
{
	if($fact%$j==0)
	{
		echo "&nbsp;".$j;
		$sum=$sum+$j;
	}
}
echo "<br>Sum of these is $sum";
/*
3) I want you to produce a query that lists all charges and tax calculated totals with the given schema. your query should produce.

output
selling_date	charge_type		amount		tax
2013-12-01		room charge		50.00		4.50
2013-12-01		snack charge	20.00		1.00
2013-12-02		room charge		40.00		3.60
2013-12-03		room charge		10.00		0.90

* Do not display charges that are deleted (is_deleted is flagged)
* Do not display charges that have charge_types that are deleted (is_deleted is flagged)
* Do not consider tax_type that is deleted(is_deleted), but the containing charge_type should still be displayed
//tables
charge
charge_id  selling_date  amount  is_deleted  charge_type_id
1			2013-12-01   50.00		0			1
2			2013-12-01	 20.00		0			2
3			2013-12-02   40.00		0			1
4			2013-12-02   30.00		0			3
5			2013-12-02   30.00		1			1
6			2013-12-03   10.00		0			1
charge_type
charge_type_id	charge_type		is_deleted
1				room charge			0
2				snack charge		0
3				deleted charge		1
charge_type_tax_list
tax_type_id		charge_type_id
1					1
1					2
1					3	
2					1
3					1
tax_type
tax_type_id		tax_type	percentage		is_deleted
1				GST				0.05			0
2				HRT				0.04			0
3				DELETED TAX		0.10			1
*/

//find tax from different different tables
/*
	SELECT c.selling_date,ct.charge_type,c.amount,
	amount*(SELECT sum(tt.percentage) AS tot_tax FROM charge_type ct
	RIGHT OUTER JOIN charge_type_tax_list cttl ON cttl.charge_type_id=ct.charge_type_id
	RIGHT OUTER JOIN tax_type tt ON tt.tax_type_id=cttl.tax_type_id AND tt.is_deleted<>1
	WHERE ct.is_deleted<>1 AND ct.charge_type_id=c.charge_type_id
	GROUP BY charge_type) as tax 
	FROM charge c
	RIGHT JOIN charge_type ct ON ct.charge_type_id=c.charge_type_id AND ct.is_deleted<>1
	WHERE c.is_deleted<>1;

	//Having is faster query execution
	SELECT c.selling_date,ct.charge_type,c.amount,
	amount*(SELECT sum(tt.percentage) AS tot_tax FROM charge_type ct
	LEFT JOIN charge_type_tax_list cttl ON cttl.charge_type_id=ct.charge_type_id
	LEFT JOIN tax_type tt ON tt.tax_type_id=cttl.tax_type_id AND tt.is_deleted<>1
	WHERE ct.is_deleted<>1 AND ct.charge_type_id=c.charge_type_id
	GROUP BY charge_type) as tax 
	FROM charge c
	LEFT JOIN charge_type ct ON ct.charge_type_id=c.charge_type_id
	WHERE c.is_deleted<>1 
	HAVING tax > 0
*/
/*
generate dynamic form,display form and store form data into database
dropdown: text,number,file,email,select,radio,checkbox,

html form generated
after submit html form data store in database
*/

/*
display a google map where user can select/dragged a pin
display text box below to map for input advertise name
after submitting advertise it will stored in database with advertisement name and lat long of location and pin display to the map with title of advertisement
in second page text box for location with location autocomplete after selecting location all adversites that covored in 10 km of that area are display below as list

*/
?>