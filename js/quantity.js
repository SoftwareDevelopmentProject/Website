function  quantityCtrl(x) {
    var y = document.getElementById("qty").innerHTML;

    if(x === 0){
        if (y<=1) {
            //do nothing

        }else{
            y--;
            document.getElementById("qty").innerHTML = y;
        }

    } else if(x === 1){
        if (y<15){
            y++;
            document.getElementById("qty").innerHTML =y;
        }
    }



}