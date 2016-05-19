function furSelected(choice) {
    if(choice){
        furOptionValue = document.getElementById("withFur").value;
        if(furOptionValue == choice.value){
            document.getElementById("furDivChecked").style.display = "block";
        }
    }
    else{
        document.getElementById("furDivChecked").style.display = "none";
    }
}
