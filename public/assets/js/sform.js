$(document).ready(function() {
    $('input[type=text]').each(function(){
        $(this).on('keyup',function(e){
            let formId=e.target.id;
            let arrayId=formId.split("_");
            $(`#${arrayId[0]}_form_count_male_total`).val(Number($(`#${arrayId[0]}_form_count_male_age_less_5`).val()) + Number($(`#${arrayId[0]}_form_count_male_age_greater_5`).val()));
            if($(`#${arrayId[0]}_form_count_male_total`).val()==0){
            $(`#${arrayId[0]}_form_count_male_total`).val("");
            }
            $(`#${arrayId[0]}_form_count_female_total`).val(Number($(`#${arrayId[0]}_form_count_female_age_less_5`).val()) + Number($(`#${arrayId[0]}_form_count_female_age_greater_5`).val()));
            if($(`#${arrayId[0]}_form_count_female_total`).val()==0){
            $(`#${arrayId[0]}_form_count_female_total`).val("");
            }
            $(`#${arrayId[0]}_form_count_grand_total`).val(Number($(`#${arrayId[0]}_form_count_male_total`).val()) + Number($(`#${arrayId[0]}_form_count_female_total`).val()));
        })
    })
    $('#submitformdata').on('click',function(e){
    e.preventDefault();
    let data={};
    $('input[type=text]').each(function() { 
        if($(this).val()){
            data[$(this).attr("id")]=$(this).val();
        }
//         $(this).on('keyup',function(e){
// //      if(e.target.id=='only_fever_greater_7_days_form_count_male'){
// //            console.log(e.target.value);
// //      }
//   });
    });
    data['_token']= $('meta[name="csrf-token"]').attr('content')
    console.log(data);
//         let onlyfevergreaterthanequal7days_form_count_male_age_less_5 = $('#onlyfevergreaterthanequal7days_form_count_male_age_less_5').val();
//    let onlyfevergreaterthanequal7days_form_count_male_age_greater_5 = $('#onlyfevergreaterthanequal7days_form_count_male_age_greater_5').val();
//    let onlyfevergreaterthanequal7days_form_count_female_age_less_5 = $('#onlyfevergreaterthanequal7days_form_count_female_age_less_5').val();
//    let onlyfevergreaterthanequal7days_form_count_female_age_greater_5 = $('#onlyfevergreaterthanequal7days_form_count_female_age_greater_5').val();
// {
//     onlyfevergreaterthanequal7days_form_count_male_age_less_5 : onlyfevergreaterthanequal7days_form_count_male_age_less_5,
//     onlyfevergreaterthanequal7days_form_count_male_age_greater_5 : onlyfevergreaterthanequal7days_form_count_male_age_greater_5,
//     onlyfevergreaterthanequal7days_form_count_female_age_less_5 : onlyfevergreaterthanequal7days_form_count_female_age_less_5,
//     onlyfevergreaterthanequal7days_form_count_female_age_greater_5 : onlyfevergreaterthanequal7days_form_count_female_age_greater_5,
//     _token: $('meta[name="csrf-token"]').attr('content')
// },
   $.ajax({ 
            type: "POST",
            url: "{{ url('addpatient') }}", 
            data:data, 
            dataType: 'json',
            success: function(res) {
                console.log(res);
            }
        });
    })
});