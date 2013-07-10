<html>
<head>
<script type="text/javascript">
function tot(elem) {
var d=document.getElementById("total").value;
var total=Number(d); 
var e=document.getElementById("vat5").value;
var vat5=Number(e); 
var f=document.getElementById("vat12_5").value;
var vat12_5=Number(f); 
var g=document.getElementById("cash_discount").value;
var cash_discount=Number(g); 

var h=(total+vat5+vat12_5)-cash_discount;
document.getElementById("grand_total").value = h;
}

var total = 0;
function getValues() {
var qty = 0;
var rate = 0;
var obj = document.getElementsByTagName("input");
      for(var i=0; i<obj.length; i++){
         if(obj[i].name == "qty[]"){var qty = obj[i].value;}
         if(obj[i].name == "rate[]"){var rate = obj[i].value;}
         if(obj[i].name == "amt[]"){
          		if(qty > 0 && rate > 0){obj[i].value = qty*rate;total+=(obj[i].value*1);}
          				else{obj[i].value = 0;total+=(obj[i].value*1);}
          		}
         	 }
        document.getElementById("total").value = total*1;
        total=0;
}

</script>
<script type="text/javascript">
function addRow(tableID) {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
            var colCount = table.rows[0].cells.length;
            for(var i=0; i<colCount; i++) {
                var newcell = row.insertCell(i);
                newcell.innerHTML = table.rows[0].cells[i].innerHTML;
                //alert(newcell.childNodes);
                switch(newcell.childNodes[0].type) {
                    case "text":
                            newcell.childNodes[0].value = "";
                            break;
                    case "checkbox":
                            newcell.childNodes[0].checked = false;
                            break;
                    case "select-one":
                            newcell.childNodes[0].selectedIndex = 0;
                            break;
                }
            }
        }
		
				function deleteRow(tableID)
{
            try
                 {
                var table = document.getElementById(tableID);
                var rowCount = table.rows.length;
                    for(var i=0; i<rowCount; i++)
                        {
                        var row = table.rows[i];
                        var chkbox = row.cells[0].childNodes[0];
                        if (null != chkbox && true == chkbox.checked)
                            {
                            if (rowCount <= 1)
                                {
                                alert("Cannot delete all the rows.");
                                break;
                                }
                            table.deleteRow(i);
                            rowCount--;
                            i--;
                            }
                        }
                    } catch(e)
                        {
                        alert(e);
                        }
   getValues();
}
</script>

</head>
<body>
<form name="gr" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" onSubmit="return validateForm(this)">
<tr>
<td class="forhead" style="white-space:nowrap;">
<input type="button" value="Add Row" onClick="addRow('dataTable')" >&nbsp;
<input type="button" value="Delete Row" onClick="deleteRow('dataTable')" ></td>
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
<td width="80" align="right" class="forhead" style="white-space:nowrap;">
<select name="vat[]" style="width:80px" onChange="getValues()">
<option value="0">Select</option>
<option value="5">5</option>
<option value="12.5">12.5</option>
</select>
</td>
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