function validateCloseAnswer(id_question,coins){
    var ans
    console.log("BUTTONN")
    for(i = 1;i<=4;i++){
        try{
            if(document.getElementById("radio"+i).checked){
                ans = i
                break
            }
        }
        catch(e){}
    }
    console.log("La respuesta fue: "+i)

    if(ans != null){
        fetch('./services/checkanswer.php?id_question='+id_question+'&correct='+ans, {
            method: 'GET',
        }).then(
            response => response.json()
        ).then(
            response => {
                respuesta = response[0].slice(0,1)[0]
                if(respuesta){
                    console.log(respuesta)
                    goodAnswer(coins)

                }else{

                }
            }
        ).catch(
            error => console.log(error)
        )
    }
  
   
}
function goodAnswer(coins){
    fetch('./services/addcoins.php?coins='+coins+'&id='+1, {
        method: 'GET',
    }).then(
        response => response.json()
    ).then(
        response => {
          
        }
    ).catch(
        error => console.log(error)
    )

}
function wrongAnswer(){

}
function load() {
    function mission(question, answer, type, id_question,coins){
        try{
            var temp = document.getElementsByClassName("card")
            while(temp.length > 0){
                temp[0].parentNode.removeChild(temp[0]);
            }
        }
        catch(e){
            console.log(e);
        }
        var message1 = `
        <div class="container">
            <div class="row">
                <div class="col-md-10">`+question+`
                </div>
                <div class="col">
                </div>
                <div class="col">
                </div>
            </div>
        </div>
        <br><br><br><br>
        <div class="container">
            <div class="row">
                <div class="col">
                </div>
                <div class="col">
                </div>
                <div class="col-md-5">
                    <input type="radio" class="btn-check" name="options-outlined" id="success-outlined" autocomplete="off" checked>
                    <label class="btn btn-outline-success" for="success-outlined" >Entendido</label>
                </div>
            </div>
        </div>
        `
        
        var message2 = `
            <div class="container" >
                <div class="row">
                    <div class="col-md-7">
                        `+question+`
                    </div>
                    <div class="col">
                    </div>
                    <div class="col">
                    </div>
                </div>
            </div>
            <br><br><br><br>
            <br><br><br><br>
            <div class="container">
                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col">
                    </div>
                    <div class="col-md-7">
                        <div id="temp_div" >
                       
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br>
            <div class="container">
            <div class="row">
                <div class="col">
                </div>
                <div class="col">
                    <input type="radio" class="btn-check" name="options-outlined" id="success-outlined" autocomplete="off" checked>
                    <label class="btn btn-outline-success" for="success-outlined" onClick="validateCloseAnswer(`+id_question+`,`+coins+`)">Enviar</label>
                    
                </div>
                <div class="col">
                </div>
            </div>
            </div>
        `
        var message3 = `
        <div class="container">
            <div class="row">
                <div class="col-md-10">`+question+`
                </div>
                <div class="col">
                </div>
                <div class="col">
                </div>
            </div>
        </div>
        <br><br><br><br>
        <br><br><br><br>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">:</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Respuesta" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
        <div class="container">
        <div class="row">
            <div class="col">
            </div>
            <div class="col">
                <input type="radio" class="btn-check" name="options-outlined"  id="success-outlined" autocomplete="off" checked>
                <label class="btn btn-outline-success" for="success-outlined" onClick="validateCloseAnswer(`+id_question+`,`+2+`)">Enviar</label>

            </div>
            <div class="col">
            </div>
        </div>
        </div>
        `
        var message = ''
        switch(type){
            case 'informativo':
                message = message1
            break;
            case 'cerrada':
                message = message2
            break;
            case 'abierto':
                message = message3
            break;
            default:
                break
        }
        

        var text2 = document.createElement('div');
        text2.className = "card"
        text2.style.position = 'absolute';
        //text2.style.zIndex = 1;
        text2.style.width = 20 + 'rem';
        text2.style.height = 30 + 'rem';
        text2.style.backgroundColor = "aqua";
        text2.innerHTML = message
        text2.style.top = 300 + 'px';
        text2.style.left = 300 + 'px';
        document.body.appendChild(text2);
        try{
            var temp_div = document.getElementById('temp_div')
            answer.forEach( function (element, i){
                i=i+1
                if(element != ''){
                    // console.log(temp_div.innerHTML)
                    temp_div.innerHTML = temp_div.innerHTML+
                    ` <div class="row">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="radio`+i+`" value="`+i+`">
                                <label class="form-check-label" for="inlineRadio1">
                                `+element+`
                                </label>
                            </div>
                        </div>`
                    }
                }
            )
        }
        catch(e){
        }
    }

   

    function getQuestion(id) {
        fetch('./services/readquestion.php?id='+id, {
            method: 'GET',
        }).then(
            response => response.json()
        ).then(
            response => {
               
                pregunta = response[0].slice(0,1)[0]
                tipo = response[0].slice(1,2)[0]
                respuestas = response[0].slice(2, 6)
                id_pregunta = response[0].slice(6,7)
                coins = response[0].slice(7,8)
                mission(pregunta, respuestas, tipo, id_pregunta,coins)
            }
        ).catch(
            error => console.log(error)
        )

      
    }
    getQuestion(2)

   

}
document.addEventListener("DOMContentLoaded", load);