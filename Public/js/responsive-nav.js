function myFunction()
{
    var x = document.getElementById("respo-nav");
        if(x.className==="topnav"){
            x.className += " responsive";
        }
        else
        {
            x.className = "topnav";
        }
}