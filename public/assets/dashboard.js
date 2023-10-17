const BASE_URL =window.location.origin;
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
        $('#l-dropdown option[value=""]').prop('selected', 'selected').change();
        $("#l-dropdown").hide();
        $("#type").show();

    }else  if(formType==="l-form"){
        $("#filter_form_type").val(1);
        $("#graphical_view").hide();
        $('#l-dropdown option[value="person_tested"]').prop('selected', 'selected').change();

        option="<option value='laboratary'>Human Rabies and Laboratary</option>";
        $("#diseasesSyndromes").append(option);
        $("#l-dropdown").show();
        $("#type").hide();
    }else{
        $("#filter_form_type").val(3);
        $("#graphical_view").hide();
        option="<option value='animal_bite'>Animal Bite - Dog Bite</option>";
        $("#diseasesSyndromes").append(option);
        // $('#l-dropdown option[value=""]').attr("selected", true);
        $('#l-dropdown option[value=""]').prop('selected', 'selected').change();
        $("#l-dropdown").hide();
        $("#type").show();
        
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
                            option +=`<option value="${district.id}">${district.district_name}</option>`;
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

        });

        const apply_filter = ()=>{
            const filter_state = $("#filter_state").val();
            const filter_district = $("#filter_district").val();
            const filter_from_year = $("#filter_from_year").val();
            const filter_to_year = $("#filter_to_year").val();
            const form_type = $("#filter_form_type").val();
            const filter_diseasesSyndromes = $("#filter_diseases").val();
            const l_dropdown = $("#l-dropdown").val();
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
                url: BASE_URL+"/test",
                type: "get",
                data: {
                    setstate: filter_state,
                    district: filter_district,
                    setyear: filter_from_year,
                    setyearto: filter_to_year,
                    form_type: form_type,
                    filter_diseasesSyndromes: filter_diseasesSyndromes,
                    l_dropdown: l_dropdown,
                },
                success: function(result) {
                    if (form_type == '1') {
                        $('.defaultform').hide()
                        $('.lform').show()
                    }

                    if(form_type == '1'){

                        $('#box3').html(result.total_persons);
                        $('#box4').html(result.total_samples);
                        $('#box5').html(result.total_positive);
                        $('#text3').html("Laboratory Cases Persons Tested");
                        $('#text4').html("Laboratory Cases Samples Tested");
                        $('#text5').html("Laboratory Cases Positive ");

                    }else{

                        if(form_type == '3'){
                            $('.lform').hide()
                            $('.defaultform').show()
                            $('#box1').html(result.total_cases);
                            $('#box2').html(result.total_deaths);
                            $('#text1').html("Total Cases Syndromic Surveillance Cases");
                            $('#text2').html("Deaths Syndromic Surveillance Cases");

                        }else{
                            $('.lform').hide()
                            $('.defaultform').show()
                             $('#text1').html("Total Cases Presumptive Cases");
                             $('#text2').html("Deaths Presumptive Cases");
                             $('#box1').html(result.total_cases);
                             $('#box2').html(result.total_deaths);
                        }
                    }
                    let sessionValue = $("#session_value").val();
                    let case_type_col = result?.case_type_col;
                    alert(sessionValue)
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
                                        click: function(e) {

                                            let nameState = e.point.name


                                            $('.detailsDatas').hide();
                                            if ($('#state').val() != '') {
                                                $('#state').val('');
                                                $('.statewise').hide();
                                            }

                                            if (nameState) {
                                                $(".detailsDatas").hide();
                                            }

                                            $.ajaxSetup({
                                                headers: {
                                                    'X-CSRF-TOKEN': $(
                                                        'meta[name="csrf-token"]'
                                                    ).attr(
                                                        'content')
                                                }
                                            });

                                            $.ajax({
                                                url: BASE_URL+"/human-rabies-death",
                                                type: "get",
                                                data: {
                                                    setyear: year,
                                                    name: nameState
                                                },
                                                success: function(result) {

                                                    $('#totalDeath')
                                                        .text(result
                                                            .human_rabies_deaths
                                                        );

                                                }

                                            });

                                            $("#detailsData").show();

                                            console.log(e.point.name,' name.....')
                                            // var sessionvalue =
                                            //     "{{ session('type') }}"
                                            //alert(sessionvalue);
                                            if (sessionValue == '1' && form_type!=1) {


                                                var StateContent =
                                                    "Fetching the data for " + e
                                                    .point
                                                    .name +
                                                    " <div class='table-responsive'> <table class='table table-bordered'><thead><tr><th rowspan='2'>State</th><th colspan='2'>presumptive </th></tr> <tr><th>Cases</th><th>deaths</th></tr></thead><tbody><tr><td>" +
                                                    e.point
                                                    .name +
                                                    "</td><td><span id='totalDeath'></span></td><td>" +
                                                    e.point.value +
                                                    "</td></tr></tbody></table> </div>";

                                            } else {

                                                var StateContent =
                                                    "Fetching the data for " + e
                                                    .point
                                                    .name +
                                                    " <div class='table-responsive'> <table class='table table-bordered'><thead><tr><th rowspan='2'>State</th><th colspan='2'>presumptive </th></tr> <tr><th>Cases</th><th>deaths</th></tr></thead><tbody><tr><td>" +
                                                    e.point
                                                    .name +
                                                    "</td><td>" + e.point.value +
                                                    "</td><td><span id='totalDeath'></span></td></tr></tbody></table> </div>";

                                            }
                                            
                                            if (form_type == 1) {
                                                var StateContent = "Fetching the data for " + e.point.name +
                                                    '<div class="table-responsive ab"><table class="table table-bordered l-form-map"><thead><tr><th rowspan="2">State</th><th colspan="3">Laboratory Cases</th></tr>' + '<tr><th>Person Tested</th><th>Sample Tested</th><th>Positive</th></tr></thead><tbody id="tableBody_l_form"><tr><td>' + e.point.name + '</td><td>' + (case_type_col == 1 ? e.point.value : 0) + '</td><td>' + (case_type_col == 2 ? e.point.value : 0) + '</td><td>' + (case_type_col == 3 ? e.point.value : 0) + '</td></tr></tbody></table></div>';
                                            }
                                            
                                            
                                            $("#detailsData").html(StateContent);
                                        }
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



                }
            });
        }

        $(document).ready(function() {

            let mapdata = "";
            year = $('#year').val();
            $('.statewise').hide();
            $('#yeartostate').hide();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.ajax({
                url: BASE_URL+"/human-rabies",
                type: "get",
                success: function(result) {
                        $('#text1').html("Total Cases Presumptive Cases");
                        $('#text2').html("Deaths Presumptive Cases");
                        $('#box1').html(result.total_cases);
                        $('#box2').html(result.total_deaths);
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
                        title: 'Cases by Gender in india n=('+result.total+')',
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                    chart.draw(data, options);
                    }
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Gender', 'Percentage'],
                        ['Male', result.female_percentage],
                        ['Female', result.male_percentage]
                    ]);

                    var options = {
                        title: 'Death by Gender in india n=('+result.total+')',
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('piecharts'));

                    chart.draw(data, options);
                    }


                    /*end google chart*/


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
                                        click: function(e) {
                                            let nameState = e.point.name


                                            $('.detailsDatas').hide();
                                            if ($('#state').val() != '') {
                                                $('#state').val('');
                                                $('.statewise').hide();
                                            }

                                            if (nameState) {

                                                $(".detailsDatas").hide();

                                            }

                                            $.ajaxSetup({
                                                headers: {
                                                    'X-CSRF-TOKEN': $(
                                                        'meta[name="csrf-token"]'
                                                    ).attr(
                                                        'content')
                                                }
                                            });

                                            $.ajax({
                                                url: BASE_URL+"/human-rabies-death",
                                                type: "get",
                                                data: {
                                                    setyear: year,
                                                    name: nameState
                                                },
                                                success: function(result) {

                                                    $('#totalDeath')
                                                        .text(result
                                                            .human_rabies_deaths
                                                        );

                                                }

                                            });
                                            const form_type = $('#formType').find(":selected").val();
                                            
                                            $("#detailsData").show();

                                            if (sessionValue == '1') {
                                                var StateContent =
                                                    "Fetching the data for " + e
                                                    .point
                                                    .name +
                                                    " <div class='table-responsive'> <table class='table table-bordered'><thead><tr><th rowspan='2'>State</th><th colspan='2'>presumptive </th></tr> <tr><th>Cases</th><th>deaths</th></tr></thead><tbody><tr><td>" +
                                                    e.point
                                                    .name +
                                                    "</td><td><span id='totalDeath'></span></td><td>" +
                                                    e.point.value +
                                                    "</td></tr></tbody></table> </div>";

                                            } else {

                                                var StateContent =
                                                    "Fetching the data for " + e
                                                    .point
                                                    .name +
                                                    " <div class='table-responsive'> <table class='table table-bordered'><thead><tr><th rowspan='2'>State</th><th colspan='2'>presumptive </th></tr> <tr><th>Cases</th><th>deaths</th></tr></thead><tbody><tr><td>" +
                                                    e.point
                                                    .name +
                                                    "</td><td>" + e.point.value +
                                                    "</td><td><span id='totalDeath'></span></td></tr></tbody></table> </div>";

                                            }

                                            $("#detailsData").html(StateContent);

                                            // Swal.fire({
                                            //     position: 'top-end',
                                            //     icon: 'success',
                                            //     title: 'State records fetched successfully',
                                            //     showConfirmButton: false,
                                            //     timer: 3000
                                            // })


                                        }
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
                url: BASE_URL+"/horizontalBarChartcaseAjax",
                type: "get",
                success: function(result) {
                    var data = result; // Assuming 'result' contains the data you provided

                    var categories = data.map(item => item.age_group);

                    var males = {
                        name: 'Males',
                        data: data.map(item => item.male_percentage)
                    };

                    var females = {
                        name: 'Females',
                        data: data.map(item => -item.female_percentage)
                    };

                    var options = {
                        series: [males, females],
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
                            min: -10,
                            max: 10,
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
                        title: {
                            text: 'Case by age group in india'
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

                    var chart = new ApexCharts(document.querySelector("#chart"), options);
                    chart.render();
                }
            });

        });




        $('#type').on('change', function() {

            let typeValue = $(this).val(); // The value you want to store in the session
            $("#session_value").val(typeValue);
            $.ajax({
                url: BASE_URL+'/set-session',
                type: 'get',
                data: {
                    type: typeValue
                },
                headers: {
                    'X-CSRF-TOKEN': 'your_csrf_token_here' // Include CSRF token if required
                },
                success: function(response) {
                    location.reload(true);
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });

        })

        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }

        document.addEventListener('DOMContentLoaded', function() {
            Highcharts.chart('chartContainer', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Cases by Age Group in India'
                },
                xAxis: {
                    categories: ['0-10', '11-20', '21-30', '31-40', '41-50', '51-60', '61+'],
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
                series: [{
                    name: 'Male',
                    data: [500, 400, 300, 200, 150, 100, 50],

                }, {
                    name: 'Female',
                    data: [600, 500, 400, 300, 250, 200, 100]
                }]
            });
        });
