<?php 
/**
 * 常用的RegExp
 * ------------------------
 * Anchors:
 * 		^ 		string的开始
 *   	$ 		string的结束
 *    	\b 		词的边界
 * Charsets:
 * 		\s 		while space
 * 		\S 		non while space
 * 		\w 		字母和数字
 *   	\W 		非字母和数字
 *   	\d 		数字
 *   	\D 		非数字
 * Quantifiers:
 * 		*		0 or more
 * 		+		1 or more
 * 		?		0 or 1
 * 		{3,5}	3,4 or 5
 * 		{3}		3
 * 		{3,}	3 or more
 * Special char:
 * 		\n 		换行
 * 		\t 		tab
 * Group:
 * 		.		除\n之外的任何char
 * 		a|b 	a or b
 * 		(...)	group
 * 		(?:...)	non-capture group
 * 		[a-z]	任意一个小写字母
 * 		[^a-z]	任意一个非小写字母
 * 		[0-9]	任意一个数字
 * Assertions:(断言？)
 * 		(?=)	lookahead assertion
 * 		(?!)	negative lookhead
 * 		(?<=)	lookbehind assertion
 * 		(?!=)	negative lookbehind
 * ------------------------
 */

/**
 * print result of regexp test
 * @param  regexp $regex   regexp to be tested
 * @param  string $subject string to be tested
 * @param  string $test    test description
 * @return 
 */
function print_regexp_test($regex, $subject, $test){
	$check = preg_match($regex, $subject) ? "true" : "false";
	echo ($check . " for " . $test . " test.<br />") ;
}

/**
 * Demo 1. username or password
 */
$regex_usr = '/^[a-zA-Z0-9_-]{6,18}$/';
print_regexp_test($regex_usr, "fiaj_u82-df", "username/password");

/**
 * Demo 2. email
 */
$regex_email = '/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z]{2,6})$/';
print_regexp_test($regex_email, "lei@example.com", "email");

/**
 * Demo 3. ip address
 */
$regex_ip = '/^((2[0-4]\d|25[0-5]|[01]?\d?\d)\.){3}(2[0-4]\d|25[0-5]|[01]?\d?\d)$/';
print_regexp_test($regex_ip, "192.168.0.2", "ip address");

/**
 * Demo 4. URL
 */

/**
 * Demo 5. HTML
 */




