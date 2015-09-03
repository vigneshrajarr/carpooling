var data='';
  var action = '';
  var savebutton = "<input type='button' class='ajaxsave' value='Save'>";
  var updatebutton = "<input type='button' class='ajaxupdate' value='Update'>";
  var cancel = "<input type='button' class='ajaxcancel' value='Cancel'>";
  var emailfilter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;	
   var pre_tds; 
var field_arr = new Array('text','text','text','color','text','comfortlevel','luggage');
  var field_pre_text= new Array('Registration Number','Brand','Model','Colour','No. of Seats','Comfort Level','Luggage');
  var field_name = new Array('regnum','brand','model','color','noofseats','comfortlevel','luggage'); 
 $(function(){
 $.ajax({
	     url:"DbManipulate.php",
                  type:"POST",
                  data:"actionfunction=showData",
        cache: false,
        success: function(response){
		 
		  $('#demoajax').html(response);
		  createInput();
		  
		}
		
	   });
 
  
 $('#demoajax').on('click','.ajaxsave',function(){
     
	   var regnum =  $("input[name='"+field_name[0]+"']");
	   var brand = $("input[name='"+field_name[1]+"']");
	   var model =$("input[name='"+field_name[2]+"']");
	   var color = $("input[name='"+field_name[3]+"']");
	   var noofseats = $("input[name='"+field_name[4]+"']");
	   var comfortlevel = $("input[name='"+field_name[5]+"']");
	   var luggage = $("input[name='"+field_name[6]+"']");
	   if(validate(regnum,brand,model,color,noofseats,comfortlevel,luggage)){
	   data = "regnum="+regnum.val()+"&brand="+brand.val()+"&model="+model.val()+"&noofseats="+noofseats.val()+"&comfortlevel="+comfortlevel.val()+"&luggage="+luggage.val()+"&color="+color.val()+"&actionfunction=saveData";
       $.ajax({
	     url:"DbManipulate.php",
                  type:"POST",
                  data:data,
        cache: false,
        success: function(response){
		   if(response!='error'){
		      $('#demoajax').html(response);
		  createInput();
		     }
		}
		
	   });
      }	
      else{
	   return;
	  }	  
	   });
 $('#demoajax').on('click','.ajaxedit',function(){
      var edittrid = $(this).parent().parent().attr('id');
    	var tds = $('#'+edittrid).children('td');
        var tdstr = '';
		var td = '';
		pre_tds = tds;
		for(var j=0;j<field_arr.length;j++)
        {
		   if(field_arr[j]=='text')
		     tdstr += "<td><input type='"+field_arr[j]+"' name='"+field_name[j]+"' value='"+$(tds[j]).html()+"' placeholder='"+field_pre_text[j]+"'></td>";
            else if(field_arr[j]=='color')
                tdstr += "<td><select name='"+field_name[j]+"'><option value='Black'>Black</option><option value='Blue'>Blue</option><option value='Brown'>Brown</option><option value='Gray'>Gray</option><option value='Green'>Green</option><option value='Red'>Red</option><option value='Silver'>Silver</option><option value='White'>White</option><option value='Yellow'>Yellow</option><option value='Others'>Others</option></select></td>";
            else if(field_arr[j]=='comfortlevel')
                tdstr += "<td><select name='"+field_name[j]+"'><option value='Basic'>Basic</option><option value='Normal'>Normal</option><option value='Comfortable'>Comfortable</option><option value='Luxury'>Luxury</option></select></td>";
            else if(field_arr[j]=='luggage')
                tdstr += "<td><select name='"+field_name[j]+"'><option value='Small'>Small</option><option value='Medium'>Medium</option><option value='Large'>Large</option></select></td>";
            else
		  }
		  tdstr+="<td>"+updatebutton +" " + cancel+"</td>";
		  $('#createinput').remove();
		  $('#'+edittrid).html(tdstr);
	   });
	   
	   $('#demoajax').on('click','.ajaxupdate',function(){
       var edittrid = $(this).parent().parent().attr('id');
	   var regnum =  $("input[name='"+field_name[0]+"']");
	   var brand = $("input[name='"+field_name[1]+"']");
	   var model =$("input[name='"+field_name[2]+"']");
	   var color = $("input[name='"+field_name[3]+"']");
       var noofseats = $("input[name='"+field_name[4]+"']");
	   var comfortlevel = $("input[name='"+field_name[5]+"']");
	   var luggage = $("input[name='"+field_name[6]+"']");
	   if(validate(regnum,brand,model,color,noofseats,comfortlevel,luggage)){
	   data = "regnum="+regnum.val()+"&brand="+brand.val()+"&model="+model.val()+"&noofseats="+noofseats.val()+"&comfortlevel="+comfortlevel.val()+"&luggage="+luggage.val()+"&color="+color.val()+"&actionfunction=saveData";
       $.ajax({
	     url:"DbManipulate.php",
                  type:"POST",
                  data:data,
        cache: false,
        success: function(response){
		   if(response!='error'){
		      $('#demoajax').html(response);
		  createInput();
		     }
		}
		
	   });
}
else{
return;
}	   
	   });
	   	   $('#demoajax').on('click','.ajaxdelete',function(){
       var edittrid = $(this).parent().parent().attr('id');
	   
	   data = "deleteid="+edittrid+"&actionfunction=deleteData";
       $.ajax({
	     url:"DbManipulate.php",
                  type:"POST",
                  data:data,
        cache: false,
        success: function(response){
		   if(response!='error'){
		      $('#demoajax').html(response);
		  createInput();
		     }
		}
		
	   });	   
	   });
 $('#demoajax').on('click','.ajaxcancel',function(){
      var edittrid = $(this).parent().parent().attr('id');
	  
        $('#'+edittrid).html(pre_tds);
		createInput();
	   });	   
	   });
	   
 function createInput(){
  var blankrow = "<tr id='createinput'>";   
  for(var i=0;i<field_arr.length;i++)
  {
      if(field_arr[i]=="text")
		     blankrow+= "<td><input type='"+field_arr[i]+"' name='"+field_name[i]+"' placeholder='"+field_pre_text[j]+"'></td>";
            else if(field_arr[i]=='color')
                blankrow+= "<td><select name='"+field_name[i]+"'><option value='Black'>Black</option><option value='Blue'>Blue</option><option value='Brown'>Brown</option><option value='Gray'>Gray</option><option value='Green'>Green</option><option value='Red'>Red</option><option value='Silver'>Silver</option><option value='White'>White</option><option value='Yellow'>Yellow</option><option value='Others'>Others</option></select></td>";
            else if(field_arr[i]=="comfortlevel")
                blankrow+= "<td><select name='"+field_name[i]+"'><option value='Basic'>Basic</option><option value='Normal'>Normal</option><option value='Comfortable'>Comfortable</option><option value='Luxury'>Luxury</option></select></td>";
            else if(field_arr[i]=="luggage")
                blankrow+= "<td><select name='"+field_name[i]+"'><option value='Small'>Small</option><option value='Medium'>Medium</option><option value='Large'>Large</option></select></td>";
            else
	}
	blankrow+="<td class='ajaxreq'>"+savebutton+"</td></tr>";
  $('#demoajax').append(blankrow);	
  }
function validate(regnum,brand,model,color,noofseats,comfortlevel,luggage){
var contact = jQuery('input[name=contact]');
		
		
		if (regnum.val()=='') {
			regnum.addClass('hightlight');
			return false;
		} else regnum.removeClass('hightlight');
		if (brand.val()=='') {
			brand.addClass('hightlight');
			return false;
		} else brand.removeClass('hightlight');
		if (model.val()=='') {
			model.addClass('hightlight');
			return false;
		} else model.removeClass('hightlight');
		if (color.val()=='') {
			color.addClass('hightlight');
			return false;
		}else color.removeClass('hightlight');
        if (noofseats.val()=='') {
			noofseats.addClass('hightlight');
			return false;
		}else noofseats.removeClass('hightlight');
        if (comfortlevel.val()=='') {
			comfortlevel.addClass('hightlight');
			return false;
		}else comfortlevel.removeClass('hightlight');
        if (luggage.val()=='') {
			luggage.addClass('hightlight');
			return false;
		}else luggage.removeClass('hightlight');
		
		return true;
		
}
