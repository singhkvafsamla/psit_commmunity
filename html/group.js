function check()
        {
            var pass=document.getElementById("pass").value;
            var cpass=document.getElementById("cpass").value;
            
            if(pass!==cpass)
            {
                alert("Password Is Not Matching");
                document.getElementById("reg").disabled=true;
                document.getElementById("gridCheck").checked=false;
            }
            console.log("hn ji");
        }
        
function acc()
        {
            var pass=document.getElementById("pass").value;
            var cpass=document.getElementById("cpass").value;
            if((document.getElementById("gridCheck").checked)===true && pass===cpass)
            {
                document.getElementById("reg").disabled=false;
                
            }
           
        }
function comment(email,id)
            {
                console.log("done");
                var httpr=new XMLHttpRequest();
                
                httpr.onreadystatechange=function() {
                    if(this.readyState==4 && this.status==200)
                    {
                        document.getElementById(id).innerHTML=this.responseText;
                    }
                };
                httpr.open("GET","comment.php?cmnt="+document.getElementById("query1").value+"&email="+document.getElementById("query2").value+"&post_no="+email,true);
                httpr.send();
            }
function all_comment(email,id)
            {
                console.log("done");
                var httpr=new XMLHttpRequest();
                
                httpr.onreadystatechange=function() {
                    if(this.readyState==4 && this.status==200)
                    {
                        document.getElementById(id).innerHTML=this.responseText;
                    }
                };
                httpr.open("GET","all_comment.php?post_no="+email,true);
                httpr.send();
            }