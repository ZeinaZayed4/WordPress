<?php

if (comments_open()) {
	wp_list_comments();
} else {
	echo 'Comments are disabled';
}
