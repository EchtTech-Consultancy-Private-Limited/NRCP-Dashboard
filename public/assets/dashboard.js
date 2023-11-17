// const BASE_URL =window.location.origin;
const BASE_URL =window.location.origin+"/public";

/*handle Form Type*/
const handleFormType = ()=>{
    const formType = $('#formType').find(":selected").attr('form-type');
    $("#diseasesSyndromes").html("");
    let option="";
    if(formType==="p-form"){
        $("#filter_form_type").val(2);
        $("#graphical_view").show();
        option="<option value='human_rabies'>Human Rabies</option> <option value='animal_bite'>Animal Bite - Dog Bite</option>";
        $("#diseasesSyndromes").append(option);
        $('#l-dropdown option[value=""]').prop('selected', 'selected');
        $("#l-dropdown").hide();
        $("#test_performed").hide();
        $("#type").show();

    }else  if(formType==="l-form"){
        $("#filter_form_type").val(1);
        // $("#graphical_view").hide();
        $('#l-dropdown option[value="person_tested"]').prop('selected', 'selected');

        option="<option value='laboratary'>Human Rabies</option>";
        $("#diseasesSyndromes").append(option);
        $("#l-dropdown").show();
        $("#test_performed").show();
        $("#type").hide();
        $("#map-text").html("Animal Bite - Dog Bite (Laboratory Cases) in India")

    }else{
        $("#filter_form_type").val(3);
        // $("#graphical_view").hide();
        option="<option value='animal_bite'>Animal Bite - Dog Bite</option>";
        $("#diseasesSyndromes").append(option);
        // $('#l-dropdown option[value=""]').attr("selected", true);
        $('#l-dropdown option[value=""]').prop('selected', 'selected');
        $("#l-dropdown").hide();
        $("#test_performed").hide();
        $("#type").show();
        $("#map-text").html("Animal Bite - Dog Bite (Syndromic Surveillance) Cases in India")
    }
}

const handleFilterValue = ()=>{
    const filter_state = $('#state').find(":selected").val();
    const filter_district = $('#district').find(":selected").val();
    const filter_from_year = $('#year').find(":selected").val();
    const filter_to_year = $('#yearto').find(":selected").val();
    const form_type = $('#formType').find(":selected").val();
    const filter_diseasesSyndromes = $('#diseasesSyndromes').find(":selected").val();
    const l_dropdown = $('#l-dropdown').find(":selected").val();

    filter_state ? $("#filter_state").val(filter_state) : "";
    filter_district ? $("#filter_district").val(filter_district) : "";
    filter_from_year ? $("#filter_from_year").val(filter_from_year) : "";
    filter_to_year ? $("#filter_to_year").val(filter_to_year) : "";
    form_type ? $("#filter_form_type").val(form_type) : "";
    filter_diseasesSyndromes ? $("#filter_diseases").val(filter_diseasesSyndromes) : "";
    l_dropdown ? $("#l-dropdown").val(l_dropdown) : "";

    filter_diseasesSyndromes==="animal_bite" ? $("#map-text").html("Animal Bite - Dog Bite (Presumptive Cases) in India"):$("#map-text").html("Human Rabies (Presumptive Cases) in India");
}

const getLFormData = ()=>{
    apply_filter();
}

const handleTestPerformed = ()=>{
    const arr = [];
        $.each($("input[name='test-perfomed']:checked"), function(){
            arr.push($(this).val());
    });
}

const handleDistrict = ()=>{
    const state_id = $('#state').find(":selected").attr('state-id');
    let option = "<option value=''>Please select district</option>";
    $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: BASE_URL+"/get-district",
                type: "get",
                data: {
                    state_id: state_id,
                    },
                success: function(result) {
                    if(result){
                        $("#district").html("");
                        result.district_list.forEach((district)=>{
                            option +=`<option value="${district.id}" dist-name="${district.district_name}">${district.district_name}</option>`;
                        });
                        $("#district").append(option);
                    }else{
                        $("#district").html("");
                    }
                }
            });
}

/*end here*/
$(document).ready(function() {
    $("#l-dropdown").hide();
    $('.lform').hide()
    $('.l-form-map').hide()
    $('#test_performed').hide()
    $('#year').change(function() {
        var fromYear = parseInt($(this).val());
        var toYearSelect = $('#yearto');
        //aleart(toYearSelect)

        // Clear existing options
        toYearSelect.empty();

        // Add options starting from next year
        $('#yearto').html('<option value="" selected>Choose Year</option>');
        for (var year = fromYear + 1; year <= new Date().getFullYear(); year++) {

            var option = $('<option></option>');
            option.val(year);
            option.text(year);

            toYearSelect.append(option);
        }
    });

    // Set a default selected option
    $('#yearto').append('<option value="" selected>Choose Year</option>');

    // Trigger the change event to populate the "to year" dropdown initially
    // $('#year').change();

    $("#apply_filter").on('click', function() {
        apply_filter();

    });

    $("#reset_button").on('click', function() {
        $('#state option[value=""]').prop('selected', 'selected').change();
        $('#district option[value=""]').prop('selected', 'selected').change();
        $('#year option[value="2022"]').prop('selected', 'selected').change();
        $('#yearto option[value=""]').prop('selected', 'selected').change();
        $('#formType option[value="2"]').prop('selected', 'selected').change();
        $('#diseasesSyndromes option[value="human_rabies"]').prop('selected', 'selected').change();
        $("#stateMap").hide();
        $("#container").show();
        apply_filter();
    });

});

const apply_filter = ()=>{
    const filter_state = $('#state').find(":selected").val();
    const filter_district = $('#district').find(":selected").val();
    const filter_from_year = $('#year').find(":selected").val();
    const filter_to_year = $('#yearto').find(":selected").val();
    const form_type = $('#formType').find(":selected").val();
    const filter_diseasesSyndromes = $('#diseasesSyndromes').find(":selected").val();
    const l_dropdown = $('#l-dropdown').find(":selected").val();
    const session_value = $('#session_value').val();

    const search_btn = $("#apply_filter");
    search_btn.attr("disabled",true);
    let loading_content = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...';
    search_btn.html(loading_content);
    if(form_type==1){
        $('.s-p-form-map').hide();
        $('.l-form-map').show();
        $('#l-dropdown').show();
        $("#type").hide();

    }else{
        $('.s-p-form-map').show();
        $("#type").show();
        $('.l-form-map').hide();
        $('#l-dropdown').hide();
    }

    if (year) {
        $(".detailsDatas").show();
        $("#detailsData").hide();
    }


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: BASE_URL+"/get-filter-data",
        type: "get",
        data: {
            setstate: filter_state,
            district: filter_district,
            setyear: filter_from_year,
            setyearto: filter_to_year,
            form_type: form_type,
            filter_diseasesSyndromes: filter_diseasesSyndromes,
            l_dropdown: l_dropdown,
            session_value:session_value
        },
        success: function(result) {

                let statesData = result.array;
                const entries = Object.entries(statesData);
               
                const containerElement = document.getElementById("container");
                const stateElement = document.getElementById("stateMap");
                const $stateImageElement = $(".stateImage");

            if(filter_state !== ''){    
                result.imageNames.forEach(element => {
                     //console.log(entries[0][0] == element);
                  if(entries[0][0] == element ){
                      containerElement.style.display = "none";  // Hide "container"
                      stateElement.style.display = "block";     // Show "state"

                      const dynamicImageName =   BASE_URL+'/state/'+ element.replace(/\s/g, '%20')  + '.png'; // Modify this based on your naming convention
                       // console.log(dynamicImageName);
                      $stateImageElement.attr("src", dynamicImageName);
                   }
                 
              });
            }
              
            search_btn.html("Search");
            search_btn.attr("disabled",false);
            search_btn.html("Search");
            search_btn.attr("disabled",false);
            if(form_type=='2'){
            googlePieChart(result);
            barChart(result[0]);
            pyramidChart(result[0]);
            }

            if (form_type == '1') {
                $('.defaultform').hide()
                $('.lform').show()
            }

            if(form_type == '1'){

                $('#box3').html(result.laboratory_total);
                $('#box4').html(result.laboratory_samples);
                $('#box5').html(result.laboratory_Positive);
            }else{
                $('.lform').hide()
                $('.defaultform').show()
                if(form_type == '3'){
                    $('#box1').html("Total Cases-" + " " + result.human_rabies_case);
                    $('#box2').html( "Total Deaths-" + " " + result.human_rabies_deaths);
                    $('#text1').html("Syndromic Surveillance Cases");
                    $('#text2').html("Syndromic Surveillance Cases");

                }else{
                        $('#text1').html("Presumptive Cases");
                        $('#text2').html("Presumptive Cases");
                        $('#box1').html("Total Cases-" + " " + result.human_rabies_case);
                        $('#box2').html("Total Deaths-" + " " + result.human_rabies_deaths);
                }
            }
            let sessionValue = $("#session_value").val();
            let case_type_col = result?.case_type_col;
            if (!sessionValue) {
                sessionValue = 0
            }
            $("#detailsData").hide();
            (async () => {
                const topology = await fetch(
                    'https://code.highcharts.com/mapdata/countries/in/custom/in-all-disputed.topo.json'
                ).then(response => response.json());

                let statesData = result.array;

                const entries = Object.entries(statesData);
                const data = entries;
                const tableBody = $('.detailsDatas tbody');
                // Clear any existing rows in the table
                tableBody.empty();
                // Loop through the entries and add rows to the table
                    entries.forEach(function(entry) {
                        const state = entry[0];
                        const cases = entry[1];

                        if(l_dropdown==""){
                            const row = `
                            <tr>
                                <td>${capitalizeFirstLetter(state)}</td>
                                <td>${sessionValue == 0 ? cases : 0 }</td>
                                <td>${sessionValue == 1 ? cases : 0}</td>
                            </tr>
                        `;
                            tableBody.append(row);
                        }else{
                            const row = `
                            <tr>
                                <td>${capitalizeFirstLetter(state)}</td>
                                <td>${case_type_col === 1 ? cases : 0 }</td>
                                <td>${case_type_col === 2 ? cases : 0}</td>
                                <td>${case_type_col === 3 ? cases : 0}</td>
                            </tr>
                        `;
                            tableBody.append(row);
                        }

                    });


                // Create the chart
                Highcharts.mapChart('container', {
                    chart: {
                        map: topology
                    },

                    title: {
                        text: ''
                    },

                    subtitle: {
                        text: ''
                    },

                    mapNavigation: {
                        enabled: true,
                        buttonOptions: {
                            verticalAlign: 'bottom'
                        }
                    },

                    colorAxis: {
                        min: 0
                    },
                    plotOptions: {
                        series: {
                            events: {
                                // click: function(e) {

                                //     let nameState = e.point.name


                                //     $('.detailsDatas').hide();
                                //     if ($('#state').val() != '') {
                                //         $('#state').val('');
                                //         $('.statewise').hide();
                                //     }

                                //     if (nameState) {
                                //         $(".detailsDatas").hide();
                                //     }

                                //     $.ajaxSetup({
                                //         headers: {
                                //             'X-CSRF-TOKEN': $(
                                //                 'meta[name="csrf-token"]'
                                //             ).attr(
                                //                 'content')
                                //         }
                                //     });

                                //     $.ajax({
                                //         url: BASE_URL+"/human-rabies-death",
                                //         type: "get",
                                //         data: {
                                //             setyear: year,
                                //             name: nameState
                                //         },
                                //         success: function(result) {

                                //             $('#totalDeath')
                                //                 .text(result
                                //                     .human_rabies_deaths
                                //                 );

                                //         }

                                //     });

                                //     $("#detailsData").show();

                                //     // var sessionvalue =
                                //     //     "{{ session('type') }}"
                                //     //alert(sessionvalue);
                                //     if (sessionValue == '1' && form_type!=1) {


                                //         var StateContent =
                                //             "Fetching the data for " + e
                                //             .point
                                //             .name +
                                //             " <div class='table-responsive'> <table class='table table-bordered'><thead><tr><th rowspan='2'>State</th><th colspan='2'>presumptive </th></tr> <tr><th>Cases</th><th>deaths</th></tr></thead><tbody><tr><td>" +
                                //             e.point
                                //             .name +
                                //             "</td><td><span id='totalDeath'></span></td><td>" +
                                //             e.point.value +
                                //             "</td></tr></tbody></table> </div>";

                                //     } else {

                                //         var StateContent =
                                //             "Fetching the data for " + e
                                //             .point
                                //             .name +
                                //             " <div class='table-responsive'> <table class='table table-bordered'><thead><tr><th rowspan='2'>State</th><th colspan='2'>presumptive </th></tr> <tr><th>Cases</th><th>deaths</th></tr></thead><tbody><tr><td>" +
                                //             e.point
                                //             .name +
                                //             "</td><td>" + e.point.value +
                                //             "</td><td><span id='totalDeath'></span></td></tr></tbody></table> </div>";

                                //     }
                                //     console.log(form_type,' form type')
                                //     if (form_type == 1) {
                                //         var StateContent = "Fetching the data for " + e.point.name +
                                //             '<div class="table-responsive ab"><table class="table table-bordered l-form-map"><thead><tr><th rowspan="2">State</th><th colspan="3">Laboratory Cases</th></tr>' + '<tr><th>Person Tested</th><th>Sample Tested</th><th>Positive</th></tr></thead><tbody id="tableBody_l_form"><tr><td>' + e.point.name + '</td><td>' + (case_type_col == 1 ? e.point.value : 0) + '</td><td>' + (case_type_col == 2 ? e.point.value : 0) + '</td><td>' + (case_type_col == 3 ? e.point.value : 0) + '</td></tr></tbody></table></div>';
                                //     }


                                //     $("#detailsData").html(StateContent);
                                // }
                            }
                        }
                    },

                    series: [{
                        data: data,
                        name: '',
                        allowPointSelect: true,
                        cursor: 'pointer',
                        color: "#fff",
                        states: {
                            select: {
                                color: 'blue'
                            }
                        },
                        dataLabels: {
                            enabled: false,
                            format: '{point.name}'
                        }
                    }]

                });

            })();



        },
        error:(xhr,status)=>{
            search_btn.html("Search");
            search_btn.attr("disabled",false);
        }
    });
}

$(document).ready(function() {

    year = $('#year').val();
    $('.statewise').hide();
    $('#yeartostate').hide();
    $("#stateMap").hide();


    $("#mySelect2").select2({
        tags: true,
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: BASE_URL+"/human-rabies",
        type: "get",
        success: function(result) {
                $('#text1').html("Presumptive Cases");
                $('#text2').html("Presumptive Cases");
                $('#box1').html("Total Cases -" + " " + result.total_cases);
                $('#box2').html("Total Deaths -" + " " + result.total_deaths);
                /*Google Chart Pie Chart*/ 
                googlePieChart(result);


            let sessionValue = $("#session_value").val();
            if (!sessionValue) {
                sessionValue = 0
            }

            (async () => {

                const topology = await fetch(
                    'https://code.highcharts.com/mapdata/countries/in/custom/in-all-disputed.topo.json'
                ).then(response => response.json());


                const statesData = result.array;
                const entries = Object.entries(statesData);
                const data = entries;
                const tableBody = $('.detailsDatas tbody');

                // Clear any existing rows in the table
                tableBody.empty();
                $('#detailsData').hide();

                // Loop through the entries and add rows to the table
                entries.forEach(function(entry) {
                    const state = entry[0];
                    const cases = entry[1];
                    const row = `
                        <tr>
                            <td>${capitalizeFirstLetter(state)}</td>
                            <td>${sessionValue == 0 ? cases : 0 }</td>
                            <td>${sessionValue == 1 ? cases : 0}</td>
                        </tr>
                    `;

                    tableBody.append(row);
                });
                // Create the chart
                Highcharts.mapChart('container', {
                    chart: {
                        map: topology
                    },

                    title: {
                        text: ''
                    },

                    subtitle: {
                        text: ''
                    },

                    mapNavigation: {
                        enabled: true,
                        buttonOptions: {
                            verticalAlign: 'bottom'
                        }
                    },

                    colorAxis: {
                        min: 0
                    },
                    plotOptions: {
                        series: {
                            events: {
                                // click: function(e) {
                                //     let nameState = e.point.name


                                //     $('.detailsDatas').hide();
                                //     if ($('#state').val() != '') {
                                //         $('#state').val('');
                                //         $('.statewise').hide();
                                //     }

                                //     if (nameState) {

                                //         $(".detailsDatas").hide();

                                //     }

                                //     $.ajaxSetup({
                                //         headers: {
                                //             'X-CSRF-TOKEN': $(
                                //                 'meta[name="csrf-token"]'
                                //             ).attr(
                                //                 'content')
                                //         }
                                //     });

                                //     $.ajax({
                                //         url: BASE_URL+"/human-rabies-death",
                                //         type: "get",
                                //         data: {
                                //             setyear: year,
                                //             name: nameState
                                //         },
                                //         success: function(result) {

                                //             $('#totalDeath')
                                //                 .text(result
                                //                     .human_rabies_deaths
                                //                 );

                                //         }

                                //     });
                                //     const form_type = $('#formType').find(":selected").val();

                                //     $("#detailsData").show();

                                //     if (sessionValue == '1') {
                                //         var StateContent =
                                //             "Fetching the data for " + e
                                //             .point
                                //             .name +
                                //             " <div class='table-responsive'> <table class='table table-bordered'><thead><tr><th rowspan='2'>State</th><th colspan='2'>presumptive </th></tr> <tr><th>Cases</th><th>deaths</th></tr></thead><tbody><tr><td>" +
                                //             e.point
                                //             .name +
                                //             "</td><td><span id='totalDeath'></span></td><td>" +
                                //             e.point.value +
                                //             "</td></tr></tbody></table> </div>";

                                //     } else {

                                //         var StateContent =
                                //             "Fetching the data for " + e
                                //             .point
                                //             .name +
                                //             " <div class='table-responsive'> <table class='table table-bordered'><thead><tr><th rowspan='2'>State</th><th colspan='2'>presumptive </th></tr> <tr><th>Cases</th><th>deaths</th></tr></thead><tbody><tr><td>" +
                                //             e.point
                                //             .name +
                                //             "</td><td>" + e.point.value +
                                //             "</td><td><span id='totalDeath'></span></td></tr></tbody></table> </div>";

                                //     }

                                //     $("#detailsData").html(StateContent);

                                //     // Swal.fire({
                                //     //     position: 'top-end',
                                //     //     icon: 'success',
                                //     //     title: 'State records fetched successfully',
                                //     //     showConfirmButton: false,
                                //     //     timer: 3000
                                //     // })


                                // }
                            }
                        }
                    },
                    // tooltip: {
                    //     pointFormatter: function() {

                    //         console.log(data)
                    //     return `<b>State:</b> ${this.name}</br><b>Total Death:</b> ${this.name}</br>`
                    //     }
                    // },
                    series: [{
                        data: data,
                        name: '',
                        allowPointSelect: true,
                        cursor: 'pointer',
                        color: "#fff",
                        states: {
                            select: {
                                color: 'blue'
                            }
                        },
                        dataLabels: {
                            enabled: false,
                            format: '{point.name}'
                        }
                    }]

                });

            })();



        }
    });
    // pyramid chart
    $.ajax({
        url: BASE_URL+"/p-form-horizontal-barchart",
        type: "get",
        success: function(result) {
            pyramidChart(result);
        }
    });

});


$('#type').on('change', function() {
    const typeValue = $('#type').find(":selected").val();
    $("#session_value").val(typeValue);
    apply_filter();
});

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

document.addEventListener('DOMContentLoaded', function() {


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $(
                'meta[name="csrf-token"]'
            ).attr(
                'content')
        }
    });

    $.ajax({
        url: BASE_URL+"/pform-horizontal-barchart-death",
        type: "get",

        success: function(result) {

            barChart(result);


        }

    });

});

const googlePieChart = (result)=>{
    const filter_state = $('#state').find(":selected").attr('state-name');
    const filter_district = $('#district').find(":selected").attr('dist-name');
    const filter_from_year = $('#year').find(":selected").val();
    const filter_to_year = $('#yearto').find(":selected").val();
    const form_type = $('#formType').find(":selected").attr('form-type');
    const filter_diseasesSyndromes = $('#diseasesSyndromes').find(":selected").val();
    const l_dropdown = $('#l-dropdown').find(":selected").val();
    if(result.length<1){
        $("#is_graph_data_available").val("No graph data available");
    }else{
        $("#is_graph_data_available").val("");
    }
    let is_graph_data_available = $("#is_graph_data_available").val();
    is_graph_data_available= is_graph_data_available!==""?is_graph_data_available:"";

/*google chart start*/
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawCharts);

        function drawCharts() {
        var data = google.visualization.arrayToDataTable([
            ['Gender', 'Percentage'],
            ['Male', result.male_percentage],
            ['Female', result.female_percentage]
        ]);

        var options = {
            title: `Cases by Gender in India ${filter_state!==undefined?filter_state+' >':''} ${filter_district!==undefined?filter_district+' >':''} ${filter_from_year!==""?filter_from_year+' >':''} ${filter_to_year!==""?filter_to_year+' >':''}    n=(${result.total})`,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
        }
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Gender', 'Percentage'],
            ['Male', result.male_percentage_death],
            ['Female', result.female_percentage_death]
        ]);

        var options = {
            title: `Death by Gender in India ${filter_state!==undefined?filter_state+' >':''} ${filter_district!==undefined?filter_district+' >':''} ${filter_from_year!==""?filter_from_year+' >':''} ${filter_to_year!==""?filter_to_year+' >':''}  n=(${result.total_death_google_graph})`,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piecharts'));

        chart.draw(data, options);
        }
/*end google chart*/
}

const pyramidChart = (result)=>{
    const filter_state = $('#state').find(":selected").attr('state-name');
    const filter_district = $('#district').find(":selected").attr('dist-name');
    const filter_from_year = $('#year').find(":selected").val();
    const filter_to_year = $('#yearto').find(":selected").val();
    const form_type = $('#formType').find(":selected").attr('form-type');
    const filter_diseasesSyndromes = $('#diseasesSyndromes').find(":selected").val();
    const l_dropdown = $('#l-dropdown').find(":selected").val();
    if(result.length<1){
        $("#is_graph_data_available").val("No graph data available");
    }else{
        $("#is_graph_data_available").val("");
    }
    let is_graph_data_available = $("#is_graph_data_available").val();
    is_graph_data_available= is_graph_data_available!==""?is_graph_data_available:"";
    var options_val = {
        text: `Case by age group in India ${filter_state!==undefined?filter_state+' >':''} ${filter_district!==undefined?filter_district+' >':''} ${filter_from_year!==""?filter_from_year+' >':''} ${filter_to_year!==""?filter_to_year+' >':''}`,
    };


    let categories = result.map(item => item.pyramid_age_group);

    let males = {
        name: 'Males',
        data: result.map(item => item.pyramid_male_percentage)
    };

    let females = {
        name: 'Females',
        data: result.map(item => -item.pyramid_female_percentage)
    };
    let options = {
        series: [females,males],
        chart: {
            type: 'bar',
            height: 440,
            stacked: true
        },
        colors: ['#ed855a', '#712980'],
        plotOptions: {
            bar: {
                horizontal: true,
                barHeight: '80%',
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: 1,
            colors: ["#fff"]
        },
        grid: {
            xaxis: {
                lines: {
                    show: false
                }
            }
        },
        yaxis: {
            min: -100,
            max: 100,
            title: {
                // text: 'Age',
            },
        },
        tooltip: {
            shared: false,
            x: {
                formatter: function(val) {
                    return val
                }
            },
            y: {
                formatter: function(val) {
                    return Math.abs(val) + "%"
                }
            }
        },
        title: options_val,
        subtitle:{
            text:is_graph_data_available
        },
        xaxis: {
            categories: categories,
            title: {
                text: 'Percent'
            },
            labels: {
                formatter: function(val) {
                    return Math.abs(Math.round(val)) + "%"
                }
            }
        },
    };
    const chartContainer = document.querySelector("#chart");
    chartContainer.innerHTML = '';
    let chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
}

const barChart  = (result)=>{
    const filter_state = $('#state').find(":selected").attr('state-name');
    const filter_district = $('#district').find(":selected").attr('dist-name');
    const filter_from_year = $('#year').find(":selected").val();
    const filter_to_year = $('#yearto').find(":selected").val();
    const form_type = $('#formType').find(":selected").attr('form-type');
    const filter_diseasesSyndromes = $('#diseasesSyndromes').find(":selected").val();
    const l_dropdown = $('#l-dropdown').find(":selected").val();
    if(result.length<1){
        $("#is_graph_data_available").val("No graph data available");
    }else{
        $("#is_graph_data_available").val("");
    }
    let is_graph_data_available = $("#is_graph_data_available").val();
    is_graph_data_available= is_graph_data_available!==""?is_graph_data_available:"";

    var options_val = {
        text: `Death by age group in India ${filter_state!==undefined?filter_state+' >':''} ${filter_district!==undefined?filter_district+' >':''} ${filter_from_year!==""?filter_from_year+' >':''} ${filter_to_year!==""?filter_to_year+' >':''}  `,

    };
    var categories = result.map(item => item.pyramid_age_group);

    var males = {
        name: 'Males',
        data: result.map(item => item.pyramid_male_death_percentage)
    };
    var females = {
        name: 'Females',
        data: result.map(item => item.pyramid_female_death_percentage)
    };
    Highcharts.chart('chartContainer', {
        chart: {
            type: 'bar'
        },
        title: options_val,
        subtitle:{
            text:is_graph_data_available,
        },
        xAxis: {
            categories: categories,
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Number of Cases',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        series: [males,females]
    });
}
