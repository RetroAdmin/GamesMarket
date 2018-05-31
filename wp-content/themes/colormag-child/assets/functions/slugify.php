<?php

function renommerString($string) {
	$a_remplacer_a = array('à','á','â','ã','ä','å','À','Á','Â','Ã','Ä','Å');
	$remplace_a =    array('a','a','a','a','a','a','A','A','A','A','A','A');
	$a_remplacer_b_c_d = array('þ','ß','ç','Ç','Ð');
	$remplace_b_c_d  =   array('b','b','c','C','D');
	$a_remplacer_e = array('é','è','ë','ê','É','€','È','É','Ê','Ë');
	$remplace_e  =   array('e','e','e','e','E','E','E','E','E','E');
	$a_remplacer_i = array('ì','í','î','ï','Ì','Í','Î','Ï');
	$remplace_i  =   array('i','i','i','i','I','I','I','I');
	$a_remplacer_n = array('ñ','Ñ');
	$remplace_n  =   array('n','N');
	$a_remplacer_o = array('ò','ó','ô','õ','ö','Ò','Ó','Ô','Õ','Ö','Ø');
	$remplace_o  =   array('o','o','o','o','o','O','O','O','O','O','O');
	$a_remplacer_s = array('š','Š','$','§');
	$remplace_s  =   array('s','S','S','S');
	$a_remplacer_u = array('ù','ú','û','ü','µ','Ù','Ú','Û','Ü');
	$remplace_u  =   array('u','u','u','u','u','U','U','U','U');
	$a_remplacer_y = array('ý','ÿ','Ý','Ÿ');
	$remplace_y  =   array('y','y','Y','Y');
	$a_remplacer_double = array('Æ' ,'æ' ,'Œ' ,'œ');
	$remplace_double =    array('AE','ae','OE','oe');

	$a_remplacer = array_merge($a_remplacer_a,$a_remplacer_b_c_d,$a_remplacer_e,$a_remplacer_i,$a_remplacer_n,$a_remplacer_o,$a_remplacer_s,$a_remplacer_u,$a_remplacer_y);
	$remplace = array_merge($remplace_a,$remplace_b_c_d,$remplace_e,$remplace_i,$remplace_n,$remplace_o,$remplace_s,$remplace_u,$remplace_y,$remplace_double);
	return str_replace($a_remplacer, $remplace, $string);
}

function renommerPonctuation($string) {
	$a_remplacer_ponct = array(' ! ',' !','! ','¡',' ? ',' ?','? ',' . ',' .','. ',' " ',' "','" ',' \' ',' \'','\' ','\'',' ; ',' ;','; ',' : ',' :',': ',' , ',' ,',', ',' / ',' /','/ ',' \\ ',' \\','\\ ',' - ','---','--');
	$remplace_ponct  =   array('-'  ,'-' ,'-' ,'-','-'  ,'-' ,'-' ,'-'  ,'-' ,'-' ,'-'  ,'-' ,'-' ,'-'   ,'-'  ,'-'  ,'-' ,'-'  ,'-' ,'-' ,'-'  ,'-' ,'-' ,'-'  ,'-' ,'-' ,'-'  ,'-' ,'-' ,'-'   ,'-'  ,'-'  ,'-','-','-');
	$a_remplacer_paren = array(' ( ',' (','( ',' ) ',' )',') ',' { ',' {','{ ',' } ',' }','} ',' [ ',' [','[ ',' ] ',' ]','] ');
	$remplace_paren  =   array('-'  ,'-' ,'-' ,'-'  ,'-' ,'-' ,'-'  ,'-' ,'-' ,'-'  ,'-' ,'-' ,'-'  ,'-' ,'-' ,'-'  ,'-' ,'-' );
	$a_remplacer_symb = array(' # ',' #','# ',' ~ ',' ~','~ ',' ^ ',' ^','^ ',' ¨ ',' ¨','¨ ',' ` ',' `','` ',' | ',' |','| ',' < ',' <','< ',' > ',' >','> ',' % ',' %','% ',' * ',' *','* ',' $ ',' $','$ ',' & ',' &','& ',' ² ',' ²','² ',' = ',' =','= ',' + ',' +','+ ',' ° ',' °','° ',' ¤ ',' ¤','¤ ');
	$remplace_symb  =   array('-'  ,'-' ,'-' ,'-'  ,'-' ,'-' ,'-'  ,'-' ,'-' ,'-'  ,'-' ,'-' ,'-'  ,'-' ,'-' ,'-'  ,'-' ,'-' ,'-'  ,'-' ,'-' ,'-'  ,'-' ,'-' ,'-'  ,'-' ,'-' ,'-'  ,'-' ,'-' ,'-'  ,'-' ,'-' ,'-'  ,'-' ,'-' ,'-'  ,'-' ,'-' ,'-'  ,'-' ,'-' ,'-'  ,'-' ,'-' ,'-'  ,'-' ,'-' ,'-'  ,'-' ,'-' );

	$a_remplacer_ponct_seule = array('!','?',',',';',':','.','/','\\','§','(',')','[',']','{','}','|','`','<','>','#','^','¨','"');
	$remplace_ponct_seule = array('','','','','','','','','','','','','','','','','','','','','','','','');

	$a_remplacer = array_merge($a_remplacer_ponct,$a_remplacer_paren,$a_remplacer_symb,$a_remplacer_ponct_seule);
	$remplace = array_merge($remplace_ponct,$remplace_paren,$remplace_symb,$remplace_ponct_seule);
	return str_replace($a_remplacer, $remplace, $string);
}





function rennommerSlug($string){
	$string = mb_convert_encoding($string, "UTF-8", "HTML-ENTITIES");

	$a_remplacer_nb_romain = array('(I)','(II)','(III)','(IV)','(V)','(VI)');
	$remplace_nb_romain =    array('1'  ,'2'  ,'3'  ,'4'  ,'5'  ,'6'  );
	$string = str_replace($a_remplacer_nb_romain, $remplace_nb_romain, $string);

	$string = renommerString($string);
	$string = renommerPonctuation($string);

	$string = str_replace(' ','-', $string);
	$string = strtolower($string);

	if(substr($string, -1) == '-') $string = substr($string,0,-1);
	if(substr($string,0,1) == '-') $string = substr($string,1);

	return $string;
}



?>
