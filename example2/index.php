<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<script> 
	$(document).ready(function() { 
		$("#mainBtn").click(function() { 
			var words 			= $("#words").val();
			
			if(words === '' || words === 0) {
				// If nothing defined in the text boxes
				alert("Please enter digit more than 0");
			} else {
				for (var i = 1; i <= words; i++) {
					$("#textboxDiv").append('<div><br>S1: <input required type="text" name="dictText'+i+'" id="dictText'+i+'"/><br>S2: <input required type="text" name="searchWord'+i+'" id="searchWord'+i+'"/><br>C: <select name="c'+i+'" id="c'+i+'"><option value="Y">Y</option><option value="N">N</option></select><br>I: <input required type="text" name="position'+i+'" id="position'+i+'"/><br></div>');
				}
				$("#textboxDiv").append('<div><br><input type="submit" name="saveWords" id="saveWords" value="Save Words"/><br></div>');
				$("#mainBtn").hide();
				$('#dictionaryWords').css("display","block");
				$('#words').attr('readonly', true);
				$("#hiddenDict").val(words);
			}
		});
	});
</script>

<form>
Enter no of words: <input type="text" name="words" id="words" value="3" maxlength="2" minlength="2" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
<br>
<input type="button" id="mainBtn" value="Submit">
</form>

<form name="example2" id="example2" method="post" action="search.php">
<input type="hidden" name="dict" id="hiddenDict">
<br><span id="dictionaryWords" style="display:none">Enter dictionary words</span><br>
<div id="textboxDiv"></div>
</form>