<form name="paypalForm" action="paypal.php" method="post">
<input type="hidden" name="id" value="123">
<input type="hidden" name="CatDescription" value="Donation to Zoo On Web">
                       <input type="hidden" name="payment" value="100">  
                       <input type="hidden" name="key" value="<? echo md5(date("Y-m-d:").rand()); ?>">
                           
                                    
<input type="submit" name="paypal"  value="Payment via Paypal" >
</form>