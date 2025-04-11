
function getName(){    
    var today = new Date().toLocaleDateString();
    var helpmembermas=[];
    var gr = document.getElementsByName('member[]');
    for (var i=0;i<gr.length;i++){
        if (gr[i].checked){
            helpmembermas.push(gr[i].value);
            
        }
    }
    var membermas = [];
    for(var h=0;h<helpmembermas.length;h++){
        if(h!=helpmembermas.length-1){
            membermas.push(helpmembermas[h]+','+'\t');
        }
        else{
            membermas.push(helpmembermas[h]);
        }
    }
    var povestkamas = [];
    var gr1 = document.getElementsByName('aims[]');
    for(var j=0;j<gr1.length;j++){
        povestkamas.push(j+1+'.'+gr1[j].value+'\n');
    }
    var speechmas = [];
    var gr2 = document.getElementsByName('speach[]');
    for(var k=0;k<gr2.length;k++){
        speechmas.push('Вопрос №');
        speechmas.push(k+1+'.'+'\n'+gr2[k].value+'\n'+'\n');
    }
    var solutionsmas = [];
    var gr3 = document.getElementsByName('solutions[]');
    for(var l=0;l<gr3.length;l++){
        solutionsmas.push(l+1+'.'+gr3[l].value+'\n');
    }
//Создание документа
id = document.forms["reg"].elements["id"].value;
    var docDefinition = { content: [
        {text: 'Протокол №'+id, style: 'mid'},
        {text: today,style:'mid' },
        {text: '\n', style:'a14'},
        {text: 'Присутствовали: ', style: 'b18'},
        {text: membermas, style:'a14'},
        {text: '\n', style:'a14'},
        {text: 'Повестка дня: ', style: 'b18'},
        {text: povestkamas, style:'a14'},
        {text: '\n', style:'a14'},
        {text: 'Выступили: \n\n', style: 'b18'},
        {text: speechmas, style:'a14'},
        {text: 'Решения кафедры: ', style: 'b18'},
        {text: solutionsmas, style:'a14'},
        {text: '\n', style:'a14'},
        {columns: [
        {
        text:'Зав. Кафедрой\n\nСекретарь '
        },
        {
        text:'Е.З. Власова\n\nИ.Б. Государев', style:'righ'
        }
    ]}
        
    ],
       
         styles: {
             righ:{
                 alignment:'right'
             },
     mid: {
       fontSize: 18,
       bold: true,
         alignment:'center'
     },
    b18:{
        fontsize: 18,
        bold: true
    },
        a14:{
        fontsize: 14
    } }                
                        };
pdfMake.createPdf(docDefinition).open()//.download(''+today+'.pdf');
}
//Добавление информации о повестке дня
function add(){
    $("#aim").append("<textarea cols='60' rows='3' type='text' name='aims[]'>"+"</textarea>"+"<br>");
}
//Добавление информации о выступающих
function addspeech() {
    $("#speech").append("<textarea cols='60' rows='5' type='text' name='speach[]'>"+"</textarea>"+"<br>");
}
//Добавление информации о решениях кафедры
function soladd() {
    $("#sol").append("<textarea cols='60' rows='3' type='text' name='solutions[]'>"+"</textarea>"+"<br>");
}