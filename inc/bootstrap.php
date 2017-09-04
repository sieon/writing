<?php

/**
 * 为日历增加样式
 */
add_filter('get_calendar','calendar_class_add');
function calendar_class_add($content){
	return preg_replace("/<table(.*)>/i","<table class='table table-responsive' $1>",$content);
}
