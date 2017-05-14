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
<TR><TD COLSPAN=2 ALIGN=CENTER>回傳結果</TD></TR>
<TR>                                                                  
	<TD>訂單編號</TD>
	<TD><FONT COLOR=RED><?echo $trx->getOrderNo()?></FONT></TD>           
</TR>                                                                 
<TR>                                                                  
	<TD>交易回傳碼</TD>
	<TD><FONT COLOR=RED><?echo $trx->getRetCode()?></FONT</TD>           
</TR>
<TR>                                                                  
	<TD>幣別</TD>                                           
	<TD><FONT COLOR=RED><?echo $trx->getCurrency()?></FONT</TD>            
</TR>
<TR>                                                                  
	<TD>訂單日期</TD>                                           
	<TD><FONT COLOR=RED><?echo $trx->getOrderDate()?></FONT</TD>            
</TR>
<TR>                                                                  
	<TD>訂單狀態碼</TD>                                           
	<TD><FONT COLOR=RED><?echo $trx->getOrderStatus()?></FONT</TD>            
</TR>                                                                
<TR>                                                                  
	<TD>核准金額</TD>                                           
	<TD><FONT COLOR=RED><?echo $trx->getApproveAmount()?></FONT</TD>            
</TR>
<TR>                                                                  
	<TD>銀行授權碼</TD>                                           
	<TD><FONT COLOR=RED><?echo $trx->getAuthCode()?></FONT</TD>            
</TR>
<TR>                                                                  
	<TD>銀行調單編號</TD>                                           
	<TD><FONT COLOR=RED><?echo $trx->getAuthRRN()?></FONT</TD>            
</TR>
<TR>                                                                  
	<TD>請款金額</TD>                                           
	<TD><FONT COLOR=RED><?echo $trx->getCaptureAmount()?></FONT</TD>            
</TR>  
<TR>                                                                  
	<TD>請款批次號</TD>                                           
	<TD><FONT COLOR=RED><?echo $trx->getPayBatchNum()?></FONT</TD>            
</TR>
<TR>                                                                  
	<TD>請款日期</TD>                                           
	<TD><FONT COLOR=RED><?echo $trx->getCaptureDate()?></FONT</TD>            
</TR> 
<TR>                                                                  
	<TD>退款金額</TD>                                           
	<TD><FONT COLOR=RED><?echo $trx->getRefundAmount()?></FONT</TD>            
</TR>
<TR>                                                                  
	<TD>退款批次號</TD>                                           
	<TD><FONT COLOR=RED><?echo $trx->getRefundBatch()?></FONT</TD>            
</TR> 
<TR>                                                                  
	<TD>退款調單編號</TD>                                           
	<TD><FONT COLOR=RED><?echo $trx->getRefundRRN()?></FONT</TD>            
</TR>
<TR>                                                              
	<TD>退款碼</TD>                                           
	<TD><FONT COLOR=RED><?echo $trx->getRefundCode()?></FONT</TD>            
</TR>
<TR>                                                                  
	<TD>退款日期</TD>                                           
	<TD><FONT COLOR=RED><?echo $trx->getRefundDate()?></FONT</TD>            
</TR>
<TR>                                                                  
	<TD>收單銀行</TD>                                           
	<TD><FONT COLOR=RED><?echo $trx->getAcquirer()?></FONT</TD>            
</TR>                                                       
<TR>                                                                  
	<TD>卡別</TD>                                           
	<TD><FONT COLOR=RED><?echo $trx->getCardType()?></FONT</TD>            
</TR>                                                       
<TR>                                                                  
	<TD>授權方式</TD>                                           
	<TD><FONT COLOR=RED><?echo $trx->getEci()?></FONT</TD>            
</TR>                                                       
</TABLE>                                                              
</CENTER>
</h1>
</body>
</html>