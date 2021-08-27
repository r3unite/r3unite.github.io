<?php


$articlePrefix = 'art_';
$locString = 'data\articles\\' . $articlePrefix . $articleNameID . '\\'  ;
$articlesFolder = 'articles';	
	
	function importArticleData($articleID) 
	{
		

		$articlePrefix = 'art_';
		$locString = 'data\articles\\' . $articlePrefix . $articleID . '\\'  ;
		if (file_exists($locString . $articleID.'.dat'))
		{
			return parse_ini_string(file_get_contents($locString . $articleID .'.dat'));
		}
		else
		{
			header('location: category.php');

			return parse_ini_string('[ARTICLE_UI]
					article_name = "null:no article_name handler"
					article_description = "Ez egy leiras"
					article_tags = "fa|vagodeszka|ajandek"
					types_noun = "null:types_noun"
					size_1_noun = "null:size_1_noun "
					size_2_noun = "null:size_2_noun"
					type_1_noun = "null:type_1_noun"


					[ARTICLE_DATA]
					nfcCapable = "null:nfcCapable"
					deisgnable = "null:deisgnable"
					sizeNumber = "null:sizeNumber"
					typeNumber = "null:typeNumber"
					sideNumber = "null:sideNumber"

					[ARTICLE_PATH]
					size_1_path = "null:size_1_path"
					size_2_path = "null:size_2_path"
					type_1_path = "null:type_1_path"
					
					[ARTICLE_CATEGORIES]
					fall_into_categories = 2
					cat1 = "category_new"
					cat2 = "category_wood"
					discount = 0
					printTypes = "laser-engrave|print"
					thumb_number = 3');
		}
	}
	




?>