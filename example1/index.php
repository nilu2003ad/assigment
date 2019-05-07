<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<script> 
	$(document).ready(function() { 
		$("#mainBtn").click(function() { 
			var words 			= $("#words").val();
			var text_length 	= $("#text_length").val();
			
			
			if(words === '' || words === 0 || text_length === '' || text_length === 0) {
				// If nothing defined in the text boxes
				alert("Please enter digit more than 0");
			} else {
				for (var i = 1; i <= words; i++) {
					$("#textboxDiv").append('<div><br><input required type="text" maxlength="'+text_length+'" name="dictText'+i+'" id="dictText'+i+'"/><br></div>');
				}
				$("#textboxDiv").append('<div><br><input type="submit" name="saveWords" id="saveWords" value="Save Words"/><br></div>');
				$("#mainBtn").hide();
				$('#dictionaryWords').css("display","block");
				$('#words').attr('readonly', true);
				$('#text_length').attr('readonly', true);
			}
		});
	});
	
	$(document).on('click', '#saveWords', function(){ 
		// save words
		var words = $("#words").val();
		var dict = [];
		for (var i = 1; i <= words; i++) {
			var temp = $("#dictText"+i).val();
			if(temp !== '') {
				dict.push(temp);
			}
		}
		if(dict.length === 0) {
			alert("Enter some values at least");
		} else {
			var getitems = dict;
			$("#hiddenDict").val(getitems);
			$('#showDiv').css("display","block");
		}
	});
</script>


<form>
Enter no of words: <input type="text" name="words" id="words" value="5" maxlength="2" minlength="2" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
<br>
Enter length of word: <input type="text" name="text_length" id="text_length" value="3"  maxlength="2" minlength="2" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
<br>
<input type="button" id="mainBtn" value="Submit">
</form>

<br><span id="dictionaryWords" style="display:none">Enter dictionary words</span><br>
<div id="textboxDiv"></div>

<div id="showDiv" style="display:none">
<form name="searchForm" id="searchForm" method="post" action="show.php">
<br>
<input type="hidden" name="dict" id="hiddenDict" value="">
<input type="text" name="txtShow" id="txtShow" value=""> - <input type="submit" name="submitShow" value="Show">
<br>
</form>
</div>
