<html>
<head>
<script type="text/javascript">

var total = 0;
function getValues() {
var qty = 0;
var rate = 0;
var obj = document.getElementsByTagName("input");
         var name == qty;
          var name2 == rate;
          var name3 == amt;
		var name4 = qty*rate;total+=obj[].value*1;
         document.getElementById("total").value = total*1;
         total=0;
}

</script>


</head>
<body>
<form name="gr" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" onSubmit="return validateForm(this)">
<tr>
<table width="38%" align="center" cellpadding="0" cellspacing="0" class="normal-text" border="0">
<td width="20"></td>
<td width="80" class="forhead" style="white-space:nowrap;">Qty</td>
<td width="80" class="forhead" style="white-space:nowrap;">Rate</td>
<td width="80" class="forhead" style="white-space:nowrap;">Amount</td>
<td width="80" class="forhead" style="white-space:nowrap;">Vat</td>
<td width="80" class="forhead" style="white-space:nowrap;">Vat Amount</td>
</tr>
</table>


<table border="0" id="dataTable" width="38%" align="center" cellpadding="0" cellspacing="0" class="normal-text">
<tr>
<td class="forhead" style="white-space:nowrap;" width="20"><input type="checkbox" name="chk[]"/></td>
<td class="forhead" style="white-space:nowrap;" width="80"><input type="text"  name="qty[]"  onkeyup="getValues()" style="width:80px;" onBlur=""></td>
<td class="forhead" style="white-space:nowrap;" width="80"><input type="text"  name="rate[]" onKeyUp="getValues()" style="width:80px;" value=""></td>
<td class="forhead" style="white-space:nowrap;" width="80"><input type="text"  name="amt[]" style="width:80px;" 
onKeyUp="getValues()"></td>







<td class="forhead" style="white-space:nowrap;" width="80"><input type="text"  name="vat_amt[]" style="width:80px;"></td>
</tr>
</table>
<table width="38%" align="center" cellpadding="0" cellspacing="0" class="normal-text" border="0">
<tr>
<td width="20" class="forhead" style="white-space:nowrap;">&nbsp;</td>
<td width="80" class="forhead" style="white-space:nowrap;">Gross Total:</td>
<td width="80" class="forhead" style="white-space:nowrap;">&nbsp;</td>
<td width="80" class="forhead" style="white-space:nowrap;">&nbsp;</td>
<td width="80" class="forhead" style="white-space:nowrap;">&nbsp;</td>
<td width="80" class="forhead" style="white-space:nowrap;"><input type="text"  id="total" name="total[]" style="width:80px;" value=""></td>

</tr>
<tr>
<td class="forhead" style="white-space:nowrap;">&nbsp;</td>
<td class="forhead" style="white-space:nowrap;">Vat 5%:</td>
<td class="forhead" style="white-space:nowrap;">&nbsp;</td>
<td class="forhead" style="white-space:nowrap;">&nbsp;</td>
<td class="forhead" style="white-space:nowrap;">&nbsp;</td>
<td class="forhead" style="white-space:nowrap;"><input type="text"  name="vat5[]" id="vat5" style="width:80px;"></td>
</tr>
<tr>
<td class="forhead" style="white-space:nowrap;">&nbsp;</td>
<td class="forhead" style="white-space:nowrap;">Vat 12.5%:</td>
<td class="forhead" style="white-space:nowrap;">&nbsp;</td>
<td class="forhead" style="white-space:nowrap;">&nbsp;</td>
<td class="forhead" style="white-space:nowrap;">&nbsp;</td>
<td class="forhead" style="white-space:nowrap;"><input type="text"  name="vat12_5[]" id="vat12_5" style="width:80px;"></td>
</tr>
<tr>
<td class="forhead" style="white-space:nowrap;">&nbsp;</td>
<td class="forhead" style="white-space:nowrap;">Cash Dis :</td>
<td class="forhead" style="white-space:nowrap;">&nbsp;</td>
<td class="forhead" style="white-space:nowrap;">&nbsp;</td>
<td class="forhead" style="white-space:nowrap;">&nbsp;</td>
<td class="forhead" style="white-space:nowrap;"><input type="text"  id="cash_discount" name="cash_discount[]" style="width:80px;" value=""></td>
</tr>
<tr>
<td class="forhead" style="white-space:nowrap;">&nbsp;</td>
<td class="forhead" style="white-space:nowrap;">Total :</td>
<td class="forhead" style="white-space:nowrap;">&nbsp;</td>
<td class="forhead" style="white-space:nowrap;">&nbsp;</td>
<td class="forhead" style="white-space:nowrap;">&nbsp;</td>
<td class="forhead" style="white-space:nowrap;"><input type="text"  name="grand_total" id="grand_total" onKeyUp="tot()" style="width:80px;"></td>
</tr>
<tr>
<td align="center" colspan="6">
<input name="Submit" type="submit" value="Save" style="text-decoration:none"/>
<input type="reset" value="Cancel" onClick="window.location.href='<?php echo $_SERVER['PHP_SELF'];?>'">
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</form>
</body>
</html>