var selected=[];
        function select(x){
            if (!selected.includes(x)){
                selected.push(x);
                document.getElementsByName(x)[0].setAttribute("selected",true);
            }
            else{
                selected.splice(x);
                document.getElementsByName(x)[0].removeAttribute("selected");
            }
            
        
        
        }