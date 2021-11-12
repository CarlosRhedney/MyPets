<?php
use \Mypets\Model\User;

function checkLogin($inadmin = true)
{
	return User::checkLogin($inadmin);
}

function getUserName()
{
	$user = User::getFromSession();

	return $user->getidperson();

}

?>