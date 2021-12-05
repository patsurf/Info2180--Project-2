

var id = window.location.search(1);
//var id = $_SESSION['id'];

document.addEventListener('DOMContentLoaded', function(){
    //Get the elements at which I will need to insert the data from the database
   allTicket = document.getElementById('all');
    openTicket = document.getElementById('open');
    myTickets = document.getElementById('myTicket');
   makeNewTicket = document.getElementById('create');

    console.log(id);
 obtainFields("query=all");
   allTicket.addEventListener("click",function() 
    {
     obtainFields("query=all")
       allTicket.classList.add("selected");
        openTicket.classList.remove("selected");
        tickets.classList.remove("selected");
    });
    openTicket.addEventListener("click",function()
    {
     obtainFields("query=open")
        openTicket.classList.add("selected");
        tickets.classList.remove("selected");
       allTicket.classList.remove("selected");
    });
    tickets.addEventListener("click",function()
    {
     obtainFields("query=my&"+id)
        tickets.classList.add("selected");
       allTicket.classList.remove("selected");
        openTicket.classList.remove("selected");
    });

   makeNewTicket.addEventListener("click", function(){
        window.location.assign("../html/homeView.php");
    });
    
    });

function obtainFields(search)
{
    httpR = new XMLHttpRequest();

    httpR.onreadystatechange = function()
    {
        if (httpR.readyState === XMLHttpRequest.DONE && httpR.status === 200)
        {
            changeFields(httpR.responseText);
        }
        if (httpR.readyState === XMLHttpRequest.DONE && httpR.status === 404)
        {
            alert('ERROR - File not found.');
        }
    }
    
    console.log(search);
    httpR.open('POST', '../php/dashboard.php', true);
    httpR.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    httpR.send(search);
}

function changeFields(text)
{
    var issue = document.getElementById("issue");
    issue.innerHTML = text;
}
