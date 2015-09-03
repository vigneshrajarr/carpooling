$(document).ready(function(){
    $("#myrides").click(function()
                       {
        $("#offers").hide();
        $("#cars").hide();
        $("#rides").show();
        $("#preferences").hide();
		$("#updatepreferences").hide();
    });
    $("#myoffers").click(function()
                       {
        $("#offers").show();
        $("#cars").hide();
        $("#rides").hide();
        $("#preferences").hide();
		$("#updatepreferences").hide();
    });
    $("#mycars").click(function()
                       {
        $("#offers").hide();
        $("#cars").show();
        $("#rides").hide();
        $("#preferences").hide();
		$("#updatepreferences").hide();
    });
    $("#mypreferences").click(function()
                    {
        $("#offers").hide();
        $("#cars").hide();
        $("#rides").hide();
        $("#preferences").show();
		$("#updatepreferences").hide();
    });
	$("#update").click(function(){
		$("#offers").hide();
		$("#cars").hide();
        $("#rides").hide();
        $("#preferences").hide();
		$("#updatepreferences").show();
	});
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
    $('#date').val(today);
    var count=0;
    $("#pop").click(function(){
       $("#popup").show();
    });
    $(document).keydown(function(e){
        if(e.keyCode==27)
        {
            window.location.hash = '';
            //console.log("esc pressed");
            //$("#popup").css({"opacity":"0","pointer-events":"none"});
        }
    });
	var tripid;
    $("#details tr").click(function(){        
        var text=$(this).text();
        var data=text.match("[0-9]+");
        var num=parseInt(data);
		tripid=num;
        var receivedData=[];
        var $table=$(this);
        var content;
        //$(this).after("<tr class='sample'><td  colspan=4>Hello how are you?</td></tr>");
        $.ajax({
            url:"fetchdetails.php?id="+num,
            type:"GET",
            dataType:"json",
            cache:false,
            success:function(data,responseText,object)
			{
                var mydata=JSON.parse(object.responseText);
                receivedData.push(mydata['triptype']);//0
                receivedData.push(mydata['price']);//1
                receivedData.push(mydata['brand']);//2
                receivedData.push(mydata['model']);//3
                receivedData.push(mydata['color']);//4
                receivedData.push(mydata['comfort']);//5
                receivedData.push(mydata['luggage']);//6
                receivedData.push(mydata['seatsoffered']);//7
                receivedData.push(mydata['seatsavailable']);//8
                receivedData.push(mydata['userphoto']);//9
				receivedData.push(mydata['smoking']);//10
				receivedData.push(mydata['pets']);//11
				receivedData.push(mydata['eatables']);//12
				receivedData.push(mydata['accompanier']);//13
				receivedData.push(mydata['drinks']);//14
				receivedData.push(mydata['loquacious']);//15
				receivedData.push(mydata['title1']);//16
				receivedData.push(mydata['title2']);//17
				receivedData.push(mydata['title3']);//18
				receivedData.push(mydata['title4']);//19
				receivedData.push(mydata['title5']);//20
				receivedData.push(mydata['title6']);//21
                receivedData.push(num);
				$("#number").attr("max",receivedData[8]);
                $(".sample").remove();
                if(receivedData[8]>0)
                    content="<tr class=sample><td height=100px colspan=4><div><div id=left><img class='offeruserphotocircle offeruserphoto' src="+receivedData[9]+"></div><div id=middle1><table class=joindetails><tr><td>Trip Type</td><td> : </td><td>"+receivedData[0]+"</td></tr><tr><td>Price</td><td> : </td><td>&#8377;"+receivedData[1]+"</td></tr></table><table style='width:190px;margin-top:10px;'><tr><td><span style='margin-left:40px;'><img height=28px width=28px src="+receivedData[10]+" title="+receivedData[16]+"> <img height=31px width=31px src="+receivedData[11]+" title="+receivedData[17]+"> <img height=31px width=31px src="+receivedData[12]+" title="+receivedData[18]+"></span><br><span style='margin-left:40px;'><img height=29px width=29px src="+receivedData[13]+" title="+receivedData[19]+"> <img height=31px width=31px src="+receivedData[14]+" title="+receivedData[20]+"> <img height=29px width=29px src="+receivedData[15]+" title="+receivedData[21]+"></span></td></tr></table></div><div id=middle2><table class=joindetails><tr><td>Brand</td><td> : </td> <td>"+receivedData[2]+" "+receivedData[3]+"</td></tr><tr><td>Color</td><td> : </td><td>"+receivedData[4]+"</td></tr><tr><td>Comfort Level</td><td> : </td><td>"+receivedData[5]+"</td></tr><tr><td>Luggage</td><td> : </td><td>"+receivedData[6]+"</td></tr></table></div><div id=right><table class=joindetails><tr><td>Seats Offered</td><td> : </td><td>"+receivedData[7]+"</td></tr><tr><td>Seats Available</td><td> : </td><td>"+receivedData[8]+"</td></tr><tr><td colspan=3><a href='#popup'><button id='pop' id=openModal class='pop'>Book Seat(s)</button></a></td></tr></table></div></div></td></tr>"; 
                else
                    content="<tr class='sample'><td height=100px colspan=4><div><div id=left><img class='offeruserphotocircle offeruserphoto' width=50 height=50px src="+receivedData[9]+"></div><div id=middle1><table class=joindetails><tr><td>Trip Type</td><td> : </td><td>"+receivedData[0]+"</td></tr><tr><td>Price</td><td> : </td><td>&#8377;"+receivedData[1]+"</td></tr></table><table style='width:190px;margin-top:10px;'><tr><td><span style='margin-left:40px;'><img height=28px width=28px src="+receivedData[10]+" title="+receivedData[16]+"> <img height=31px width=31px src="+receivedData[11]+" title="+receivedData[17]+"> <img height=31px width=31px src="+receivedData[12]+" title="+receivedData[18]+"></span><br><span style='margin-left:40px;'><img height=29px width=29px src="+receivedData[13]+" title="+receivedData[19]+"> <img height=31px width=31px src="+receivedData[14]+" title="+receivedData[20]+"> <img height=29px width=29px src="+receivedData[15]+" title="+receivedData[21]+"></span></td></tr></table></div><div id=middle2><table class=joindetails><tr><td>Brand</td><td> : </td><td>"+receivedData[2]+" "+receivedData[3]+"</td></tr><tr><td>Color</td><td> : </td><td>"+receivedData[4]+"</td></tr><tr><td>Comfort Level</td><td> : </td><td>"+receivedData[5]+"</td></tr><tr><td>Luggage</td><td> : </td><td>"+receivedData[6]+"</td></tr></table></div><div id=right><table class=joindetails><tr><td>Seats Offered</td><td> : </td><td>"+receivedData[7]+"</td></tr><tr><td>Seats Available</td><td> : </td><td>"+receivedData[8]+"</td></tr><tr><td colspan=3><button id='pop' class='rpop' disabled=disabled value='Book a Seat'>No seats available</button></td></tr></table></div></div></td></tr>"; 
                $table.after(content);
				
                if(count==0)
				{
                	$(".sample").fadeIn("fast");
                }
                else
				{
                    $(".sample").hide();
                }
            }
        });
    });
	$("#canceloffer tr #cancel").click(function(){
		var row=$(this);
		var text=$(this).parent().parent().text();
        var data=text.match("[0-9]+");
        var num=parseInt(data);
		$(this).parent().parent().after("<tr><td colspan=7><div style='margin-left:300px;'>Cancel The Offer?<br><br><button class='btn btn-primary' id=y>Yes</button><button style='margin-left:20px;' class='btn btn-success' id=n>No</button></div></td></tr>");
		$(this).prop("disabled",true);
		$("#n").click(function(){
			$(this).parent().parent().remove();
			row.prop("disabled",false);
			//alert($("#cancelrow tr td").siblings():nth-last-child());
		});
		$("#y").click(function(){
			$.ajax({
				url:"cancel.php?id="+num+"&type=offer",
				type:"POST",
				success:function(data)
				{
					alert("Your Offer has been cancelled ");
				}
			});
			$(this).parent().parent().remove();
			row.parent().parent().remove();
			//alert($("#cancelrow tr td").siblings():nth-last-child());
		});
	});
	$("#cancelride tr #cancel").click(function(){
		var row=$(this);
		var text=$(this).parent().parent().text();
        var data=text.match("[0-9]+");
        var num=parseInt(data);
		$(this).parent().parent().after("<tr><td colspan=7><div style='margin-left:300px;'>Cancel The Ride?<br><br><button class='btn btn-primary' id=y>Yes</button><button style='margin-left:20px;' class='btn btn-success' id=n>No</button></div></td></tr>");
		$(this).prop("disabled",true);
		$("#n").click(function(){
			$(this).parent().parent().remove();
			row.prop("disabled",false);
			//alert($("#cancelrow tr td").siblings():nth-last-child());
		});
		var data="id="+num+"&type=ride";
		//alert(data);
		$("#y").click(function(){
			$.ajax({
				url:"cancel.php",
				type:"POST",
				data:data,
				success:function()
				{
					alert("Your Ride has been cancelled");
				}
			});
			$(this).parent().parent().remove();
			//alert($("#cancelrow tr td").siblings():nth-last-child());
		});
	});
	$("#addnewcard").click(function(){
		$("#addacard").slideDown();
		$("#bookseat").attr('disabled',true);
	});
	$("#updatevalues").click(function(){
		var smoking=$("#smoking").val();
		var drinks=$("#drinks").val();
		var eatables=$("#eatables").val();
		var pets=$("#pets").val();
		var loquacious=$("#loquacious").val();
		var accompanier=$("#accompanier").val();
		$.ajax({
			url:"updatepreferences.php?smoking="+smoking+"&drinks="+drinks+"&eatables="+eatables+"&pets="+pets+"&loquacious="+loquacious+"&accompanier="+accompanier,
			type:"GET",
			success:function(data)
			{
        		$("#preferences").show();
        		$("#updatepreferences").hide();
			}
		});
	});
	$("#save").click(function(){
		if($("#nameofbank").val()=="" || $("#nameoncard").val()=="" || $("#cardnumber").val()=="" || $("#cardtype").val()=="" || $("#cvv").val()==""|| $("#date").val()=="" || $("#password").val()=="")
			return false;
		var bankname=$("#nameofbank").val();
		var cardname=$("#nameoncard").val();
		var cardnumber=$("#cardnumber").val();
		var type=$("#cardtype").val();
		var cvv=$("#cvv").val();
		var date=$("#date").val();
		var password=$("#password").val();
		$.ajax({
			url:"savecard.php?bankname="+bankname+"&username="+cardname+"&cardnumber="+cardnumber+"&type="+type+"&cvv="+cvv+"&date="+date+"&password="+password,
			type:"POST",
			success:function(data)
			{
				$("#addacard").slideUp();
				$("#bookseat").attr('disabled',false);
			}
		});
	});
	$("#bookseat").click(function(){
		window.location.hash = 'popup';
    });
	$("#popup #bookaseat").click(function(){
		var cardnumber=$("#savedcards").val();
		var password=$("#popup #password").val();
		var credits=$("#credits").val();
		if($("#popup #password").val()=="")
			return false;
		$.ajax({
			url:"bookaseat.php?cardnumber="+cardnumber+"&password="+password+"&credits="+credits,
			type:"GET",
            success:function(data)
			{
				alert(data);
				window.location.hash = '';
			},
			error:function(){
				alert("page error");
			}
		});
	});
	$("#credits").change(function(){
						if($('input[name="credits"]').val()=="1")
							$('input[name="credits"]').val("0");
						else
							$('input[name="credits"]').val("1");
						});
	$("#fulldetails").click(function(){
		window.location.hash='popup';
	});
	$("#book").click(function(){
		alert("book");
		//$("#bookdiv").hide();
		//$("#bookinresult").show();
	});
	$("#popup #detailsoftrip").click(function(){
		if($("#detailtripid").val()=='')
			return false;
		var tripid=$("#detailtripid").val();
		$("#tripdetails").hide();
		$(".windows8").show();
		$("#send").show();
		var tripdetails=[];
		var display;
		setTimeout(function(){$("#send").hide();},2000);
		setTimeout(function(){$("#fetch").show();},2000);
		setTimeout(function(){
			$(".windows8").hide();
			$("#fetch").hide();
			$("#inside").animate({'height':'500px','width':'1050px','margin-top':'100px','margin-left':'150px'},"slow");
			$(".header").html("Trip Details");
			$.ajax({
				url:"yourtrip.php?tripid="+tripid,
				type:"GET",
				dataType:"json",
				cache:false,
				success:function(data,responseText,object)
				{
                	var data=JSON.parse(object.responseText);
                	tripdetails.push(data['source']);//0
                	tripdetails.push(data['destination']);//1
                	tripdetails.push(data['triptype']);//2
                	tripdetails.push(data['date']);//3
                	tripdetails.push(data['time']);//4
                	tripdetails.push(data['price']);//5
                	tripdetails.push(data['seatsoffered']);//6
                	tripdetails.push(data['seatsavailable']);//7
					tripdetails.push(data['name']);//8
                	tripdetails.push(data['gender']);//9
                	tripdetails.push(data['email']);//10
                	tripdetails.push(data['profession']);//11
                	tripdetails.push(data['smoking']);//12
                	tripdetails.push(data['pets']);//13
                	tripdetails.push(data['eatables']);//14
                	tripdetails.push(data['accompanier']);//15
					tripdetails.push(data['drinks']);//16
                	tripdetails.push(data['loquacious']);//17
                	tripdetails.push(data['brand']);//18
                	tripdetails.push(data['model']);//19
                	tripdetails.push(data['color']);//20
                	tripdetails.push(data['comfortness']);//21
                	tripdetails.push(data['luggage']);//22
                	tripdetails.push(data['regnum']);//23
                	tripdetails.push(data['userphoto']);//24
                	tripdetails.push(data['contact']);//25
                	tripdetails.push(data['title1']);//26
                	tripdetails.push(data['title2']);//27
                	tripdetails.push(data['title3']);//28
                	tripdetails.push(data['title4']);//29
                	tripdetails.push(data['title5']);//30
                	tripdetails.push(data['title6']);//31
					display="<table id=result class=table style='margin-left:20px;table-layout:fixed;width:1000px;'><tr><td rowspan=3><img class=offeruserphotocircle style='margin-top:5px' src="+tripdetails[24]+" alt=Offered by</td><span style='margin-left:20px;'>"+tripdetails[8]+"</span> </tr><tr><td>Gender : "+tripdetails[9]+"</td><td>Profession : "+tripdetails[11]+"</td></tr><tr><td>Contact : "+tripdetails[25]+"</td><td>Email : "+tripdetails[10]+"</td></tr><tr><td>Route : "+tripdetails[0]+" <img height=23px width=25px src=goto.jpg alt=goto> "+tripdetails[1]+"</td><td>Trip Type : "+tripdetails[2]+"</td><td>Date & Time : "+tripdetails[3]+" "+tripdetails[4]+"</td></tr><tr><td>Price : "+tripdetails[5]+"</td><td>Seats Offered : "+tripdetails[6]+"</td><td>Seats Available : "+tripdetails[7]+"</td></tr><tr><td>Preferences : <img height=25px width=25px src="+tripdetails[12]+" title="+tripdetails[26]+"> <img height=30px width=30px src="+tripdetails[13]+" title="+tripdetails[27]+"> <img height=30px width=30px src="+tripdetails[14]+" title="+tripdetails[28]+"> <img height=28px width=28px src="+tripdetails[15]+" title="+tripdetails[29]+"> <img height=30px width=30px src="+tripdetails[16]+" title="+tripdetails[30]+"> <img height=28px width=28px src="+tripdetails[17]+" title="+tripdetails[31]+"></td></tr><tr><td>Regnum : "+tripdetails[23]+"</td><td>Brand : "+tripdetails[18]+" "+tripdetails[19]+"</td><td>Colour : "+tripdetails[20]+"</td></tr><tr></tr><tr><td>Comfortness : "+tripdetails[21]+"</td><td>Luggage : "+tripdetails[22]+"</td></tr><tr></tr></table>";
					$("#tripdetailscontent").after(display);
					$("#tripdetailscontent").show();
				}
			});
		},4000);
	});
    $(document).keydown(function(e){
        if(e.keyCode==27)
        {
            window.location.hash = '';
        }
    });
	$(".rating-stars").click(function()
	{
		var ratingstars=$(this);
		var rating=$(this).parent().next().html();
		var data=rating.match("[0-9]+[.]*[0-9]*");
		var ratingvalue=parseFloat(data);
		//alert(data);
		var tripid=$(this).parent().parent().parent().parent().parent().children().html();
		var tripidvalue=parseInt(tripid);
		//$(this).parent().parent().hide();
		//alert(tripid);
		//setTimeout(function(){$(this).parent().parent().parent().html("Thank You !!!")},1000);
		$.ajax({
			url:"rating.php?tripid="+tripidvalue+"&rating="+ratingvalue,
			type:"GET",
			cache:false,
			success:function(data)
			{
				$(ratingstars).parent().parent().parent().text(ratingvalue+"/5.0");
			}
		});
	});
		
	$("#remove").click(function(){
		$("#edit").show();
		$("#remove").hide();
		$("#save").hide();
	});
});