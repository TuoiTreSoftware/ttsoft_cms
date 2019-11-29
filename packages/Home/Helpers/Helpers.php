<?php

function getContent($cate)
{
	$home = Home::where('category',$cate)->get();

}


