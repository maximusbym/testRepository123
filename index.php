<?php

$cars = [
	'Audi A6' => [
		'mark' => 'audi',
		'year' => 2000,
		'type' => 'sedan',
		'number' => 'LU404',
		'engine' => 2.2,
	],
	'VW Golf' => [
		'mark' => 'VW',
		'year' => 2006,
		'type' => 'sedan',
		'number' => 'LU6604',
		'engine' => 1.6,
	],
	'VW Passat' => [
		'mark' => 'VW',
		'year' => 2009,
		'type' => 'sedan',
		'number' => 'LU6604',
		'engine' => 1.2,
	],

];

function search( array $searchObjects, array $searchParams ) {

	$res = [];

	foreach( $searchObjects as $carName => $carObj ) {
		
		$check = 0;
		
		foreach( $searchParams as $paramKey => $param ) {
			
			if( $paramKey == 'sort' ) continue;
			
			if( $param['key'] != '' && $param['val'] != '' ) {
				
				if( $carObj[$param['key']] == $param['val'] ) {
					$check = 1;
				}
				else {
					$check = 0;
					break;
				}
			}
		}
		
		if( $check == 1 ) $res[$carName] = $carObj;
	}
	
	if( isset($searchParams['sort']) && $searchParams['sort']['key'] != '' ) {
		
		uasort( $res, function($a, $b) use($searchParams)  {
			
			if ( $a[$searchParams['sort']['key']] == $b[$searchParams['sort']['key']] ) {
				return 0;
			} 
			else if( $a[$searchParams['sort']['key']] > $b[$searchParams['sort']['key']] ) {
				return ( $searchParams['sort']['order'] == 'down' ) ? -1 : 1;
			}
			else {
				return ( $searchParams['sort']['order'] == 'down' ) ? 1 : -1;
			}
		});
	}
	return $res;
}

$res = search( $cars, $_GET );

var_dump( $res );





?>

<form method="GET" action="" >
	
	<select name="param1[key]">
		<option value="">---</option>
		<option value="mark">Mark</option>
		<option value="engine">Engine</option>
		<option value="year">year</option>
		<option value="type">type</option>
		<option value="number">number</option>
	</select>
	
	<input name="param1[val]" >
	
	<br/ >
	
	<select name="param2[key]">
		<option value="">---</option>
		<option value="mark">Mark</option>
		<option value="engine">Engine</option>
		<option value="year">year</option>
		<option value="type">type</option>
		<option value="number">number</option>
	</select>
	
	<input name="param2[val]" >
	
	<br/ >
	
	<select name="param3[key]">
		<option value="">---</option>
		<option value="mark">Mark</option>
		<option value="engine">Engine</option>
		<option value="year">year</option>
		<option value="type">type</option>
		<option value="number">number</option>
	</select>
	
	<input name="param3[val]" >
	
	<br/ >
	
	<select name="param4[key]">
		<option value="">---</option>
		<option value="mark">Mark</option>
		<option value="engine">Engine</option>
		<option value="year">year</option>
		<option value="type">type</option>
		<option value="number">number</option>
	</select>
	
	<input name="param4[val]" >
	
	<br/ >
	
	<select name="param5[key]">
		<option value="">---</option>
		<option value="mark">Mark</option>
		<option value="engine">Engine</option>
		<option value="year">year</option>
		<option value="type">type</option>
		<option value="number">number</option>
	</select>
	
	<input name="param5[val]" >
	
	<br/>
	
	
	<select name="sort[key]">
		<option value="">---</option>
		<option value="mark">Mark</option>
		<option value="engine">Engine</option>
		<option value="year">year</option>
		<option value="type">type</option>
		<option value="number">number</option>
	</select>
	
	<select name="sort[order]">
		<option value="up">Зростання</option>
		<option value="down">Спадання</option>
	</select>
	
	<button type="submit">Send</button>
	
</form>



<?php

if (false !== strpos($_SERVER['REQUEST_URI'], 'guestbook')) {
	include "GuestBook.php";
}
else if( $_SERVER['REQUEST_URI'] == '/' ) {
	include "MainView.php";
}

// GuestBook.php









