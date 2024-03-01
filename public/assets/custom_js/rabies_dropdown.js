$(document).ready(function() {
var map = {
    'For diagnosis':[{id:'Anti-mortem',name:"Anti-mortem"},{id:'Post-Mortem',name:"Post-Mortem"}],
    'Anti-mortem':[{id:'Saliva',name:"Saliva"},{id:'Skin',name:"Skin"},{id:'Serum',name:"Serum"},{id:'CSF',name:"CSF"},{id:'Others',name:"Others"}],
    'Post-Mortem':[{id:'Brain',name:"Brain"},{id:'CSF',name:"CSF"}],
    'Titre estimation':[{id:'Serum',name:"Serum"},{id:'ISF',name:"ISF"}]
} 

    $("#typefdte").on("change",function() {
        var cities = map[$(this).val()];
        $("#typea option").remove(); //remove previous options
        $("#typea").append('<option value=""> Select</option>')
        $.each(cities, function(i,e) {
            $("#typea").append('<option value="'+e.id+'">'+e.name+'</option>');
        });
    });
    $("#typea").on("change",function() {
        var cities = map[$(this).val()];
        $("#typeb option").remove(); //remove previous options
        $("#typeb").append('<option value=""> Select</option>')
        $.each(cities, function(i,e) {
            $("#typeb").append('<option value="'+e.id+'">'+e.name+'</option>');
        });
    });
});

function baseDropdown(e){
    alert(e);
}