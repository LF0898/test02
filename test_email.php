<?php

	// Pear Mail ��չ  
	require_once('Mail.php');  
	require_once('Mail/mime.php');  
	require_once('Net/SMTP.php');  
	  
	$smtpinfo = array();  
	$smtpinfo["host"] = "smtp.163.com";//SMTP������  
	$smtpinfo["port"] = "25"; //SMTP�������˿�  
	$smtpinfo["username"] = "18889588071@163.com"; //����������  
	$smtpinfo["password"] = "****************";//��������������  
	$smtpinfo["timeout"] = 10;//���糬ʱʱ�䣬��  
	$smtpinfo["auth"] = true;//��¼��֤  
	//$smtpinfo["debug"] = true;//����ģʽ  
	  
	// �ռ����б�  
	$mailAddr = array('18889588071@163.com');  
	  
	// ��������ʾ��Ϣ  
	$from = "Name <18889588071@163.com>";  
	  
	// �ռ�����ʾ��Ϣ  
	$to = implode(',',$mailAddr);  
	  
	// �ʼ�����  
	$subject = "����һ������ʼ�";  
	  
	// �ʼ�����  
	$content = "<h3>���д��ʲô</h3>";  
	  
	// �ʼ��������ͣ���ʽ�ͱ���  
	$contentType = "text/html; charset=utf-8";  
	  
	//���з��� Linux: \n  Windows: \r\n  
	$crlf = "\n";  
	$mime = new Mail_mime($crlf);  
	$mime->setHTMLBody($content);  
	  
	$param['text_charset'] = 'utf-8';  
	$param['html_charset'] = 'utf-8';  
	$param['head_charset'] = 'utf-8';  
	$body = $mime->get($param);  
	  
	$headers = array();  
	$headers["From"] = $from;  
	$headers["To"] = $to;  
	$headers["Subject"] = $subject;  
	$headers["Content-Type"] = $contentType;  
	$headers = $mime->headers($headers);  
	  
	$smtp =& Mail::factory("smtp", $smtpinfo);  
	  
	  
	$mail = $smtp->send($mailAddr, $headers, $body);  
	$smtp->disconnect();  
	  
	if (PEAR::isError($mail)) {  
	    //����ʧ��  
	    echo 'Email sending failed: ' . $mail->getMessage()."\n";  
	}  
	else{  
	    //���ͳɹ�  
	    echo "success!\n";  
	}  