<?
	require_once("java/Java.inc");
	
	$trx = new Java("com.hitrust.b2ctoolkit.b2cpay.B2CPayOther");
	$trx->setStoreId("XXXXX");
	$trx->setType($trx->QUERY);
	$trx->setOrderNo($ordernumber);
	$trx->transaction();
?>

<html>
<body>
<h1>
<CENTER>                                                                
                                                                      
<TABLE BORDER=1 CELLPADDING=3>                                        
<TR><TD COLSPAN=2 ALIGN=CENTER>�^�ǵ��G</TD></TR>
<TR>                                                                  
	<TD>�q��s��</TD>
	<TD><FONT COLOR=RED><?echo $trx->getOrderNo()?></FONT></TD>           
</TR>                                                                 
<TR>                                                                  
	<TD>����^�ǽX</TD>
	<TD><FONT COLOR=RED><?echo $trx->getRetCode()?></FONT</TD>           
</TR>
<TR>                                                                  
	<TD>���O</TD>                                           
	<TD><FONT COLOR=RED><?echo $trx->getCurrency()?></FONT</TD>            
</TR>
<TR>                                                                  
	<TD>�q����</TD>                                           
	<TD><FONT COLOR=RED><?echo $trx->getOrderDate()?></FONT</TD>            
</TR>
<TR>                                                                  
	<TD>�q�檬�A�X</TD>                                           
	<TD><FONT COLOR=RED><?echo $trx->getOrderStatus()?></FONT</TD>            
</TR>                                                                
<TR>                                                                  
	<TD>�֭���B</TD>                                           
	<TD><FONT COLOR=RED><?echo $trx->getApproveAmount()?></FONT</TD>            
</TR>
<TR>                                                                  
	<TD>�Ȧ���v�X</TD>                                           
	<TD><FONT COLOR=RED><?echo $trx->getAuthCode()?></FONT</TD>            
</TR>
<TR>                                                                  
	<TD>�Ȧ�ճ�s��</TD>                                           
	<TD><FONT COLOR=RED><?echo $trx->getAuthRRN()?></FONT</TD>            
</TR>
<TR>                                                                  
	<TD>�дڪ��B</TD>                                           
	<TD><FONT COLOR=RED><?echo $trx->getCaptureAmount()?></FONT</TD>            
</TR>  
<TR>                                                                  
	<TD>�дڧ妸��</TD>                                           
	<TD><FONT COLOR=RED><?echo $trx->getPayBatchNum()?></FONT</TD>            
</TR>
<TR>                                                                  
	<TD>�дڤ��</TD>                                           
	<TD><FONT COLOR=RED><?echo $trx->getCaptureDate()?></FONT</TD>            
</TR> 
<TR>                                                                  
	<TD>�h�ڪ��B</TD>                                           
	<TD><FONT COLOR=RED><?echo $trx->getRefundAmount()?></FONT</TD>            
</TR>
<TR>                                                                  
	<TD>�h�ڧ妸��</TD>                                           
	<TD><FONT COLOR=RED><?echo $trx->getRefundBatch()?></FONT</TD>            
</TR> 
<TR>                                                                  
	<TD>�h�ڽճ�s��</TD>                                           
	<TD><FONT COLOR=RED><?echo $trx->getRefundRRN()?></FONT</TD>            
</TR>
<TR>                                                              
	<TD>�h�ڽX</TD>                                           
	<TD><FONT COLOR=RED><?echo $trx->getRefundCode()?></FONT</TD>            
</TR>
<TR>                                                                  
	<TD>�h�ڤ��</TD>                                           
	<TD><FONT COLOR=RED><?echo $trx->getRefundDate()?></FONT</TD>            
</TR>
<TR>                                                                  
	<TD>����Ȧ�</TD>                                           
	<TD><FONT COLOR=RED><?echo $trx->getAcquirer()?></FONT</TD>            
</TR>                                                       
<TR>                                                                  
	<TD>�d�O</TD>                                           
	<TD><FONT COLOR=RED><?echo $trx->getCardType()?></FONT</TD>            
</TR>                                                       
<TR>                                                                  
	<TD>���v�覡</TD>                                           
	<TD><FONT COLOR=RED><?echo $trx->getEci()?></FONT</TD>            
</TR>                                                       
</TABLE>                                                              
</CENTER>
</h1>
</body>
</html>