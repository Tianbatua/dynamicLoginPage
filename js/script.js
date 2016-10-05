$(document).ready(function()
 {
 	get_user_list();

 	$('#datepicker').datepicker({dateFormat : "yy-mm-dd"});

 	$('#call_back_btn').click(function()
 	{
       save_user();    
 	});

 	$('#subscriber').change(function()
 	{
       get_user();
 	});
 });

function get_user()
{
     $.post("ajax.php" ,
        {
            id : $('#subscriber').val(),
            task  : "get_user"
        },
        function(data)
        {
        	var person=jQuery.parseJSON(data);
        	$('#first_name').val(person.first_name);
        	$('#surname').val(person.surname);
        	$('#datepicker').val(person.dob);
            $('#responseText').val(data);
        }
        );
}

function get_user_list()
{
	 $.post("ajax.php" ,
        {
            task  : "get_user_list"
        },
        function(data)
        {
             $('#responseText').val(data);
             var people = jQuery.parseJSON(data);
             for(var i in people)
             {
             	var opt="<option value='"+people[i].id+"'>"+people[i].first_name+" "+people[i].surname+"</option>";
             	$('#subscriber').append(opt);
             }
        }
        );

}

function save_user()
{
	 $.post("ajax.php" ,
        {
            first_name : $('#first_name').val(),
            surname    : $('#surname').val(),
            dob        : $('#datepicker').datepicker().val(),
            id         : $('#subscriber').val(),
            task  : "save_user"
        },
        function(data)
        {
             $('#responseText').val(data);
        }
        );

}