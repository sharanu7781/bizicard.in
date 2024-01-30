<?php
/*
if(isset($_POST) && !empty($_POST)) {
    //echo "<pre>";print_r($_POST);die;
    

    //header("Location:https://web.whatsapp.com/send?phone=917410010467&text=".$enquiry_string);

    $enquiry_string = "Enquiry Details - \n Type Of Paper - ".$_POST['type_of_paper']." \n Width and Size - ".$_POST['width_of_size']."";

    if($_POST['instruction'] != '')
        $enquiry_string .= "\n special Instructions - ".$_POST['instruction'];

    echo $enquiry_string;die;
        //header("Location:https://web.whatsapp.com/send?phone=917410010467&text=".$enquiry_string);
    echo '<script>var win = window.open("https://web.whatsapp.com/send?phone=917410010467&text='.$enquiry_string.'", "_blank");if (win) {win.focus();} else {  alert("Please allow popups for this website");}</script>';
}*/
?>
<!DOCTYPE html>
<html>

<style>
/* Style inputs with type="text", select elements and textareas */
input[type=text], select, textarea {
  width: 100%; /* Full width */
  padding: 12px; /* Some padding */ 
  border: 1px solid #ccc; /* Gray border */
  border-radius: 4px; /* Rounded borders */
  box-sizing: border-box; /* Make sure that padding and width stays in place */
  margin-top: 6px; /* Add a top margin */
  margin-bottom: 16px; /* Bottom margin */
  resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

/* Style the submit button with a specific background color etc */
input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

/* When moving the mouse over the submit button, add a darker green color */
input[type=submit]:hover {
  background-color: #45a049;
}

/* Add a background color and some padding around the form */
.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
.hidden{display:none}
body {
  font-family: Arial, Helvetica, sans-serif; font-size:14px;
}
label{font-weight:bold}
</style>
<body>
<div class="container">
  <form action="" method="POST" class="enquiry_form">
    <h4>Please fill your enquiry details</h4>
    <label for="">Type of paper</label><br/>
    <input type="radio" required class="type_of_paper" name="type_of_paper" value="Fluting medium paper" >Fluting medium paper<br/>
    <input type="radio" required class="type_of_paper" name="type_of_paper" value="Test Liner Paper" >Test Liner Paper<br/>
    <input type="radio" required class="type_of_paper" name="type_of_paper" value="Kraft Liner Paper" >Kraft Liner Paper<br/>
    <input type="radio" required class="type_of_paper" name="type_of_paper" value="Duplex Paper" >Duplex Paper<br/>
    <input type="radio" required class="type_of_paper" name="type_of_paper" value="Bag Grade Paper" >Bag Grade Paper<br/><br/>

    <div id="fluting_medium_paper_option" class="hidden">
        <label for="">Width and Size</label><br/>
        <input type="radio" required class="width_and_size" name="width_of_size" value="Machine size 3.8 meters - 100 gsm to 180 gsm - 500 tons per day( 3 machines combined)" >Machine size 3.8 meters - 100 gsm to 180 gsm - 500 tons per day( 3 machines combined)<br>
        <input type="radio" required class="width_and_size" name="width_of_size" value="Machine size 4.2 meters - 120 gsm to 180 gsm - 150 tons per dayr" >Machine size 4.2 meters - 120 gsm to 180 gsm - 150 tons per dayr<br/>
        <input type="radio" required class="width_and_size" name="width_of_size" value="Machine size 4.8 meters - 130 Gsm to 180 gsm - 300 tons per day" >Machine size 4.8 meters - 130 Gsm to 180 gsm - 300 tons per day<br/>
        <input type="radio" required class="width_and_size" name="width_of_size" value="Machine size 5.4 meters - 140 gsm to 180 gsm - 300 tons per day" >Machine size 5.4 meters - 140 gsm to 180 gsm - 300 tons per day<br/>
        <input type="radio" required class="width_and_size" name="width_of_size" value="Machine size 3.3 meters - 60 gsm to 90 gsm     - 100 tons per day" >Machine size 3.3 meters - 60 gsm to 90 gsm     - 100 tons per day<br/>
        <input type="radio" required class="width_and_size" name="width_of_size" value="Machine size 2.75 meters - 90 gsm to 180 gsm - 250 tons per day" >Machine size 2.75 meters - 90 gsm to 180 gsm - 250 tons per day<br/>
    </div>

    <div id="test_liner_paper_option" class="hidden">
        <label for="">Width and Size</label><br/>
        <input type="radio" required class="width_and_size" name="width_of_size" value="Machine size - 3.8 meters - 130 gsm to 180 gsm - 200 tons per day" >Machine size - 3.8 meters - 130 gsm to 180 gsm - 200 tons per day<br/>
        <input type="radio" required class="width_and_size" name="width_of_size" value="Machine size - 5.4 meters - 130 gsm to 180 gsm - 200 tons per day" >Machine size - 5.4 meters - 130 gsm to 180 gsm - 200 tons per day<br/>
        <input type="radio" required class="width_and_size" name="width_of_size" value="Machine size - 4.8 meters - 130 gsm t0 180 gsm - 200 tons per day" >Machine size - 4.8 meters - 130 gsm t0 180 gsm - 200 tons per day<br/>
    </div>

    <div id="kraft_liner_paper_option" class="hidden">
        <label for="">Width and Size</label><br/>
        <input type="radio" required class="width_and_size" name="width_of_size" value="Machine size - 5.4 meters - 130 gsm to 180 gsm - 300 tons per day" >Machine size - 5.4 meters - 130 gsm to 180 gsm - 300 tons per day<br/>
        <input type="radio" required class="width_and_size" name="width_of_size" value="Machine size - 4.8 meters - 130 gsm t0 180 gsm - 300 tons per day" >Machine size - 4.8 meters - 130 gsm t0 180 gsm - 300 tons per day<br/>
        <input type="radio" required class="width_and_size" name="width_of_size" value="Machine size - 3.3 meters - 140 gsm to 200 gsm - 300 tons per day" >Machine size - 3.3 meters - 140 gsm to 200 gsm - 300 tons per day<br/>
    </div>

    <div id="duplex_paper_option" class="hidden">
        <label for="">Width and Size</label><br/>
        <input type="radio" required class="width_and_size" name="width_of_size" value="Machine size - 3.2 meters 180 gsm to 550 gsm - 150 tons per day" >Machine size - 3.2 meters 180 gsm to 550 gsm - 150 tons per day<br/>
    </div>

    <div id="bag_grade_paper_option" class="hidden">
        <label for="">Width and Size</label><br/>
        <input type="radio" required class="width_and_size" name="width_of_size" value="Machine size - 2.8 meters - 50 gsm to 90 gsm - 150 tons per day" >Machine size - 2.8 meters - 50 gsm to 90 gsm - 150 tons per day<br/>
        <input type="radio" required class="width_and_size" name="width_of_size" value="Machine size - 3.3 meters - 60 gsm to 90 gsm - 150 tons per day" >Machine size - 3.3 meters - 60 gsm to 90 gsm - 150 tons per day<br/>
    </div>
    <br/>
    <label for="subject">Any extra Instructions</label>
    <textarea id="instruction" name="instruction" placeholder="Write something.." rows="5" cols="50"></textarea>

    <input type="submit" value="Submit">

  </form>
</div>

<script src="js_enquiry_form/jquery-3.5.1.js"></script>
<script>
    var type_of_paper = "";
    var width_size = "";

    $(".width_and_size").change(function(){
        width_size = $(this).val();
    });

    $(".type_of_paper").change(function(){   
        type_of_paper = $(this).val();
         
        if(type_of_paper == "Fluting medium paper"){
            $("#test_liner_paper_option").addClass("hidden");
            $("#kraft_liner_paper_option").addClass("hidden");
            $("#duplex_paper_option").addClass("hidden");
            $("#bag_grade_paper_option").addClass("hidden");
            $("#fluting_medium_paper_option").removeClass("hidden");
        }
        else if(type_of_paper == "Test Liner Paper"){            
            $("#kraft_liner_paper_option").addClass("hidden");
            $("#duplex_paper_option").addClass("hidden");
            $("#bag_grade_paper_option").addClass("hidden");
            $("#fluting_medium_paper_option").addClass("hidden");
            $("#test_liner_paper_option").removeClass("hidden");
        }

        if(type_of_paper == "Kraft Liner Paper"){
            $("#test_liner_paper_option").addClass("hidden");            
            $("#duplex_paper_option").addClass("hidden");
            $("#bag_grade_paper_option").addClass("hidden");
            $("#fluting_medium_paper_option").addClass("hidden");
            $("#kraft_liner_paper_option").removeClass("hidden");
        }

        if(type_of_paper == "Duplex Paper"){
            $("#test_liner_paper_option").addClass("hidden");
            $("#kraft_liner_paper_option").addClass("hidden");            
            $("#bag_grade_paper_option").addClass("hidden");
            $("#fluting_medium_paper_option").addClass("hidden");
            $("#duplex_paper_option").removeClass("hidden");
        }

        if(type_of_paper == "Bag Grade Paper"){
            $("#test_liner_paper_option").addClass("hidden");
            $("#kraft_liner_paper_option").addClass("hidden");
            $("#duplex_paper_option").addClass("hidden");
            $("#fluting_medium_paper_option").addClass("hidden");
            $("#bag_grade_paper_option").removeClass("hidden");
            
        }
    });

    $(".enquiry_form").submit(function(){
        
        var whatsappMessage= "Enquiry Details - \r\n Type Of Paper - "+type_of_paper+" \n Width and Size - "+width_size+"";

        if($("#instruction").val() != '')
            whatsappMessage = whatsappMessage +"\r\n Special Instruction - "+ $("#instruction").val();

        whatsappMessage = window.encodeURIComponent(whatsappMessage);        

        $.ajax({
            url : "ajaxSendEnquiryForm.php",
            type : "POST",
            data : {type_of_paper:type_of_paper,width_size:width_size,instruction:$("#instruction").val()},
            success:function(data){}
        });
        window.open('https://web.whatsapp.com/send?phone=917410010467&text='+whatsappMessage, '_blank'); 
        
        alert("Enquiry Submitted successfully!!!");
    });
</script>

</body>
</html>