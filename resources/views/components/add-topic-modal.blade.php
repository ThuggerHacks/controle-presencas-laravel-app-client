
<div class="modal  fade " tabindex="-1" id="topic">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header bg-primary text-light">
          <h5 class="modal-title">Novo Topico</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div >
              
                <div >

                    <div class="input-group w-100 mb-2">

                        <span class="input-group-text bg-transparent border-end-0" id="basic-addon1">
                            <i class="fa fa-book-open"></i>
                        </span>
                        <input type="text" name="" id="subject" class="form-control" placeholder="Assunto">
                        <input type="hidden" name="" value="{{ base64_decode($cadeira) }}" id="chairs">
                    </div>

                </div>
            </div>
        </div>
        <div class="modal-footer ">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary" onclick="addTopic()">
            <span>
                <i class="fa fa-add"></i>
            </span>
            <span>Adicionar</span>
          </button>
        </div>
      </div>
    </div>
  </div>



  <script>

     //coords first triangle
    const uzEstradaLatitude = -19.8317827;
    const uzEstradaLongitude = 34.8661684;
    const uzPortaoLatitude = -19.8331208;
    const uzPortaoLongitude = 34.8657246;
    const uzPadariaLatitude = -19.8322216;
    const uzPadariaLongitude = 34.8632286;

    //coords second triangle
    const uzEstradaLatitude1 = -19.8325606;
    const uzEstradaLongitude1 = 34.8649166;
    const uzPortaoLatitude1 = -19.8332921;
    const uzPortaoLongitude1 = 34.8646549;
    const uzPadariaLatitude1 = -19.8326426;
    const uzPadariaLongitude1 = 34.8635548;


    const isInsideArea = (myLatitude, myLongitude) => {
        //area uz1
        var ABx = (-uzEstradaLongitude + uzPadariaLongitude);
        var ABy = (-uzEstradaLatitude + uzPadariaLatitude);
        var ACx = (-uzEstradaLongitude + uzPortaoLongitude);
        var ACy = (-uzEstradaLatitude + uzPortaoLatitude);

        let areaUz = Math.abs((ABx * ACy - ABy * ACx)) / 2;

        //area uz2
        ABx = (-uzEstradaLongitude1 + uzPadariaLongitude1);
        ABy = (-uzEstradaLatitude1 + uzPadariaLatitude1);
        ACx = (-uzEstradaLongitude1 + uzPortaoLongitude1);
        ACy = (-uzEstradaLatitude1 + uzPortaoLatitude1);

        let areaUz2 = Math.abs((ABx * ACy - ABy * ACx)) / 2;

        //areas usuario
        //1
        var PBx = (-myLongitude + uzPadariaLongitude);
        var PBy = (-myLatitude + uzPadariaLatitude);
        var PAy = (-myLatitude + uzEstradaLatitude);
        var PAx = (-myLongitude + uzEstradaLongitude);

        let area1 = Math.abs((PBx * PAy - PBy * PAx)) / 2;

        //2
        var PAx = (-myLongitude + uzEstradaLongitude);
        var PAy = (-myLatitude + uzEstradaLatitude);
        var PCx = (-myLongitude + uzPortaoLongitude);
        var PCy = (-myLatitude + uzPortaoLatitude);

        let area2 = Math.abs((PAx * PCy - PAy * PCx)) / 2;

        //3
        var PBx = (-myLongitude + uzPadariaLongitude);
        var PBy = (-myLatitude + uzPadariaLatitude);
        var PCx = (-myLongitude + uzPortaoLongitude);
        var PCy = (-myLatitude + uzPortaoLatitude);

        let area3 = Math.abs((PBx * PCy - PBy * PCx)) / 2;

        let totalArea = area1 + area2 + area3;

        //areas usuario
        //1
        var PBx = (-myLongitude + uzPadariaLongitude1);
        var PBy = (-myLatitude + uzPadariaLatitude1);
        var PAy = (-myLatitude + uzEstradaLatitude1);
        var PAx = (-myLongitude + uzEstradaLongitude1);

        let area11 = Math.abs((PBx * PAy - PBy * PAx)) / 2;

        //2
        var PAx = (-myLongitude + uzEstradaLongitude1);
        var PAy = (-myLatitude + uzEstradaLatitude1);
        var PCx = (-myLongitude + uzPortaoLongitude1);
        var PCy = (-myLatitude + uzPortaoLatitude1);

        let area21 = Math.abs((PAx * PCy - PAy * PCx)) / 2;

        //3
        var PBx = (-myLongitude + uzPadariaLongitude1);
        var PBy = (-myLatitude + uzPadariaLatitude1);
        var PCx = (-myLongitude + uzPortaoLongitude1);
        var PCy = (-myLatitude + uzPortaoLatitude1);

        let area31 = Math.abs((PBx * PCy - PBy * PCx)) / 2;

        let totalArea2 = area11 + area21 + area31;

        return totalArea2 == areaUz2 || totalArea == areaUz;
    }
    
    const addTopic = async() => {
      let myLatitude = 0 ,myLongitude = 0;
      
      navigator.geolocation.getCurrentPosition(async(position) => {
          myLongitude =  34.8646358;
          myLatitude = -19.8324463;

          // myLatitude = position.coords.latitude;
          // myLongitude = position.coords.longitude;
          
          console.log(myLatitude)
          console.log(myLongitude)
          if(isInsideArea(myLatitude, myLongitude)){
          let subject = document.querySelector("#subject").value;
          let chairs = document.querySelector("#chairs").value;

          if(subject.trim().length == 0){
           
            toast("Por favor preencha o campo","error")
          }else{
            const cnf = confirm("Continuar ?");
            
              if(cnf){
                const send = await axios.post("/addtopic",{subject,chairs});
          
                if(send.data && !send.data.error){
                
                  window.open(window.location.href,"_self");
                }else{ 
                  if(send.data.error){
                    toast(send.data.error,"error")
                  }else{
                    toast("Houve um erro","error");
                  } 
                
                }
              }
          }
        }else{
          toast("Impossivel adicionar tema estando fora da universidade","error")
        }

      }, err => {
        toast("Nao foi possivel encontrar a sua localizacao, tente novamente","error")
      },
      {
          enableHighAccuracy:true,
          timeout:5000,
          maximumAge:Infinity
      }
    );

  }

  </script>