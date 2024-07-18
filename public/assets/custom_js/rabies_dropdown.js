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


    $(".hide-th").addClass('d-none');
    $(".hide-th1").addClass('d-none');
});

function baseDropdown(e){
    alert(e);
}

$("#village").change(function(){
    if($(this).val() == "select") {
       $('#data-view').addClass('d-none');
       $('#D-number').addClass('d-none');
    } else {
       $('#data-view').removeClass('d-none');
       $('#D-number').removeClass('d-none');
    }
});


$(".arrow-r").click(function(){
    $(this).toggleClass('d-none');
    $(".arrow-l").toggleClass('d-none');
    $(".hide-th").toggleClass('d-none');
});

$(".arrow-l").click(function(){
    $(this).toggleClass('d-none');
    $(".arrow-r").toggleClass('d-none');
    $(".hide-th").toggleClass('d-none');
});

$(".arrow-r1").click(function(){
    $(this).toggleClass('d-none');
    $(".arrow-l1").toggleClass('d-none');
    $(".hide-th1").toggleClass('d-none');
});

$(".arrow-l1").click(function(){
    $(this).toggleClass('d-none');
    $(".arrow-r1").toggleClass('d-none');
    $(".hide-th1").toggleClass('d-none');
});

//For the monthly reports dog bite total
$(document).on("input", ".dogbite", function() {
    var sum = 0;
    $(".dogbite").each(function(){
        sum += +$(this).val();
    });
    $(".total_dog_bite").val(sum || "");
});

//For the monthly reports dog bite total
$(document).on("input", ".animalbite", function() {
    var sum = 0;
    $(".animalbite").each(function(){
        sum += +$(this).val();
    });
    $(".total_no_of_patients_bited").val(sum || "");
});